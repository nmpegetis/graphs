<?php

ini_set('max_execution_time', $max_execution_time);
//ini_set('memory_limit', '-1');		// unlimited memory
ini_set('memory_limit', $memory_limit);	

set_time_limit(0);
/// ! important
// Firstly memcache should be installed in server to use the class Memcache().
// Check the below:
// http://thelinuxfaq.com/93-how-can-i-configure-memcache-on-xampp-in-linux
// https://www.digitalocean.com/community/tutorials/how-to-install-and-use-memcache-on-ubuntu-14-04
// DON'T FORGET to restart the server at the end


$meminstance = new Memcache();
$meminstance->pconnect('localhost', $memcache_port);

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
            error_log("Failed to prepare query with message: ".$this->db->errorInfo(), 0);
            return false;
		}
		return $stmt;
	}

	function doExecute($stmt,$params){
		if(!$stmt->execute($params)){
            error_log("Failed to execute query with message: ".$stmt->errorInfo(), 0);
            return false;
		}
		return $stmt;
	}

}

if(!isset($_GET['s']) || !isset($_GET['ex'])){
	echo "params not set";
}


$mydb = new database("sqlite","",0,$db_path,"","");



//////////////////////////////
///// GRAPH LAYOUT QUERY /////
//////////////////////////////

$query = $query_graphLayout;
$move_elems = array("=?",">?"); 
$set_elems = array("=".$_GET['ex'],">".$_GET['s']);
$memQuery = str_replace($move_elems, $set_elems, $query);
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

   $meminstance->set($querykey, $list, 0, $memcache_time);		
	//	print "got result from mysql\n";
}
else{
	//	print "got result from memcached\n";
}


//////////////////////////////
///// EXPERIMENTS QUERY //////
//////////////////////////////


$query = $query_experiments;

$querykey = "KEY" . md5($query) . $db_name;		// to distinguish when the experiments are loaded from the correct database <-- a.k.a. each layout has its own database

$experiments = $meminstance->get($querykey);

if (!$experiments) {

	$experiments = array();
	$stmt = $mydb->doQuery($query);
	$res = $stmt->fetch();
	do {
		array_push($experiments,array("id"=>$res[0],"desc"=>$res[1],"Metadata"=>$res[2],"initialSimilarity"=>$res[3],"PhraseBoost"=>$res[4]));
	} while ($res = $stmt->fetch());

   	$meminstance->set($querykey, $experiments, 0, $memcache_time);
	//	print "got result from mysql\n";
}
else{
	//	print "got result from memcached\n";
}


/////////////////////////
///// GRANTS QUERY //////
/////////////////////////


$query = $query_grants;
$move_elems = array("?"); 
$set_elems = array($_GET['ex']);
$memQuery = str_replace($move_elems, $set_elems, $query);
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

   	$meminstance->set($querykey, $grants, 0, $memcache_time);
	//	print "got result from mysql\n";
}
else{
	//	print "got result from memcached\n";
}


/////////////////////////
///// TOPICS QUERY //////
/////////////////////////

$query = $query_topics;
$move_elems = array("?"); 
$set_elems = array($_GET['ex']);
$memQuery = str_replace($move_elems, $set_elems, $query);
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
		array_push($topics[$res[0]],array("item"=>$res[1],"counts"=>$res[2]));	
	} while ($res = $stmt->fetch());

   	$meminstance->set($querykey, $topics, 0, $memcache_time);
	//	print "got result from mysql\n";
}
else{
	//	print "got result from memcached\n";
}


////////////////////////////////////
///// TOPICS NOT SORTED QUERY //////
////////////////////////////////////


$query = $query_topics_nosort;
$move_elems = array("?"); 
$set_elems = array($_GET['ex']);
$memQuery = str_replace($move_elems, $set_elems, $query);
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
		array_push($topicsNoSort[$res[0]],array("item"=>$res[1],"counts"=>$res[2]));	
	} while ($res = $stmt->fetch());

   	$meminstance->set($querykey, $topicsNoSort, 0, $memcache_time);
   	//	print "got result from mysql\n";
}
else{
	//	print "got result from memcached\n";
}



/////////////////////////////////////////
///// TOPICS DISTRIBUTION PER YEAR //////
/////////////////////////////////////////

$query = $query_topicsdistribution;
if ($query != null) {

	$querykey = "KEY" . md5($query) . $db_name;

	$topicsdistribution = $meminstance->get($querykey);

	if (!$topicsdistribution) {

		$topicsdistribution = array();
		$stmt = $mydb->doQuery($query);
		$res = $stmt->fetch();
		do {
			array_push($topicsdistribution,array("id"=>$res[1],"year"=>$res[0],"weight"=>$res[2]));	
		} while ($res = $stmt->fetch());

	   	$meminstance->set($querykey, $topicsdistribution, 0, $memcache_time);
		//	print "got result from mysql\n";
	}
	else{
		//	print "got result from memcached\n";
	}

}
else{
	$topicsdistribution = null;	
}



/////////////////////
///// TREE MAP //////
/////////////////////


if ($query = $query_treemap != null) {

	$querykey = "KEY" . md5($query) . $db_name;

	$treemap = $meminstance->get($querykey);

	if (!$treemap) {

		$treemap = array();
		$stmt = $mydb->doQuery($query);
		$res = $stmt->fetch();
		do {
			array_push($treemap,array("id"=>$res[2],"title"=>$res[0],"year"=>$res[1],"weight"=>$res[3]));	
		} while ($res = $stmt->fetch());

	   	$meminstance->set($querykey, $treemap, 0, $memcache_time);
		//	print "got result from mysql\n";
	}
	else{
		//	print "got result from memcached\n";
}

}
else{
	$treemap = null;	
}



//////////////////////////////////////////////////
///// TOPICS DISTRIBUTION PER YEAR : TRENDS //////
//////////////////////////////////////////////////

$query = $query_trends;
if ($query != null) {

$querykey = "KEY" . md5($query) . $db_name;

$trends = $meminstance->get($querykey);

if (!$trends) {

	$trends = array();
	$stmt = $mydb->doQuery($query);
	$res = $stmt->fetch();
	do {
		array_push($trends,array("id"=>$res[2],"title"=>$res[0],"year"=>$res[1],"weight"=>$res[3]));	
	} while ($res = $stmt->fetch());

   	$meminstance->set($querykey, $trends, 0, $memcache_time);
	//	print "got result from mysql\n";
}
else{
	//	print "got result from memcached\n";
}

}
else{
	$trends = null;	
}



$everything = array();
$everything['resp'] = $list;
$everything['grants'] = $grants;
$everything['topics'] = $topics;
$everything['topicsNoSort'] = $topicsNoSort;
$everything['expers'] = $experiments;
$everything['distribution'] = $topicsdistribution;
$everything['treemap'] = $treemap;
$everything['trends'] = $trends;
//	print_r($everything['resp']);

//echo json_decode(json_encode($everything, JSON_UNESCAPED_UNICODE));
// encode in every possibility
echo json_encode($everything,JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);

?>
