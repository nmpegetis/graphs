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

if(!isset($_GET['ex'])){
	echo "params not set";
}


$mydb = new database("sqlite","",0,$db_path,"","");


//////////////////////////////////////////////////
///// TOPICS DISTRIBUTION PER YEAR : TRENDS //////
//////////////////////////////////////////////////


//$query = $query_trends;


$everything = array();

foreach ($trendsX as $key => $query) {
	if ($query != null) {

		$memQuery = $query;
		$querykey = "KEY" . md5($memQuery) . $db_name;

		$trends = $meminstance->get($querykey);

		if (!$trends) {

			$trends = array();
			$stmt = $mydb->doQuery($query);
			// $res = $stmt->fetch();
			// do {
			// 	array_push($trends,array("id"=>$res[2],"title"=>$res[0],"year"=>$res[1],"weight"=>$res[3]));
			// } while ($res = $stmt->fetch());

			// $res = $stmt->fetch();
			// do {
			// 	if(!isset($trends[$res[1]]))
			// 		$trends[$res[1]] = array();
			// 	array_push($trends[$res[1]],array("id"=>$res[1],"year"=>$res[0],"weight"=>$res[4],"avgweight"=>$res[3]));
			// } while ($res = $stmt->fetch());

	//		$res = $stmt->fetch();
	//		do {
	//			array_push($trends,array("id"=>$res[1],"year"=>$res[0],"weight"=>$res[4],"avgweight"=>$res[3]));
	//		} while ($res = $stmt->fetch());

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

	$everything['trends'.$key] = $trends;

}


/////////////////////
///// TREE MAP //////
/////////////////////

$query = $query_treemap;
if ($query != null) {

	$memQuery = $query;
	$querykey = "KEY" . md5($memQuery) . $db_name;
	
	$treemap = $meminstance->get($querykey);

	if (!$treemap) {

		$treemap = array();
		$stmt = $mydb->doQuery($query);
		$res = $stmt->fetch();
		do {
			array_push($treemap,array("title"=>$res[0],"id"=>$res[1],"weight"=>$res[2]));	
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

$everything['treemap'] = $treemap;

////////////////////////////////////////////////////////////////////////////////////////////////////
///// TOPICS DISTRIBUTION PER YEAR : TRENDS1 (Journal:CACM, Communications of the ACM ISSN: 00010782)//////
////////////////////////////////////////////////////////////////////////////////////////////////////
//
//$query = $query_trends1;
//
//if ($query != null) {
//
//	$memQuery = $query;
//	$querykey = "KEY" . md5($memQuery) . $db_name;
//
//	$trends1 = $meminstance->get($querykey);
//
//	if (!$trends1) {
//
//		$trends1 = array();
//		$stmt = $mydb->doQuery($query);
//		$res = $stmt->fetch();
//		do {
//			array_push($trends1,array("id"=>$res[1],"year"=>$res[0],"weight"=>$res[2],"avgweight"=>$res[5]));
//		} while ($res = $stmt->fetch());
//
//		$meminstance->set($querykey, $trends1, 0, $memcache_time);
//		//	print "got result from mysql\n";
//	}
//	else{
//		//	print "got result from memcached\n";
//	}
//}
//else{
//	$trends1 = null;
//}
//
//
//////////////////////////////////////////////////////////////////////////////////////////////////////
/////// TOPICS DISTRIBUTION PER YEAR : TRENDS2 (Journal:ACM SIGSOFT Software Engineering Notes, 01635948)//////
//////////////////////////////////////////////////////////////////////////////////////////////////////
//
//$query = $query_trends2;
//
//if ($query != null) {
//
//	$memQuery = $query;
//	$querykey = "KEY" . md5($memQuery) . $db_name;
//
//	$trends2 = $meminstance->get($querykey);
//
//	if (!$trends2) {
//
//		$trends2 = array();
//		$stmt = $mydb->doQuery($query);
//		$res = $stmt->fetch();
//		do {
//			array_push($trends2,array("id"=>$res[1],"year"=>$res[0],"weight"=>$res[2],"avgweight"=>$res[5]));
//		} while ($res = $stmt->fetch());
//
//		$meminstance->set($querykey, $trends2, 0, $memcache_time);
//		//	print "got result from mysql\n";
//	}
//	else{
//		//	print "got result from memcached\n";
//	}
//}
//else{
//	$trends2 = null;
//}
//
//
//
//////////////////////////////////////////////////////////////////////////////////////////////////////
/////// TOPICS DISTRIBUTION PER YEAR : TRENDS3 (Journal:Journal of the ACM : 00045411)//////
//////////////////////////////////////////////////////////////////////////////////////////////////////
//
//$query = $query_trends3;
//
//if ($query != null) {
//
//	$memQuery = $query;
//	$querykey = "KEY" . md5($memQuery) . $db_name;
//
//	$trends3 = $meminstance->get($querykey);
//
//	if (!$trends3) {
//
//		$trends3 = array();
//		$stmt = $mydb->doQuery($query);
//		$res = $stmt->fetch();
//		do {
//			array_push($trends3,array("id"=>$res[1],"year"=>$res[0],"weight"=>$res[2],"avgweight"=>$res[5]));
//		} while ($res = $stmt->fetch());
//
//		$meminstance->set($querykey, $trends3, 0, $memcache_time);
//		//	print "got result from mysql\n";
//	}
//	else{
//		//	print "got result from memcached\n";
//	}
//}
//else{
//	$trends3 = null;
//}
//
//
//////////////////////////////////////////////////////////////////////////////////////////////////////
/////// TOPICS DISTRIBUTION PER YEAR : TRENDS4 (Journal:ACM SIGMOD Record: 01635808)//////
//////////////////////////////////////////////////////////////////////////////////////////////////////
//
//$query = $query_trends4;
//
//if ($query != null) {
//
//	$memQuery = $query;
//	$querykey = "KEY" . md5($memQuery) . $db_name;
//
//	$trends4 = $meminstance->get($querykey);
//
//	if (!$trends4) {
//
//		$trends4 = array();
//		$stmt = $mydb->doQuery($query);
//		$res = $stmt->fetch();
//		do {
//			array_push($trends4,array("id"=>$res[1],"year"=>$res[0],"weight"=>$res[2],"avgweight"=>$res[5]));
//		} while ($res = $stmt->fetch());
//
//		$meminstance->set($querykey, $trends4, 0, $memcache_time);
//		//	print "got result from mysql\n";
//	}
//	else{
//		//	print "got result from memcached\n";
//	}
//}
//else{
//	$trends4 = null;
//}
//
//
//
//////////////////////////////////////////////////////////////////////////////////////////////////////
/////// TOPICS DISTRIBUTION PER YEAR : TRENDS5 (Journal:ACM SIGPLAN Notices: 03621340)//////
//////////////////////////////////////////////////////////////////////////////////////////////////////
//
//$query = $query_trends5;
//
//if ($query != null) {
//
//	$memQuery = $query;
//	$querykey = "KEY" . md5($memQuery) . $db_name;
//
//	$trends5 = $meminstance->get($querykey);
//
//	if (!$trends5) {
//
//		$trends5 = array();
//		$stmt = $mydb->doQuery($query);
//		$res = $stmt->fetch();
//		do {
//			array_push($trends5,array("id"=>$res[1],"year"=>$res[0],"weight"=>$res[2],"avgweight"=>$res[5]));
//		} while ($res = $stmt->fetch());
//
//		$meminstance->set($querykey, $trends5, 0, $memcache_time);
//		//	print "got result from mysql\n";
//	}
//	else{
//		//	print "got result from memcached\n";
//	}
//}
//else{
//	$trends5 = null;
//}
//
//
//
//////////////////////////////////////////////////////////////////////////////////////////////////////
/////// TOPICS DISTRIBUTION PER YEAR : TRENDS6 (ACM SIGGRAPH Computer Graphics: 00978930)//////
//////////////////////////////////////////////////////////////////////////////////////////////////////
//
//$query = $query_trends6;
//
//if ($query != null) {
//
//	$memQuery = $query;
//	$querykey = "KEY" . md5($memQuery) . $db_name;
//
//	$trends6 = $meminstance->get($querykey);
//
//	if (!$trends6) {
//
//		$trends6 = array();
//		$stmt = $mydb->doQuery($query);
//		$res = $stmt->fetch();
//		do {
//			array_push($trends6,array("id"=>$res[1],"year"=>$res[0],"weight"=>$res[2],"avgweight"=>$res[5]));
//		} while ($res = $stmt->fetch());
//
//		$meminstance->set($querykey, $trends6, 0, $memcache_time);
//		//	print "got result from mysql\n";
//	}
//	else{
//		//	print "got result from memcached\n";
//	}
//}
//else{
//	$trends6 = null;
//}



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

//
//
//$everything = array();
//// $everything['distribution'] = $topicsdistribution;
//$everything['treemap'] = $treemap;
//$everything['trends'] = $trends;
//$everything['trends1'] = $trends1;
//$everything['trends2'] = $trends2;
//$everything['trends3'] = $trends3;
//$everything['trends4'] = $trends4;
//$everything['trends5'] = $trends5;
//$everything['trends6'] = $trends6;
// todo to be uncommented if stand alone and topics not loaded from graph visualization
//$everything['topics'] = $topics;
//$everything['topicsNoSort'] = $topicsNoSort;

//	print_r($everything['resp']);

//echo json_decode(json_encode($everything, JSON_UNESCAPED_UNICODE));
// encode in every possibility
echo json_encode($everything,JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
unset($everything);//release memory

?>
