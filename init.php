<?php
#session_start();

function init ($numconds) {

	include 'db.php';

	$getsett = $db->prepare('SELECT val FROM settings WHERE id=?');
	$setsett = $db->prepare('UPDATE settings SET val=? WHERE id=?');

	/*
	$subjFile = "results/subj.txt";
	$condFile = "results/cond.txt";
	*/

	// $numconds is the REAL number of conditions.

	//$numconds = $numconds - 1; 			// Don't change this.

	//GET THE CURRENT SUBJECT NUMBER
	$getsett->execute(['subjnum']);
	$subj = $getsett->fetch()[0];

	//INCREMENT SUBJECT NUMBER LOCALLY
	$strresults = $subj + 1;

	//UPDATE SUBJECT NUMBER IN DATABASE
	$setsett->execute([$strresults, 'subjnum']);


	//GET THE CURRENT CONDITION NUMBER
	$getsett->execute(['condnum']);
	$num = $getsett->fetch()[0];


	//CONDITIONALLY INCREMENT CONDITION NUMBER LOCALLY
	$strresults = $num + 1;

	// Numconds is passed in by intro for the number of conditions
	// originally for borrowing being enabled or not, but now unused
	if ($num == $numconds - 1) {
		$strresults = "0";
	}

	//UPDATE CONDITION NUMBER IN DATABASE
	$setsett->execute([$strresults, 'condnum']);

	if ($num == 0 || $num == 3) {
		$insdat = file_get_contents("./results/poordat.csv");
	}
	else {
		$insdat = file_get_contents("./results/richdat.csv");
	}

	$borrow = file_get_contents("./results/canborrow.txt");

	$_SESSION['cond'] = $num;			// set condition and subject variables
	$_SESSION['subjnum'] = $subj;
	$_SESSION['insdata'] = $insdat;
	$_SESSION['cborrow'] = $borrow;

}

function ipCheck() {
	$ipFile = "./results/ip.txt";
	$file = file_get_contents($ipFile);
	$ip = $_SERVER['REMOTE_ADDR'];

	if(strpos($file, $ip)===false) {
		$fh = fopen($ipFile,'a');
		$strresults = "ip" . $ip . "\n";
		fwrite($fh,$strresults);
		fclose($fh);
		return false;
	}
	else {
		return true;
	}
}

?>
