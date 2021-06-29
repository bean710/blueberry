<?php


session_start();

include 'db.php';


echo "<html> <title>Angry Blueberries</title><body><head><STYLE TYPE=\"text/css\">

 a:link{color: #cc3300;}
a:visited{color: #cc3300;}
body{ background-color: #D4C094; font-family:Verdana, sans-serif; font-size: 12pt; text-align: center;}
table.gboard {border-spacing: 0px; vertical-align: center; text-align: center; border-width: 4px; border-style: solid; border-collapse: collapse; border-color: #000000; font-family: Verdana,sans-serif; font-size: 30pt;}
td.bcell{background-color: #1A5600; padding: 0px; vertical-align: middle; border-style: solid; border-width: 4px; border-color: #000000;}
td.acell{background-color: #ffffff; padding: 0px; vertical-align: middle; border-style: solid; border-width: 4px; border-color: #000000;}
table.tblnobord {border-spacing: 0px; vertical-align: middle; text-align: left; border-width: 0px; border-style: solid; border-collapse: collapse; font-family: Verdana,sans-serif; font-size: 16pt;}
td.tdnobord{padding: 5px; vertical-align: middle; border-style: solid; border-width: 0px;}
tr.trnobord{background-color: #ffffff;}
tr.moused{background-color: #eeeeee;}
td.tdbleft{border-left: 4px solid #000000;}
td.tddash{background-color: #383838; padding: 5px; vertical-align: top; border-style: solid; border-width: 2px; border-color: #444444;}
table.tblborder {border-spacing: 0px; vertical-align: center; text-align: center; border-width: 2px; border-style: solid; border-collapse: collapse; border-color: #aaaaaa; font-family: Verdana,sans-serif; font-size: 16pt;}

#points, #round, #rleft, #tleft {font-size: 16pt; color: #ffffff;}
#container {text-align: left; padding: 2px; border-style: solid; border-width: 8px; border-color: #000000; background-color: #ffffff; width: 800px; margin-left:auto; margin-right: auto; margin-top: 10px;}
#preload {display: none;}
</STYLE>

</head>


";

echo "<div id=\"container\">";

$_SESSION['time']=time()-$_SESSION['time'];

$gender = $_POST['gender'];

if (strcmp($gender, "other") == 0)
  $gender = $_POST['gender_other'];

$addDemo = $db->prepare('INSERT INTO demographics VALUES(:subjnum, :cond, :age, :gender, :race, :timetext, :prize)');

// Get the total number of points lost by not buying insurance
$getLosses = $db->prepare('SELECT subjnum, SUM(inspotloss) from results where subjnum=:subj AND insbought=0 AND insdroughthappen=1 GROUP BY subjnum');
$getLosses->execute(['subj' => $_SESSION['subjnum']]);
$result = $getLosses->fetch(PDO::FETCH_ASSOC);
$getLosses->closeCursor();

$losses = $result['sum'];


// Get the total number of points saved by buying insurance
$getSavings = $db->prepare('SELECT subjnum, SUM(inspotloss) from results where subjnum=:subj AND insbought=1 AND insdroughthappen=1 GROUP BY subjnum');
$getSavings->execute(['subj' => $_SESSION['subjnum']]);
$result = $getSavings->fetch(PDO::FETCH_ASSOC);
$getSavings->closeCursor();

$savings = $result['sum'];


// Get the total number of points scored during the game
$getPoints = $db->prepare('SELECT SUM(numofpoints) FROM results WHERE subjnum=:subj GROUP BY subjnum');
$getPoints->execute(['subj' => $_SESSION['subjnum']]);
$result = $getPoints->fetch(PDO::FETCH_ASSOC);
$getPoints->closeCursor();

$points = $result['sum'];


$startNumSet = "";
if ($_SESSION['cond'] == 0 || $_SESSION['cond'] == 3) {
  $startNumSet = "poor_start";
} else {
  $startNumSet = "rich_start";
}

$getsett->execute([$startNumSet]);
$startingNum = $getsett->fetch()[0];


$grandTotal = $startingNum - $losses + $points;
$totalWinnings = 0.02 * (int)$grandTotal;

$addDemo->execute(['subjnum' => $_SESSION['subjnum'], 'cond' => $_SESSION['cond'], 'age' => $_POST['age'],
  'gender' => $gender, 'race' => $_POST['race'], 'timetext' => $_SESSION['time'], 'prize' => $totalWinnings]);



echo "<br>";
echo "Your pineapple field started with $startingNum pineapples, but you lost $losses pineapples from uninsured disasters. <br>
      You also scored $points pineapples during the game. <br>
      This brings you to a grand total of $grandTotal pineapples, making your total winnings $$totalWinnings!";

$num=$_SESSION['subjnum']."000".rand(100,999);

echo "<br><br>You have completed this game.  Your code is ABF" . $num . ". Please copy and paste this code back into mTurk. Please make sure you copy the complete code, as we will not be able to pay you the bonus in case part of it is missing. Thank you for participating. You may now exit this tab/window.<br><br>";

//TODO: UNCOMMENT THIS
//session_destroy();

?>
