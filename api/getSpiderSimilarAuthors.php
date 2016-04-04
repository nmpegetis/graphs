<?php

$max_execution_time = 120;  //300 seconds = 5 minutes
$memory_limit = '4096M';	//'-1';		// unlimited memory
ini_set('max_execution_time', $max_execution_time);
ini_set('memory_limit', $memory_limit);

set_time_limit(0);
$db_name = "PTM3DB_oct15.db";
$db_path = "./dbs/".$db_name;

$pieces = explode("_", $_GET['id']);
$spider_query = "select a1.FirstName, a1.LastName, a2.FirstName, a2.LastName, Similarity, EntityId1, EntityId2 from author as a1, author as a2, EntitySimilarity as es where a1.AuthorId=es.EntityId1 and a2.AuthorId=es.EntityId2 and Similarity>0.7 and (";

foreach ($pieces as $key=>&$value) {
	if ($key > 0)
//        $spider_query .= " or ";
		$spider_query .= " a1.AuthorId='".$value."'  or a2.AuthorId='".$value."'  ";
}
$spider_query .= ")";


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
			if (!in_array($res[2]." ".$res[3], $topicids))
			{
				$topicids[] = $res[2]." ".$res[3];
			}
			$name = $res[0]." ".$res[1];
			array_push($trends,array("group"=>$name,"axis"=>$res[2]." ".$res[3],"value"=>$res[3]*100,"description"=>$res[4],"topicid"=>$res[5]));
		} while ($res = $stmt->fetch());

		$i = 0;
		$filename = "";
		while ($i < count($trends)){
			$authorid = $trends[$i]["description"];
			$authorname = $trends[$i]["group"];
			$filename .= "_".$trends[$i]["description"];
			for ($j=0 ; $j<count($topicids) ; $j++) {
				if ($authorid == $trends[$i]["description"] && $trends[$i]["axis"] == $topicids[$j]){
//                        echo "\n<2-".$authorid."-".$trends[$i]["axis"]."-".$topicids[$j].">\n";
					array_push($trendsAllValues,array("group"=>$trends[$i]["group"],"axis"=>$trends[$i]["axis"],"value"=>$trends[$i]["value"],"description"=>$trends[$i]["description"]));
					$i++;
				}
				else {
//                        echo "\n<1-".$authorid."-".$trends[$i]["axis"]."-".$topicids[$j].">\n";
					array_push($trendsAllValues,array("group"=>$authorname,"axis"=>$topicids[$j],"value"=>0,"description"=>$authorid));
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
