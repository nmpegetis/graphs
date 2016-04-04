<?php

$max_execution_time = 120;  //300 seconds = 5 minutes
$memory_limit = '4096M';	//'-1';		// unlimited memory
ini_set('max_execution_time', $max_execution_time);
ini_set('memory_limit', $memory_limit);

set_time_limit(0);
$db_name = "PTM3DB_oct15.db";
$db_path = "./dbs/".$db_name;

$pieces = explode("_", $_GET['id']);
$spider_query = "select Title, Item, WeightedCounts, TopicId from topicsweightsort as tw where ";
foreach ($pieces as $key=>&$value) {
	if ($key > 0)
		$spider_query .= " or ";
	$spider_query .= "tw.TopicId='".$value."'  ";
}
$spider_query .= " order by tw.topicid ";


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
$query = $spider_query;

	if ($query != null) {

		$trends = array();
		$trendsAllValues = array();
		$stmt = $mydb->doQuery($query);

		$res = $stmt->fetch();


		$topicids=array();
		do {

//array with topics deduplicated
			if (!in_array($res[1], $topicids))
			{
				$topicids[] = $res[1];
			}
			array_push($trends,array("group"=>$res[0],"axis"=>$res[1],"value"=>$res[2],"description"=>$res[2],"topicid"=>$res[3]));
		} while ($res = $stmt->fetch());

		$i = 0;
		$filename = "";
		$percent = $trends[0]["value"];
		while ($i < count($trends)){
			$authorid = $trends[$i]["group"];
			$filename .= "_".$trends[$i]["topicid"];
			for ($j=0 ; $j<count($topicids) ; $j++) {
				if ($authorid == $trends[$i]["group"] && $trends[$i]["axis"] == $topicids[$j]){
//                        echo "\n<2-".$authorid."-".$trends[$i]["axis"]."-".$topicids[$j].">\n";
					array_push($trendsAllValues,array("group"=>$trends[$i]["group"],"axis"=>$trends[$i]["axis"],"value"=>$trends[$i]["value"]/$percent*100,"description"=>$trends[$i]["description"]));
					$i++;
				}
				else {
//                        echo "\n<1-".$authorid."-".$trends[$i]["axis"]."-".$topicids[$j].">\n";
					array_push($trendsAllValues,array("group"=>$authorid,"axis"=>$topicids[$j],"value"=>0,"description"=>0));
				}
			}
		}
//            print_r($trends);
//            print_r($trendsAllValues);
	}
	else{
		$trends = null;
        $trendsAllValues = null;
	}


$everything['spider'] = $trendsAllValues;


//	print_r($everything['resp']);

//echo json_decode(json_encode($everything, JSON_UNESCAPED_UNICODE));
// encode in every possibility
$output = json_encode($everything,JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
echo $output;


unset($everything);//release memory

?>
