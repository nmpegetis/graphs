<?php
ini_set('max_execution_time', 120); //300 seconds = 5 minutes

//ini_set('memory_limit', '-1');		// unlimited memory
ini_set('memory_limit', '4096M');	


/// ! important
// Firstly memcache should be installed in server to use the class Memcache().
// Check the below:
// http://thelinuxfaq.com/93-how-can-i-configure-memcache-on-xampp-in-linux
// https://www.digitalocean.com/community/tutorials/how-to-install-and-use-memcache-on-ubuntu-14-04
// DON'T FORGET to restart the server at the end

$meminstance = new Memcache();
$meminstance->pconnect('localhost', 11211);


class database {
	private $db,$last_query = null;

	function __construct($type,$host,$port,$name,$username,$password){
		try {
			switch($type){
				case 'postgres':
					$this->db = new PDO('pgsql:host='.$host.';port='.$port.';dbname='.$name.';user='.$username.';password='.$password);
					break;
				case 'sqlite':
					$this->db = new PDO('sqlite:'.$name);
					break;
				default:
					echo "not known database type\n";
					break;
			}
		} catch(Exception $e){
			echo "oops..".$e->getMessage()."\n";
			exit;
		}
	}

	function doQuery($query){

		$stmt = $this->db->query($query);
		$this->last_query = $query;
		if(!$stmt){
			$arr = $this->db->errorInfo();
			echo $arr[2];
			return false;
		}
		return $stmt;
	}

	function doPrepare($query){
		$stmt = $this->db->prepare($query);
		$this->last_query = $query;
		if(!$stmt){
			$arr = $this->db->errorInfo();
			return false;
		}
		return $stmt;
	}

	function doExecute($stmt,$params){
		if(!$stmt->execute($params)){
			$arr = $stmt->errorInfo();
			return false;
		}
		return $stmt;
	}

}

if(!isset($_GET['s']) || !isset($_GET['ex'])){
	echo "params not set";
}


$mydb = new database("sqlite","",0,"/opt/lampp/htdocs/graphs/acmdata1.db","","");

// commented --> query of fundedarxiv.db              
//$query = "select EntityId1,EntityId2,Gr1_Acr,Gr2_Acr,Gr1_Category0,Gr1_Category1,Gr1_Category2,Gr2_Category0,Gr2_Category1,Gr2_Category2,Gr1_Cnt,Gr2_Cnt,Similarity from EntitySimilarityView where ExperimentId=?  and  Similarity>?";
$query = "select EntityId1,EntityId2,OurCategory1,CV1_Category0,CV1_Category1,OurCategory2,CV2_Category0,CV2_Category1,catCnts1,catCnts2,Similarity from EntitySimilarityView_cat where ExperimentId=?  and  Similarity>?";
$memQuery = "select EntityId1,EntityId2,OurCategory1,CV1_Category0,CV1_Category1,OurCategory2,CV2_Category0,CV2_Category1,catCnts1,catCnts2,Similarity from EntitySimilarityView_cat where ExperimentId=".$_GET['ex']." and  Similarity>".$_GET['s'];
$querykey = "KEY" . md5($memQuery);
$list = $meminstance->get($querykey);

if (!$list) {

	$stmt = $mydb->doPrepare($query);
	$stmt = $mydb->doExecute($stmt,array($_GET['ex'],$_GET['s']));

// instead of fetching all together... delay a little but for sure change the encoding of each one
//	$list = $stmt->fetchAll();
	while($row = $stmt->fetch(PDO::FETCH_ASSOC))
	{
		foreach($row as &$value)
		{
			$value = mb_convert_encoding($value, "UTF-8", "Windows-1252");
		}
		unset($value); # safety: remove reference
		$list[] = array_map('utf8_encode', $row );
	}
	//print_r($list);

   $meminstance->set($querykey, $list, 0, 2592000);		//600 = 10 minutes
	//	print "got result from mysql\n";
}
else{
	//	print "got result from memcached\n";
}


