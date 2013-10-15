<!DOCTYPE html>
<html>

<head>
    <title>Awesome Game</title>
    <style>
        html, body, .Game{
            width: 100%;
            height: 100%;
            background-color: #F0F0F0;
        }


        .Soldier
        {
            position: absolute;
            width: 50px;
            height: 50px;
            background-color: blue;
            box-shadow: 0px 0px 50px purple;
            border-radius: 25px;
        }
        .Worker
        {
            position: absolute;
            width: 25px;
            height: 25px;
            background-color: black;
            box-shadow: 0px 0px 50px black;
            border: 1px solid white;
            border-radius: 12px;
            z-index: 1;
        }
        .GoldMine
        {
            position: absolute;
            top: 0;
            right: 0;
            width: 100px;
            height: 100px;
            background-color: gray;
            box-shadow: 0px 0px 50px gray;
            border: 1px solid gray;
            border-radius: 25px;
        }
        .Farm
        {
            position: absolute;
            bottom: 0;
            right: 0;
            width: 100px;
            height: 100px;
            background-color: brown;
            box-shadow: 0px 0px 50px brown;
            border: 1px solid brown;
            border-radius: 25px;
        }
        .Forest
        {
            position: absolute;
            top: 200px;
            right: 400px;
            width: 100px;
            height: 100px;
            background-color: green;
            box-shadow: 0px 0px 50px green;
            border: 1px solid green;
            border-radius: 25px;
        }

        .Selected
        {
            box-shadow: 0px 0px 50px 10px green;
        }
        .GoldMiner
        {
            background-color: yellow;
            box-shadow: 0px 0px 50px yellow;
        }

    </style>

</head>


<body>

<div class="Game">
    <input type="hidden" value="9" id="myHiddenId" />
    <p>My enemy id: <input type="text" value="8" id="enemyHiddenId" /></p>
    <p>Update: <input type="button" value="Start" onclick="runTeacherInterval()" /> <input type="button" value="End" onclick="stopTeacherInterval()" /></p>


    <?php
    $sMyGameXml =       "<game test='GGGGGGGGGGGGG'>";
    $sMyGameXml .=           "<version>99999</version>";
    $sMyGameXml .=           "<soldiers version='XXXXXXXXXX'>";
    $sMyGameXml .=               "<soldier type='archer'>S1</soldier>";
    $sMyGameXml .=               "<soldier type='archer'>S2</soldier>";
    $sMyGameXml .=           "</soldiers>";
    $sMyGameXml .=           "<gold>500</gold>";
    $sMyGameXml .=       "</game>";

    $oXml = simplexml_load_string($sMyGameXml);
    $iTotalGold = $oXml->gold;
    $aSoldiers = $oXml->soldiers->soldier;
    foreach($aSoldiers as $oSoldier)
    {
        echo $oSoldier;
    }
    echo $oXml->soldiers->soldier[0]->attributes()->type;
    echo $oXml->soldiers->attributes()->version;
    echo $oXml->attributes()->test;
    // EDIT
    $oXml->gold = 1000;
    echo $oXml->gold;
    ?>






    <div id="LblTotalGold">0</div>
    <div id="LblTotalFood">0</div>
    <div id="LblTotalWood">0</div>

    <div class="Worker"></div>
    <div class="Worker"></div>
    <div class="Worker"></div>
    <div class="Worker"></div>
    <div class="Worker"></div>
    <div class="Worker"></div>
    <div class="Worker"></div>
    <div class="Worker"></div>
    <div class="Worker"></div>
    <div class="Worker"></div>


    <div class="Resource GoldMine" data-type="GoldMine"></div>
    <div class="Resource Farm" data-type="Farm"></div>
    <div class="Resource Forest" data-type="Forest"></div>
    <div class="Resource Forest" data-type="Forest"></div>
    <div class="Resource Forest" data-type="Forest"></div>

</div>


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script type="text/javascript" src="/webdev2013/js/main-game.js"></script>




</body>


</html>
