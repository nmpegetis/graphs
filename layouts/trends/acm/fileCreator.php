<?php
	function csv(){
	   	$csv = $_POST['csv'];
	   	$id = $_POST['id'];
	   	$info = $csv;		// json encode not needed
		$filename = "../data/"+$id+".csv";

// $fh = fopen( 'Names.csv', 'w' );
// ftruncate($fh,0);

// fclose($fh);

	   $file = fopen($filename,'w');

	   fwrite($file, $info);
	   fclose($file);

	}
?>
