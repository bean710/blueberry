<?php
session_start();
require_once 'vendor/autoload.php';


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

//stuff here


		include 'init.php';

    $_SESSION['cpp'] = 0.02; // Cents per pineapple

		$doneit=ipCheck();
    //TODO: Remove next line
		$doneit=false;

		if (!$doneit){

      /*
      if ($_SESSION['cborrow'] == 0) {
        init(2);
      } else {
  			init(4);
      }
      */
      init(4);
      $_SESSION['time']=time();

			if ($_SESSION['cond']==0 || $_SESSION['cond']==2){
        $_SESSION['per'] = 3;
        $_SESSION['fieldpineapples'] = 78;
			} else {
        $_SESSION['per'] = 15;
        $_SESSION['fieldpineapples'] = 390;
			}

      $per = $_SESSION['per'];
      $fieldpineapples = $_SESSION['fieldpineapples'];
      $cpp = $_SESSION['cpp'];
      $tot=$per*10;
      $potpayout=$fieldpineapples*$cpp;

      echo "Thank you for playing Angry Blueberries! This is a classic slingshot video game, played using only your mouse. In this game, you shoot blueberries at pineapples and each time you hit a pineapple, you can harvest it. Each pineapple is worth $$cpp, so your goal should be to harvest as many pineapples as you can! You will receive a bonus payment according to the number of pineapples you harvest throughout the game.<br><br>
        Please read the following instructions on how to play very carefully. Before you can play and earn pineapples, you will have to answer three questions about the game rules. For each question, if you don’t get it right on your first try, you will be directed back to the instructions and then you can try again. If you don’t get a question right the second time, you cannot proceed to the game and your HIT will be rejected.<br><br>
        Below is a screenshot of the game: <br><br><center><img src=\"instructions.gif\"></center><br>
        On each level, there are 7 pineapples. If you hit all 7 pineapples in a level, you earn 3 bonus pineapples!<br><br>
        To load a blueberry, simply click the blueberry chute (the grey rectangle in the lower left of the screen). Once the blueberry is loaded into the slingshot, pull the blueberry back and aim. Fire the blueberry by releasing it. It's that simple. Watch out for obstacles in the level--if you hit the black holes, it'll be a wasted shot.<br><br>
        Your total blueberry-budget amounts to $tot blueberries. For each level, you will have $per blueberries that you can fire. You have to shoot at least one blueberry per level. Once you use up your shots, you won't be able to use any more until you move to the next level. You might have more or less blueberries for the real experiment. We will inform you about any changes concerning your budget after the practice rounds.<br><br>
        You can move on from a level after shooting the first berry--just click the 'next' button near the bottom right of the screen. You do not have to use all of your berries on each level. Any unused berries will carry over to future levels.<br><br>
        The scoreboard in the top right of the screen will tell you how many berries you have fired on each round, how many berries remain for the game, how many pineapples you've harvested on the level, and how many pineapples you've harvested overall.<br><br>
        ";

        echo "<a href='intro_pt2.php'>Next Page</a>";


#echo "To begin, <a href='applet.php'>click here.</a> <b>Note: the game might take a few minutes to load, and you might see a blank screen until it loads.  Please be patient.</b>";

		}
		else{
			echo "<font color=\"#000000\">Sorry, but you have been denied access to this survey. <b>It appears that someone has already completed the survey 			from the computer you are using.  Only one survey may be completed per computer.</b>
			</font></body></html>";
		}






echo "</div>";

?>
