<?php

session_start();


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

<script src=\"https://code.jquery.com/jquery-3.6.0.min.js\" integrity=\"sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=\" crossorigin=\"anonymous\"></script>

</head>


";

echo "<div id=\"container\">";

echo "<script type=\"text/javascript\" src=\"formcheck.js\"></script><br><br><b>Demographics</b><br /><br />";
	echo "You are nearly finished.  Please answer the remaining demographics questions below.<br><br>
	";
	echo "<form method='post' action='finished.php'>";
	echo "Gender: <input type='radio' name='gender' value='m' />Male ";
	echo "<input type='radio' name='gender' value='f' />Female";
	echo "<input type='radio' name='gender' value='prefer_not_to_say' />Prefer not to say";
	echo "<input type='radio' name='gender' value='other' />Other: <input type='text' name='gender_other' />";
	echo "<br /><br />Age: <input type='text' size='3' name='age' />";
  echo "<br /><br />Race/Ethnicity: <select name='race' id='race'>";
  echo "<option value='white/caucasian'>White/Caucasian</option>";
  echo "<option value='African American/Black'>African American/Black</option>";
  echo "<option value='American Indian, Native American'>American Indian, Native American</option>";
  echo "<option value='Alaska Native'>Alaska Native</option>";
  echo "<option value='Native Hawaiian'>Native Hawaiian</option>";
  echo "<option value='Guamanian'>Guamanian</option>";
  echo "<option value='Samoan'>Samoan</option>";
  echo "<option value='Other Pacific Islander'>Other Pacific Islander</option>";
  echo "<option value='Asian Indian'>Asian Indian</option>";
  echo "<option value='Chinese'>Chinese</option>";
  echo "<option value='Filipino'>Filipino</option>";
  echo "<option value='Japanese'>Japanese</option>";
  echo "<option value='Korean'>Korean</option>";
  echo "<option value='Vietnamese'>Vietnamese</option>";
  echo "<option value='Other Asian'>Other Asian</option>";
  echo "<option value='Refuse to answer'>Refuse to answer</option>";
  echo "<option value='Don't Know'>Don't Know</option>";
  echo "<option value='Other'>Other</option>";
  echo "</select>";
	echo "<br /><br /><input type='submit' onClick='valform(this.parentNode); return false;' value='Submit' />";
	echo "</form>";

	//write data.

/*
//if ($_GET['lberries']>0)
$_SESSION['data'].=$_SESSION['subjnum'].",".$_SESSION['cond'].",".$_GET['count'].",".$_GET['lberries'].",".$_GET['lpoints'].",$trace_str,$tracetime_str,$traceerror_str,";
$_SESSION['data'].=$_GET['boughtins'].",".$_GET['insprice'].",".$_GET['insprob'].",".$_GET['insloss'].",".$_GET['insev'].",".$_GET['insreasonable'].",".$_GET['insdrought']."\n";
$outFile = "./results/results.txt";
$fh = fopen($outFile,'a');
fwrite($fh, $_SESSION['data']);
fclose($fh);
*/




?>
