<?php
require_once('loadconfig.php');

$FilePath=dirname(__FILE__).'/source/';
$FileName="75rec.txt";
$RecFilePath=$FilePath.$FileName;
$ActionType=$_POST["Type"];

switch($ActionType){
	case 'newnum':
		$SeedMaxNum=$ini_ConfigItems['RndMaxNumber'];
		$SeedRem=$SeedMaxNum-count(GetRecArray());
		GetNewRndNum($SeedMaxNum,$SeedRem);
		echo true;
		# code...
		break;
	case 'confini':
		echo true;
		break;
	case 'resetrec':
		ResetRec($RecFilePath);
		echo true;
		break;
}

function GetRecArray(){
	$ContentArray=array();
	global $RecFilePath;
	if(is_file($RecFilePath)){
		$OpenFile = fopen($RecFilePath, "r");
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
	$RndStop=0;
	if($CurrCount>0){
		while($RndStop==0){
			$sn = rand(1,$maxnum); 
			if(!in_array($sn,GetRecArray())){
				SaveRec($sn);
				$RndStop=1;
			}
		}
		$result=$sn;
	}else{
		$result="end";
	}
	return $result;
}

function SaveRec($SaveData){
	global $RecFilePath;
	$WriteFile = fopen($RecFilePath, "a");
	$SaveData=$SaveData.",";
	fwrite($WriteFile, $SaveData);
	fclose($WriteFile);
}

function ResetRec($DelFileName){
	if(is_file($DelFileName)){
		unlink($DelFileName);
	}

}

function SaveConfig(){
	
}

?>