//$query = "select distinct ExperimentId from TopicAnalysis";
$query = "select distinct ExperimentId,Description from experiment";

$querykey = "KEY" . md5($query);
$experiments = $meminstance->get($querykey);

if (!$experiments) {




	$experiments = array();
	$stmt = $mydb->doQuery($query);
	$res = $stmt->fetch();
	do {
		// if(!isset($experiments[$res[0]]))
		// 	$experiments[$res[0]] = array();
//for openaire.db
		// array_push($experiments[$res[0]],array("item"=>$res[1],"counts"=>$res[2]));	
		array_push($experiments,array("id"=>$res[0],"desc"=>$res[1]));	
	} while ($res = $stmt->fetch());




	// $stmt = $mydb->doQuery($query);
	// $experiments = $stmt->fetchAll(PDO::FETCH_NUM);

   	$meminstance->set($querykey, $experiments, 0, 2592000);		//2592000 = 30 days (maximum for memcached) //600 = 10 minutes
	//	print "got result from mysql\n";
}
else{
	//	print "got result from memcached\n";
}

// commented --> query of fundedarxiv.db
//$query = "select GrantId, TopicId, AVG(Weight) as weight from TopicsPerDoc Inner join GrantPerDoc on TopicsPerDoc.DocId=GrantPerDoc.DocId where Weight>0.02 AND ExperimentId=? Group By GrantId, TopicId Order by GrantId, AVG(Weight) Desc";
//$query = "select project_code, TopicId, AVG(Weight) as weight from TopicsPerDoc Inner join links on TopicsPerDoc.DocId=links.originalid where Weight>0.02 AND ExperimentId=? Group By project_code, TopicId Order by project_code, AVG(Weight) Desc";
//$memQuery = "select project_code, TopicId, AVG(Weight) as weight from TopicsPerDoc Inner join links on TopicsPerDoc.DocId=links.originalid where Weight>0.02 AND ExperimentId=".$_GET['ex']." Group By project_code, TopicId Order by project_code, AVG(Weight) Desc";
$query = "select PubCategory.Category, TopicId, AVG(weight) as Weight from topicsPerDoc Inner Join PubCategory on topicsPerDoc.DocId= PubCategory.PubId INNER JOIN (Select Category FROM pubCategory GROUP BY Category HAVING Count(*)>10) catCnts1 ON catCnts1.Category = PubCategory.category where weight>0.02 AND ExperimentId=? group By PubCategory.Category , TopicId order by  pubCategory.Category, Weight desc, TopicId";
$memQuery = "select PubCategory.Category, TopicId, AVG(weight) as Weight from topicsPerDoc Inner Join PubCategory on topicsPerDoc.DocId= PubCategory.PubId INNER JOIN (Select Category FROM pubCategory GROUP BY Category HAVING Count(*)>10) catCnts1 ON catCnts1.Category = PubCategory.category where weight>0.02 AND ExperimentId=".$_GET['ex']." group By PubCategory.Category , TopicId order by  pubCategory.Category, Weight desc, TopicId";
$querykey = "KEY" . md5($memQuery);
$grants = $meminstance->get($querykey);

if (!$grants) {

	$grants = array();

	$stmt = $mydb->doPrepare($query);
	$stmt = $mydb->doExecute($stmt,array($_GET['ex']));

	$res = $stmt->fetch();
	do {
		if(!isset($grants[$res[0]]))
			$grants[$res[0]] = array();
		if(count($grants[$res[0]])>3)
			continue;
		array_push($grants[$res[0]],array("topic"=>$res[1],"weight"=>$res[2]));	
	} while ($res = $stmt->fetch());

   	$meminstance->set($querykey, $grants, 0, 2592000);		//600 = 10 minutes
	//	print "got result from mysql\n";
}
else{
	//	print "got result from memcached\n";
}

