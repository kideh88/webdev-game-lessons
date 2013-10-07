<?php
require_once('../connection/Data.class.php');
$arrTest = array();

$arrTest[] = 'A';
$arrTest[] = 'B';
$arrTest[] = 'C';

for($i = 0; $i < 3; $i += 1) {
    echo 'yoyo this value: ' . $arrTest[$i] . '<br/>';

}

//$strFindName = 'Kim';

$objPDO = new Data();
$objNames = $objPDO->pdo()->prepare('Select * from test');
//$objNames->bindValue(':name', $strFindName, PDO::PARAM_STR);
$objNames->execute();
echo '<pre>';
var_dump($objNames->fetchAll(PDO::FETCH_ASSOC));
echo '</pre>';
