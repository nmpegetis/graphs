<?php
$myFile = "data/graph_".$_POST["experiment"]."_".$_POST["similarity"]."_".$_POST["gravity"]."_".$_POST["charge"].".json";
$fh = fopen($myFile, 'w') or die("can't open file");
//$stringData = $_POST["data"];

$everything = array();
$everything['nodes'] = $_POST["datanodes"];
$everything['links'] = $_POST["datalinks"];

//echo json_decode(json_encode($everything, JSON_UNESCAPED_UNICODE));
// encode in every possibility
//echo json_encode($everything,JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);

//fwrite($fh, $everything);
//fwrite($fh, json_encode($everything,JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE));
fwrite($fh, json_encode($everything));
//file_put_contents($fh,json_encode($everything));
unset($everything);//release memory
fclose($fh)
?>