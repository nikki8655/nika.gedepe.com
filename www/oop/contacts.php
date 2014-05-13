<?php
require_once 'Config.php';
require_once 'Search.php';
$str = "Off";
$pattern = "On";

$searchObj = new Search();
if ( $searchObj->searchIn($str, $pattern) == true ){
    $configObj = new Config();
    echo $configObj->getDbName() . ": " . $configObj->getDbHost();
}
?>

<br>
<br>
<br>
<br>
Здеся ваще просто сайт
