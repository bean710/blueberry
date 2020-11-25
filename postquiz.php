<?php
session_start();
include "db.php";

readfile("html/postquiz.html");

$temp=explode("_",$_GET['trace']);
$temp2=explode("_",$_GET['tracetimes']);
//$temp3=explode("_",$_GET['traceerrors']);
$trace_str="";
$tracetime_str="";
$traceerror_str="";
for ($i=0;$i<count($temp)-1;$i++){
	$trace_str.=$temp[$i]."#";
	$tracetime_str.=$temp2[$i]."#";
	//$str3.=$temp3[$i]."#";
}

$subjnum = $_SESSION['subjnum'];
$cond = $_SESSION['cond'];
$count = $_GET['count'];
$lberries = $_GET['lberries'];
$lpoints = $_GET['lpoints'];
$boughtins = $_GET['boughtins'];
$insprice = $_GET['insprice'];
$insprob = $_GET['insprob'];
$insloss = $_GET['insloss'];
$insev = $_GET['insev'];
$insreasonable = $_GET['insreasonable'];
$insdrought = $_GET['insdrought'];

$practice = $_GET['practice'];


$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//Add to results prepared statement
$addRes = $db->prepare('INSERT INTO results VALUES(:subjnum, :condnum, :levelnum, :numofberries, :numofpoints, :pointsperbb,
	:timeperbb, :errors, :insbought, :insprice, :insprob, :inspotloss, :insev, :insreasonable, :insdroughthappen)');

$addRes->execute(['subjnum' => $subjnum, 'condnum' => $cond, 'levelnum' => $count, 'numofberries' => $lberries,
									'numofpoints' => $lpoints, 'pointsperbb' => $trace_str, 'timeperbb' => $tracetime_str, 'errors' => $traceerror_str,
									'insbought' => $boughtins, 'insprice' => $insprice, 'insprob' => $insprob, 'inspotloss' => $insloss,
									'insev' => $insev, 'insreasonable' => $insreasonable, 'insdroughthappen' => $insdrought]);

 ?>
