<?php
	$FileName='75rec.txt';
	$FilePath=dirname(__FILE__).'/source/';
	if(file_exists($FilePath.$FileName)){
		$OpenFile = fopen($FilePath.$FileName, "r");
		$ContentArray=array();
		if ($OpenFile) {
		    while (!feof($OpenFile)) {
		        $linetext=fgets($OpenFile, 2048);
		        $ContentArray=explode(",", $linetext);
		    }
		    fclose($OpenFile);
		}
		$ContentArray=array_diff($ContentArray, array(null,'null','',' '));
		echo json_encode($ContentArray);
		
	}else{
		echo "none";
	}

?>