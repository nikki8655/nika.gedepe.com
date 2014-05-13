<?php
require 'oop/Config.php';
for ($a = 0; $a < 101; $a=$a+25) {
    if ($a == 50) {
        echo "<br>" .'Ежик';
    } elseif ($a==25) {
        $gh = new Config();
        echo $gh  ->getDbName();

}
    else {
        echo "<br>" . $a;
    }
}
?>
