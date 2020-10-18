<?php
session_start();
$trace=explode("_",$_GET['trace']);
$tracetimes=explode("_",$_GET['tracetimes']);
$traceerrors=explode("_",$_GET['traceerrors']); //seems to be unused
$trace_str="";
$tracetime_str="";
$traceerror_str="";
for ($i=0; $i<count($trace)-1; $i++){
	$trace_str.=$trace[$i]."#";
	$tracetime_str.=$tracetimes[$i]."#";
	$traceerror_str.=$traceerrors[$i]."#"; //seems to be unused
}

if ($_GET['lberries']>0) // Always true?
	$_SESSION['data'].=$_SESSION['subjnum'].",".$_SESSION['cond'].",".$_GET['count'].",".$_GET['lberries'].",".$_GET['lpoints'].",$trace_str,$tracetime_str,$traceerror_str,";
	$_SESSION['data'].=$_GET['boughtins'].",".$_GET['insid'].",".$_GET['insprice'].",".$_GET['insprob'].",".$_GET['insloss'].",".$_GET['insev'].",".$_GET['insreasonable'].",".$_GET['insdrought']."\n";

if (isset($_GET['endpractice'])){
		$outFile = "./results/practiceresults.txt";
		$fh = fopen($outFile,'a');
		fwrite($fh, $_SESSION['data']);
		fclose($fh);
		$_SESSION['data']="";
}

?>
