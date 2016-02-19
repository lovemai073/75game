<?php
require_once('loadconfig.php');

$ActionType=$_POST["Type"];
switch($ActionType){
	case 'newnum':
		# code...
		break;
	case 'variable':
			# code...
		break;
}
function GetRecArray(){
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
	}
	return $ContentArray;
}



function GetNewRndNum($maxnum,$CurrCount){
	if($recArray==null){
		$isfirst=True;
	}else{
		$isfirst=False;
	}
	$ctn=0;
	if($CurrCount>0){
		while($ctn==0){
			$sn = rand(1,$maxnum); 
			if(!in_array($sn,GetRecArray())){
				SaveRec($sn);
				$ctn=1;
			}
		}
		$result=$sn;
	}else{
		$result="end";
	}
	return $result;
}

function SaveRec($SaveData){
	$FileName="75rec.txt";
	$FilePath=dirname(__FILE__).'/source/';
	$WriteFile = fopen($FilePath.$FileName, "a");
	$SaveData=$SaveData.",";
	fwrite($WriteFile, $SaveData);
	fclose($WriteFile);
}
function SaveConfig(){
	
}
GetNewRndNum(75,2);
?>