// for fundedarxiv.db
//$query = "select * from topicdescriptionview where ExperimentId=?";
//for openaire.db
$query = "select TopicId,Item, WeightedCounts from topicdescriptionview where ExperimentId=? Order By TopicID ASC, WeightedCounts DESC";
$memQuery = "select TopicId,Item, WeightedCounts from topicdescriptionview where ExperimentId=".$_GET['ex']." Order By TopicID ASC, WeightedCounts Desc";
$querykey = "KEY" . md5($memQuery);
$topics = $meminstance->get($querykey);

if (!$topics) {
	$topics = array();
	$stmt = $mydb->doPrepare($query);
	$stmt = $mydb->doExecute($stmt,array($_GET['ex']));
	$res = $stmt->fetch();
	do {
		if(!isset($topics[$res[0]]))
			$topics[$res[0]] = array();
		if(count($topics[$res[0]])>9)
			continue;
		// den ta pairnw ola apo katw... mono kapoia apo auta.
// for fundedarxiv.db
//		array_push($topics[$res[0]],array("item"=>$res[1],"counts"=>$res[7]));	
//for openaire.db
		array_push($topics[$res[0]],array("item"=>$res[1],"counts"=>$res[2]));	
	} while ($res = $stmt->fetch());

   	$meminstance->set($querykey, $topics, 0, 2592000);		//600 = 10 minutes
	//	print "got result from mysql\n";
}
else{
	//	print "got result from memcached\n";
}




//for openaire.db
$query = "select TopicId,Item, WeightedCounts from topicdescriptionview where ExperimentId=? Order By TopicID ASC, Counts DESC";
$memQuery = "select TopicId,Item, WeightedCounts from topicdescriptionview where ExperimentId=".$_GET['ex']." Order By TopicID ASC, Counts DESC";
$querykey = "KEY" . md5($memQuery);
$topicsNoSort = $meminstance->get($querykey);

if (!$topicsNoSort) {
	$topicsNoSort = array();
	$stmt = $mydb->doPrepare($query);
	$stmt = $mydb->doExecute($stmt,array($_GET['ex']));
	$res = $stmt->fetch();
	do {
		if(!isset($topicsNoSort[$res[0]]))
			$topicsNoSort[$res[0]] = array();
		if(count($topicsNoSort[$res[0]])>9)
			continue;
		// den ta pairnw ola apo katw... mono kapoia apo auta.
// for fundedarxiv.db
//		array_push($topics[$res[0]],array("item"=>$res[1],"counts"=>$res[7]));	
//for openaire.db
		array_push($topicsNoSort[$res[0]],array("item"=>$res[1],"counts"=>$res[2]));	
	} while ($res = $stmt->fetch());

   	$meminstance->set($querykey, $topicsNoSort, 0, 2592000);		//600 = 10 minutes
	//	print "got result from mysql\n";
}
else{
	//	print "got result from memcached\n";
}


// $query = "select ExperimentId,Description from experiment";
// $querykey = "KEY" . md5($query);
// $experimentsDescription = $meminstance->get($querykey);

// if (!$experimentsDescription) {

// 	$stmt = $mydb->doQuery($query);
// 	$experimentsDescription = $stmt->fetchAll(PDO::FETCH_NUM);

//    	$meminstance->set($querykey, $experimentsDescription, 0, 2592000);		//2592000 = 30 days (maximum for memcached) //600 = 10 minutes
// 	//	print "got result from mysql\n";
// }
// else{
// 	//	print "got result from memcached\n";
// }



$everything = array();
$everything['resp'] = $list;
$everything['grants'] = $grants;
$everything['topics'] = $topics;
$everything['topicsNoSort'] = $topicsNoSort;
$everything['expers'] = $experiments;
//$everything['expersDescr'] = $experimentsDescription;
//	print_r($everything['resp']);

//echo json_decode(json_encode($everything, JSON_UNESCAPED_UNICODE));
// encode in every possibility
echo json_encode($everything,JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);

?>
