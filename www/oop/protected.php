<?php
require_once 'Config.php';
$ezhik = new Config() ;
echo $ezhik ->getDbName() ."<br>". $ezhik ->getDbHost();


?>