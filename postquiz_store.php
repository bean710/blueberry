<?php
session_start();

/*
$dt1=explode("_", $_GET['dt1']);
$dt2=explode("_", $_GET['dt2']);
*/

$dt1=$_GET['dt1']; // Should be a string like: "1,2,2,1,1"
$dt2=$_GET['dt2'];

$ra1=$_GET['ra1']; // Should be a single value like: "5"
$ra2=$_GET['ra2'];

$pqdat=$_SESSION['subjnum'].",".$dt1.",".$ra1.",".$dt2.",".$ra2."\n";

echo $pqdat;

$fh = fopen("./results/postquiz_results.txt", 'a');
fwrite($fh, $pqdat);
fclose($fh);

?>
