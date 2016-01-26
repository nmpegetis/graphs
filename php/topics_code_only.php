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


//$meminstance = new Memcache();
//$meminstance->pconnect('localhost', $memcache_port);

class database1 {
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


$mydb = new database1("sqlite","",0,$db_path,"","");



/////////////////////////
///// TOPICS QUERY //////
/////////////////////////

$query = $query_topics;
$move_elems = array("?");
$set_elems = array($_GET['ex']);
$memQuery = str_replace($move_elems, $set_elems, $query);
$querykey = "KEY" . md5($memQuery);
//$topics = $meminstance->get($querykey);

//if (!$topics) {
    $topics = array();
echo $query;
    $stmt = $mydb->doPrepare($query);
echo $stmt;
    $stmt = $mydb->doExecute($stmt,array($_GET['ex']));
echo $stmt;
//    $stmt = $mydb->doQuery("select * from TopicDescription where VisibilityIndex>=3 and ExperimentId='HEALTHTender_400T_1000IT_6000CHRs_100B_2M_cos'");
    $res = $stmt->fetch();
    do {
        if(!isset($topics[$res[2]]))
            $topics[$res[2]] = array();
        array_push($topics[$res[2]],array("title"=>$res[0]));
    } while ($res = $stmt->fetch());

    $meminstance->set($querykey, $topics, 0, $memcache_time);
    //	print "got result from mysql\n";
//}
//else{
//    //	print "got result from memcached\n";
//}





$everything = array();
$everything['topics'] = $topics;
//	print_r($everything['resp']);

//echo json_decode(json_encode($everything, JSON_UNESCAPED_UNICODE));
// encode in every possibility
$output = json_encode($everything,JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);
echo $output;

$old = umask(0);

//TODO http://stackoverflow.com/questions/8103860/move-uploaded-file-gives-failed-to-open-stream-permission-denied-error-after$file = fopen("../data/layout_".$_GET['ex']."_".$_GET['s'].".json","w");

// cd layouts/acm/data 		or			cd layouts/openaire/data
// sudo chown daemon ./				// set owner the www-data or daemon in order to be able the client to create file
// sudo chmod -R 0755 ./

// write output to file
$myFile = "../data/topics_".$_GET['ex'].".json";
$file = fopen($myFile,"w");
fwrite($file, $output);
fclose($file);

unset($everything);//release memory

?>