<?php

session_start();

$per = $_SESSION['per'];
$fieldpineapples = $_SESSION['fieldpineapples'];
$cpp = $_SESSION['cpp'];

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

echo   "
        Before we get started, there is one more thing you need to know: in addition to the pineapples you will harvest by shooting at them with the blueberries, we are providing you with an <b>additional pineapple field to increase your payout!</b> The field gifted to you has <b>$fieldpineapples</b> pineapples on it -- <b>a potential payout of $".($cpp * $fieldpineapples)."!</b> But be careful -- your pineapples aren’t safe! There are droughts that may occur and <b>destroy some of the pineapples on your field.</b><br><br>
        But don’t worry, you can <b>protect</b> your pineapples against these droughts: during the game, you will have the option to <b>purchase insurances with your blueberries</b>. If a drought hits and you purchased insurance against that drought, you can keep the pineapples that would otherwise be lost. Whenever you have the opportunity to buy insurance, the drought will hit you with a probability of 50% (5 times out of 10).<br><br>
        <center><img src=\"img/ins_example.png\" style=\"width:400px; height:281px;\"></center> <br><br>
        This is how you can <b>purchase insurances</b>: On some levels, an insurance box will appear in the upper left corner of the screen. The insurance box will tell you <b>how many pineapples on your field you would lose</b> if the drought actually occurred (which it does in 50% of the cases) and <b>how many blueberries it costs</b> to purchase that insurance. If you decide to buy the insurance, you click on “buy”. The cost for the insurance will be subtracted from your blueberry-budget of the <b>level you are currently playing</b>. If you don’t have enough remaining blueberries on that level, the part of the cost that you are not able to pay with your current budget will automatically be subtracted from the budget of the <b>next level</b>.<br><br>
        In the <b>example</b> above, the drought <b>would destroy 8 pineapples on your pineapple field</b> if the drought hits you. The insurance would cost you 1 blueberry. To get an idea of whether the insurance makes sense, you should think about <b>what your earnings would look like in case you buy or you don’t buy the insurance</b>.<br><br>
        In general, it makes sense to buy an insurance when half of the potential losses are still larger than twice the price. We calculate half of the potential losses because the drought hits in 50% of cases. And we calculate twice the price because in prior experiments, participants earned an average of 2 pineapples for every blueberry they shot.<br><br> 
        In our example, half of the potential losses would mean <b>4</b> (8/2 = 4), and twice the price would mean <b>2</b> (1*2 = 2). As 4 is larger than 2, it would make sense to buy the insurance in this case. However, it is totally up to you whether you purchase an insurance or not.<br><br>
      ";

echo "Continue to the quiz: <a href = 'quiz.php'>Click here.</a>";

echo "</div>";

?>
