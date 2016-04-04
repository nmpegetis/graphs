<?php

$max_execution_time = 120;  //300 seconds = 5 minutes
$memory_limit = '4096M';	//'-1';		// unlimited memory
ini_set('max_execution_time', $max_execution_time);
ini_set('memory_limit', $memory_limit);

set_time_limit(0);
$db_name = "fp7mar16.db";
$db_path = "./dbs/".$db_name;

$query_graphLayout = "select * from mygraph";
$query_experiments = "select * from myexperiment";
$query_nodes = "select project_code, TopicId, weight
 from mynodes
 where ExperimentId=?";
$query_topics = "select TopicId, Item, WeightedCounts from
  mytopics
where experimentid=?";
$query_topics_nosort = "select TopicId, Item, WeightedCounts from
  mytopics
where experimentid=?";
$query_topicsdistribution = null;
$query_heatmap = null;
$query_trends = null;


class database {
	private $db,$last_query = null;

	function __construct($type,$host,$port,$name,$username,$password){
		try {
			switch($type){
				case 'postgres':
					try{
						$this->db = new PDO('pgsql:host='.$host.';port='.$port.';dbname='.$name.';user='.$username.';password='.$password);
					}
					catch(PDOException $e){
						echo $e->getMessage();
					}
					break;
				case 'sqlite':
					try{
						$this->db = new PDO('sqlite:'.$name);
					}
					catch(PDOException $e){
						echo $e->getMessage();
					}
					break;
				default:
					error_log("not known database type", 0);
					break;
			}
		} catch(Exception $e){
			echo "oops..".$e->getMessage()."\n";
			exit;
		}
	}

	function doQuery($query){
//print_r(SQLite3::version());
		$stmt = $this->db->query($query);
		$this->last_query = $query;
		if(!$stmt){
			error_log("Failed to do query with message: ".print_r($this->db->errorInfo()), 0);
			return false;
		}
		return $stmt;
	}

	function doPrepare($query){
		$stmt = $this->db->prepare($query);
		$this->last_query = $query;
		if(!$stmt){
            error_log("Failed to prepare query with message: ".print_r($this->db->errorInfo()), 0);
            return false;
		}
		return $stmt;
	}

	function doExecute($stmt,$params){
		if(!$stmt->execute($params)){
            error_log("Failed to execute query with message: ".print_r($stmt->errorInfo()), 0);
            return false;
		}
		return $stmt;
	}

}

if(!isset($_GET['s']) || !isset($_GET['ex'])){
	echo "Parameters 's' and 'ex' on URL not set";
}


$mydb = new database("sqlite","",0,$db_path,"","");

//////////////////////////////
///// GRAPH LAYOUT QUERY /////
//////////////////////////////

$query = $query_graphLayout;
//$stmt = $mydb->doPrepare($query);
//var_dump($mydb);
//var_dump($mydb);
//	$stmt = $mydb->doExecute($stmt,array($_GET['ex'],$_GET['s']));
$stmt = $mydb->doQuery($query);
//var_dump($mydb);
//print_r($mydb->query($query));
// instead of fetching all together... delay a little but for sure change the encoding of each one
//	$list = $stmt->fetchAll();
while($row = $stmt->fetch())
{
	foreach($row as &$value)
	{
		$value = mb_convert_encoding($value, "UTF-8", "Windows-1252");
	}
	unset($value); # safety: remove reference

	$list[] = array_map('utf8_encode', $row );
}
	//print_r($list);


//////////////////////////////
///// EXPERIMENTS QUERY //////
//////////////////////////////


$query = $query_experiments;

$experiments = array();
	$stmt = $mydb->doQuery($query);
	$res = $stmt->fetch();
do {
	array_push($experiments,array("id"=>$res[0],"desc"=>$res[1],"initialSimilarity"=>$res[2]));
} while ($res = $stmt->fetch());


/////////////////////////
///// GRANTS QUERY //////
/////////////////////////


$query = $query_nodes;

$nodes = array();
 $stmt = $mydb->doPrepare($query);
 $stmt = $mydb->doExecute($stmt,array($_GET['ex']));

$res = $stmt->fetch();
do {
	if(!isset($nodes[$res[0]]))
		$nodes[$res[0]] = array();
	if(count($nodes[$res[0]])>3)
		continue;
	array_push($nodes[$res[0]],array("topic"=>$res[1],"weight"=>$res[2]));
} while ($res = $stmt->fetch());

/////////////////////////
///// TOPICS QUERY //////
/////////////////////////

$query = $query_topics;
$topics = array();
$stmt = $mydb->doPrepare($query);
$stmt = $mydb->doExecute($stmt,array($_GET['ex']));
$res = $stmt->fetch();
do {
	if(!isset($topics[$res[0]]))
		$topics[$res[0]] = array();
	if(count($topics[$res[0]])>9)
		continue;
	array_push($topics[$res[0]],array("item"=>$res[1],"counts"=>$res[2],"title"=>"aaaa"));
} while ($res = $stmt->fetch());


// ////////////////////////////////////
// ///// TOPICS NOT SORTED QUERY //////
// ////////////////////////////////////


$query = $query_topics_nosort;

$topicsNoSort = array();
$stmt = $mydb->doPrepare($query);
$stmt = $mydb->doExecute($stmt,array($_GET['ex']));
$res = $stmt->fetch();
do {
	if(!isset($topicsNoSort[$res[0]]))
		$topicsNoSort[$res[0]] = array();
	if(count($topicsNoSort[$res[0]])>9)
		continue;
	array_push($topicsNoSort[$res[0]],array("item"=>$res[1],"counts"=>$res[2],"title"=>$res[3]));
} while ($res = $stmt->fetch());


$everything = array();
$everything['resp'] = $list;
$everything['nodes'] = $nodes;
$everything['topics'] = $topics;
$everything['topicsNoSort'] = $topicsNoSort;
$everything['expers'] = $experiments;
//	print_r($everything['resp']);

//echo json_decode(json_encode($everything, JSON_UNESCAPED_UNICODE));
// encode in every possibility
$output = json_encode($everything,JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
echo $output;

unset($everything);//release memory

?>
