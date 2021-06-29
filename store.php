<?php
session_start();
include 'db.php';

$trace=explode("_",$_GET['trace']);
$tracetimes=explode("_",$_GET['tracetimes']);
//$traceerrors=explode("_",$_GET['traceerrors']); //seems to be unused
$trace_str="";
$tracetime_str="";
$traceerror_str="";
for ($i=0; $i<count($trace)-1; $i++){
	$trace_str.=$trace[$i]."#";
	$tracetime_str.=$tracetimes[$i]."#";
	//$traceerror_str.=$traceerrors[$i]."#"; //seems to be unused
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
//Add to practice prepared statement
$addPrac = $db->prepare('INSERT INTO practice VALUES(:subjnum, :condnum, :levelnum, :numofberries, :numofpoints, :pointsperbb,
	:timeperbb, :errors, :insbought, :insprice, :insprob, :inspotloss, :insev, :insreasonable, :insdroughthappen)');

$removeRes = $db->prepare('DELETE FROM results WHERE subjnum=:subjnum AND levelnum>=:levelnum');
$removePrac = $db->prepare('DELETE FROM practice WHERE subjnum=:subjnum AND levelnum>=:levelnum');

echo "store message recieved";

if ($practice == 1) {
	echo "entering into practice";
	$removePrac->execute(['subjnum' => $subjnum, 'levelnum' => $count]);
	$addPrac->execute(['subjnum' => $subjnum, 'condnum' => $cond, 'levelnum' => $count, 'numofberries' => $lberries,
										'numofpoints' => $lpoints, 'pointsperbb' => $trace_str, 'timeperbb' => $tracetime_str, 'errors' => $traceerror_str,
										'insbought' => $boughtins, 'insprice' => $insprice, 'insprob' => $insprob, 'inspotloss' => $insloss,
										'insev' => $insev, 'insreasonable' => $insreasonable, 'insdroughthappen' => $insdrought]);
} else {
	$removeRes->execute(['subjnum' => $subjnum, 'levelnum' => $count]);
	$addRes->execute(['subjnum' => $subjnum, 'condnum' => $cond, 'levelnum' => $count, 'numofberries' => $lberries,
										'numofpoints' => $lpoints, 'pointsperbb' => $trace_str, 'timeperbb' => $tracetime_str, 'errors' => $traceerror_str,
										'insbought' => $boughtins, 'insprice' => $insprice, 'insprob' => $insprob, 'inspotloss' => $insloss,
										'insev' => $insev, 'insreasonable' => $insreasonable, 'insdroughthappen' => $insdrought]);
}


?>
