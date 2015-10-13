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
                    error_log("not known database type", 0);
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
            error_log("Failed to do query with message: ".$this->db->errorInfo(), 0);
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

if(!isset($_GET['ex'])){
    echo "Parameter 'ex' on URL not set";
}


$mydb = new database("sqlite","",0,$db_path,"","");


//////////////////////////////////////////////////
///// TOPICS DISTRIBUTION PER YEAR : TRENDS //////
//////////////////////////////////////////////////

$everything = array();
$allTrends = array();

foreach ($trends_queries as $key => $query) {
	if ($query != null) {

		$memQuery = $query;
		$querykey = "KEY" . md5($memQuery) . $db_name;

		$trends = $meminstance->get($querykey);

		if (!$trends) {

			$trends = array();
			$stmt = $mydb->doQuery($query);

			$res = $stmt->fetch();
			do {
				array_push($trends,array("id"=>$res[1],"year"=>$res[0],"weight"=>$res[2],"avgweight"=>$res[5]));
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

	// each time push the trends in allTrends
	array_push($allTrends,$trends);

}

// finally put them all in everything["trends"]
$everything['trends'] = $allTrends;


/////////////////////
///// TREE MAP //////
/////////////////////

$query = $query_heatmap;
if ($query != null) {

	$memQuery = $query;
	$querykey = "KEY" . md5($memQuery) . $db_name;
	
	$heatmap = $meminstance->get($querykey);

	if (!$heatmap) {

		$heatmap = array();
		$stmt = $mydb->doQuery($query);
		$res = $stmt->fetch();
		do {
			array_push($heatmap,array("title"=>$res[0],"id"=>$res[1],"weight"=>$res[2]));	
		} while ($res = $stmt->fetch());

	   	$meminstance->set($querykey, $heatmap, 0, $memcache_time);
		//	print "got result from mysql\n";
	}
	else{
		//	print "got result from memcached\n";
	}
}
else{
	$heatmap = null;	
}

$everything['heatmap'] = $heatmap;


// todo to be uncommented if stand alone and topics not loaded from graph visualization

/////////////////////////
///// TOPICS QUERY //////
/////////////////////////
//
//$query = $query_topics;
//$move_elems = array("?");
//$set_elems = array($_GET['ex']);
//$memQuery = str_replace($move_elems, $set_elems, $query);
//$querykey = "KEY" . md5($memQuery);
//$topics = $meminstance->get($querykey);
//
//if (!$topics) {
//	$topics = array();
//	$stmt = $mydb->doPrepare($query);
//	$stmt = $mydb->doExecute($stmt,array($_GET['ex']));
//	$res = $stmt->fetch();
//	do {
//		if(!isset($topics[$res[0]]))
//			$topics[$res[0]] = array();
//		if(count($topics[$res[0]])>9)
//			continue;
//		array_push($topics[$res[0]],array("item"=>$res[1],"counts"=>$res[2]));
//	} while ($res = $stmt->fetch());
//
//	$meminstance->set($querykey, $topics, 0, $memcache_time);
//	//	print "got result from mysql\n";
//}
//else{
//	//	print "got result from memcached\n";
//}
//
//
////////////////////////////////////
///// TOPICS NOT SORTED QUERY //////
////////////////////////////////////
//
//
//$query = $query_topics_nosort;
//$move_elems = array("?");
//$set_elems = array($_GET['ex']);
//$memQuery = str_replace($move_elems, $set_elems, $query);
//$querykey = "KEY" . md5($memQuery);
//$topicsNoSort = $meminstance->get($querykey);
//
//if (!$topicsNoSort) {
//	$topicsNoSort = array();
//	$stmt = $mydb->doPrepare($query);
//	$stmt = $mydb->doExecute($stmt,array($_GET['ex']));
//	$res = $stmt->fetch();
//	do {
//		if(!isset($topicsNoSort[$res[0]]))
//			$topicsNoSort[$res[0]] = array();
//		if(count($topicsNoSort[$res[0]])>9)
//			continue;
//		array_push($topicsNoSort[$res[0]],array("item"=>$res[1],"counts"=>$res[2]));
//	} while ($res = $stmt->fetch());
//
//	$meminstance->set($querykey, $topicsNoSort, 0, $memcache_time);
//	//	print "got result from mysql\n";
//}
//else{
//	//	print "got result from memcached\n";
//}


// todo to be uncommented if stand alone and topics not loaded from graph visualization
//$everything['topics'] = $topics;
//$everything['topicsNoSort'] = $topicsNoSort;

//	print_r($everything['resp']);

//echo json_decode(json_encode($everything, JSON_UNESCAPED_UNICODE));
// encode in every possibility
$output = json_encode($everything,JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
echo $output;

$file = fopen("../data/trends_".$_GET['ex'].".json","w");
fwrite($file, $output);
fclose($file);

unset($everything);//release memory

?>
