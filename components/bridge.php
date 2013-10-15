<?php



if(array_key_exists('theGame', $_POST)
    && array_key_exists('intPlayerId', $_POST)
    && array_key_exists('intEnemyPlayerId', $_POST)
){
    require_once('../controllers/Game.controller.php');

    $strPostXml = $_POST['theGame'];
    $intPlayerId = (int)$_POST['intPlayerId'];
    $intEnemyPlayerId = (int)$_POST['intEnemyPlayerId'];

    $objGameController = new Game();

    $objGameController->saveXmlToFile($intPlayerId, $strPostXml);
    $strReturnedXml = $objGameController->getXmlFromFile($intEnemyPlayerId);
    $strReturnedOutput = htmlentities($strReturnedXml);
    echo $strReturnedXml;
}
else{
    echo '';
}


//$oXml = simplexml_load_string($sXml);
//$aSoldiers = $oXml->soldiers;
//$iTotalGold = $oXml->gold;
/*
include_once 'Controllers/Soldier.php';
$oSoldier = new Soldier();
echo $oSoldier->GetSoldiers();
*/

/*
include_once 'Controllers/Worker.php';
$oWorker = new Worker();
$fullName = $oWorker->CreateFullName($_GET['name'], $_GET['lastName']);
echo $fullName;
    */
/*
$tempNumber = $_GET['number'];
$tempNumberTwo = $_GET['numberTwo'];
$total = $tempNumber + $tempNumberTwo;
echo "Santiago has run $total km";
 */