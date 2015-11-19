<?php
$myFile = "data/graph_".$_POST["experiment"]."_".$_POST["similarity"]."_".$_POST["gravity"]."_".$_POST["charge"].".json";
$fh = fopen($myFile, 'w') or die("can't open file");
//$stringData = $_POST["data"];

$nodes = str_replace("\\","",$_POST["datanodes"]);
$links = str_replace("\\","",$_POST["datalinks"]);

$everything = array();
$everything['nodes'] = $nodes;
$everything['links'] = $links;
// $everything['nodes'] = json_decode($nodes);
// $everything['links'] = json_decode($links);

//echo json_decode(json_encode($everything, JSON_UNESCAPED_UNICODE));
// encode in every possibility
//echo json_encode($everything,JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE);

//fwrite($fh, $everything);
//fwrite($fh, json_encode($everything,JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE));
fwrite($fh, json_encode($everything,JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE));
//file_put_contents($fh,json_encode($everything));
unset($everything);//release memory
fclose($fh)
?>