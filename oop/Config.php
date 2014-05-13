<?php
/**
 * Description of Config
 *
 * @author root
 */
class Config {
    protected $dbname = "nika";
    protected $dbhost = "localhost";

    public function getDbName(){
        return $this->dbname;
    }
     public function getDbHost(){
        return $this->dbhost;
    }
}

?>
