<?php
session_start();

include 'db.php';

/*
$dt1=explode("_", $_GET['dt1']);
$dt2=explode("_", $_GET['dt2']);
*/

$dt1=$_GET['dt1']; // Should be a string like: "7.1:1,7.3:2,7.9:2,7.10:1,7.11:1" as question:answer
$dt2=$_GET['dt2'];

$ra1=$_GET['ra1']; // Should be a single value like: "5:5" as question:answer
$ra2=$_GET['ra2'];

$pq = $db->prepare('INSERT INTO postquiz VALUES(:subjnum, :dt1, :ra1, :dt2, :ra2)');
$pq->execute(['subjnum' => $_SESSION['subjnum'], 'dt1' => $dt1, 'ra1' => $ra1, 'dt2' => $dt2, 'ra2' => $ra2]);

/*
$pqdat=$_SESSION['subjnum'].",".$dt1.",".$ra1.",".$dt2.",".$ra2."\n";

echo $pqdat;

$fh = fopen("./results/postquiz_results.txt", 'a');
fwrite($fh, $pqdat);
fclose($fh);
*/

?>
