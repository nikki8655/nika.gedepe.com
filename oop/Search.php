<?php
/**
 * Description of Search
 *
 * @author root
 */
class Search {

    public function searchIn($str, $pattern){
        if (!strlen($str) > 0){
            echo "Empty value of str <br>";
            return false;
        }
        if (!strlen($pattern) > 0){
            echo "Empty value of pattern <br>";
            return false;
        }
        if ( strpos($str, $pattern) !== false ){
            return true;
        }
        return false;
    }
}

?>
