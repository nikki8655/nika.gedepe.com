<?php
/**
 * Pages
 */

class indexPageClass extends auth {
    
    function __construct() {
        echo $this->getSurname() . " " . $this->getName();
    }
            
    function main(){
        sleep(2);
        echo __CLASS__. "End: ".date("Y-m-d H:i:s") . "<br>";
    }
}

/**
 * Basic class for pages
 */
class auth {
    public function getName(){
        return "Nika";
    }
    public function getSurname(){
        return "Dubik";
    }
}

$obj = new indexPageClass();
$obj->main();
//$obj = new contactsPageClass();
//$obj->main();
?>