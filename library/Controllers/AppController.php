<?php

/**
 * Description of AppController
 *
 * @author root
 */
//require_once '../configs.php';
//require_once '../Lib/DB.php';
class AppController {


    public function readFile($filename) {
        return file_get_contents("http://library.nika.gedepe.com/Views/" . $filename); //Читает содержимое файла в строку
    }

}
