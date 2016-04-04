<?php

$max_execution_time = 120;  //300 seconds = 5 minutes
$memory_limit = '4096M';	//'-1';		// unlimited memory
ini_set('max_execution_time', $max_execution_time);
ini_set('memory_limit', $memory_limit);

set_time_limit(0);
$db_name = "PTM3DB_oct15.db";
$db_path = "./dbs/".$db_name;

$pieces = explode("_", $_GET['id']);
$trend_query = "select Title, Item, WeightedCounts, TopicId from topicsweightsort as tw where ";
foreach ($pieces as $key=>&$value) {
	if ($key > 0)
		$trend_query .= " or ";
	$trend_query .= "tw.TopicId='".$value."'  ";
}
$trend_query .= " order by tw.topicid ";

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

//foreach ($trends_queries as $key => $query) {
$query = $trend_query;


		$memQuery = $query;


			$trends = array();
			$stmt = $mydb->doQuery($query);

			$res = $stmt->fetch();
			do {
				array_push($trends,array("id"=>$res[3],"year"=>$res[1],"weight"=>$res[2],"avgweight"=>$res[0]));
			} while ($res = $stmt->fetch());


// finally put them all in everything["trends"]
//$everything['trends'] = $allTrends;
$everything['trends'] = $trends;


//	print_r($everything['resp']);

//echo json_decode(json_encode($everything, JSON_UNESCAPED_UNICODE));
// encode in every possibility
$output = json_encode($everything,JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
echo $output;

// todo do the below if needed to write output to file
//$file = fopen("../data/trends_".$_GET['ex'].".json","w");
//fwrite($file, $output);
//fclose($file);

unset($everything);//release memory

?>