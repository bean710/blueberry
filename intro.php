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

</head>


";

echo "<div id=\"container\">";

//stuff here


		include 'init.php';
    $cpp = 0.01; // Cents per pineapple
		$doneit=ipCheck();
    //TODO: Remove next line
		$doneit=false;
		if (!$doneit){
      if ($_SESSION['cborrow'] == 0) {
        init(2);
      } else {
  			init(4);
      }
			if ($_SESSION['cond']==0 || $_SESSION['cond']==2){
				$per=3;
			}
			else{
				$per=15;
			}
      $tot=$per*10;
      echo "Thank you for playing Angry Blueberries! This is a classic slingshot video game, played using only your mouse. In this game, you shoot blueberries at pineapples and each time you hit a pineapple, you can harvest it. Each pineapple is worth $0.xx, so your goal should be to harvest as many pineapples as you can! You will receive a bonus payment according to the number of pineapples you harvest throughout the game. You can earn up to $? during the game.
        Below is a screenshot of the game: <br><center><img src=\"instructions.gif\"></center><br>
        On each level, there are 7 pineapples. If you hit all 7 pineapples in a level, you earn 3 bonus pineapples!<br><br>
        To load a blueberry, simply click the blueberry chute (the grey rectangle in the lower left of the screen). Once the blueberry is loaded into the slingshot, pull the blueberry back and aim. Fire the blueberry by releasing it. It's that simple. Watch out for obstacles in the level--if you hit the black holes, it'll be a wasted shot.<br><br>
        Your total blueberry-budget amounts to $tot blueberries. For each level, you will have $per blueberries that you can fire. You have to shoot at least one blueberry per level. Once you use up your shots, you won't be able to use any more until you move to the next level. You might have more or less blueberries for the real experiment. We will inform you about any changes concerning your budget after the practice rounds.<br><br>
        You can move on from a level after shooting the first berry--just click the 'next' button near the bottom right of the screen. You do not have to use all of your berries on each level. Any unused berries will carry over to future levels.<br><br>
        The scoreboard in the top right of the screen will tell you how many berries you have fired on each round, how many berries remain for the game, how many pineapples you've harvested on the level, and how many pineapples you've harvested overall.<br><br>
        Before we get started, there is one more thing you need to know: in addition to the pineapples you will harvest by shooting at them with the blueberries, we are providing you with an additional pineapple field to increase your payout! The field gifted to you has xx pineapples on it -- a potential payout of $cpp! But be careful -- your pineapples aren’t safe! There are droughts that may occur and destroy some of the pineapples on your field.<br><br>
        But don’t worry, you can protect your pineapples against these droughts: during the game, you will have the option to purchase insurances with your blueberries. If a drought hits and you purchased insurance against that drought, you can keep the pineapples that would otherwise be lost.<br><br>
        <center><img src=\"img/ins_example.png\" style=\"width:400px; height:281px;\"></center> <br><br>
        This is how you can purchase insurances: On some levels, an insurance box will appear in the upper left corner of the screen. The insurance box will tell you how likely it is that a drought will occur, how many pineapples on your field you would lose if the drought actually occurred and how many blueberries it costs to purchase that insurance. If you decide to buy the insurance, you can click on “buy”. The cost for the insurance will be subtracted from your blueberry-budget of the level you are currently playing. If you don’t have enough remaining blueberries on that level, the part of the cost that you are not able to pay with your current budget will automatically be subtracted from the budget of the next level.<br><br>
        In the example above, the drought will hit your pineapple fields with a probability of 80% (8 times out of 10). If the drought hits you, it would destroy 6 pineapples. The insurance would cost you 2 blueberries. In prior experiments, participants earned an average of 2 pineapples for every blueberry they shot. To get an idea of whether the insurance makes sense, you should think about what your earnings would look like in case you buy or you don’t buy the insurance. In case you buy the insurance in this case, you would only earn the 6 pineapples for sure, but you would give up 2 blueberries, which potentially would give you 4 pineapples in the game: 6 + 0 = 6. If you don’t buy the insurance, you would get the 5 pineapples with a chance of 20% and you would keep the 2 blueberries, which would give you around 4 pineapples in the game: 6*0.2 + 4 =  1.2 + 4 = 5.2. This means that when you buy the insurance, you would expect to get 6 pineapple out of this deal, if you don’t buy the insurance, you would get 5.2 pineapples out of this deal on average.<br><br>
        In the example above, the drought will hit your pineapple fields with a probability of 80% (8 times out of 10). If the drought hits you, it would destroy 6 pineapples. The insurance would cost you 2 blueberries. In prior experiments, participants earned an average of 2 pineapples for every blueberry they shot. To get an idea of whether the insurance makes sense, you should think about what your earnings would look like in case you buy or you don’t buy the insurance. In case you buy the insurance in this case, you would only earn the 6 pineapples for sure, but you would give up 2 blueberries, which potentially would give you 4 pineapples in the game: 6 + 0 = 6. If you don’t buy the insurance, you would get the 5 pineapples with a chance of 20% and you would keep the 2 blueberries, which would give you around 4 pineapples in the game: 6*0.2 + 4 =  1.2 + 4 = 5.2. This means that when you buy the insurance, you would expect to get 6 pineapples out of this deal, if you don’t buy the insurance, you would get 5.2 pineapples out of this deal on average.<br><br>";


echo "Continue to the quiz: <a href = 'quiz.php'>Click here.</a>";
#echo "To begin, <a href='applet.php'>click here.</a> <b>Note: the game might take a few minutes to load, and you might see a blank screen until it loads.  Please be patient.</b>";

		}
		else{
			echo "<font color=\"#000000\">Sorry, but you have been denied access to this survey. <b>It appears that someone has already completed the survey 			from the computer you are using.  Only one survey may be completed per computer.</b>
			</font></body></html>";
		}






echo "</div>";
?>
