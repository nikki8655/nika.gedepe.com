<?php

/**
 * Description of Controller
 *
 * @author root
 */
require_once 'AppController.php'; // подключение файла
class FrontController extends AppController {

    protected $result = "";
    protected $DB = NULL;

    function __construct() {
        echo date("Y-m-d H:i:s"); // вызвали ехо с датой
        $this->result = $this->readFile('layout.phtml'); // что бы открывлся layout.phtml
    }

    public function index() {
        $body = $this->readFile('index.phtml'); // что бы открывлся в боди индекс
        $full = str_replace('{BODY}', $body, $this->result); // для замены search — это то, что вы хотите найти.
        //Это может быть строка или массив.replace — все найденные элементы, которые вы задали в search для поиска,
        //будут заменены на это значение. Это, опять же, может быть строка или массив.
        //originalString — исходнстрока, в которой и будет производиться поиск. Функция НЕ меняет входную строку!
        echo $full; // вывод переменной
    }

    public function categories() {
        $body = $this->readFile('index.phtml');
        echo __METHOD__; //print Classname::methodname to screen
    }

    public function pages() {
        $body = $this->readFile('index.phtml');
        echo __METHOD__;
    }

    //Method for single page
    public function page() {
        $body = $this->readFile('page.phtml');
        $this->result = str_replace('{BODY}', $body, $this->result);
        return $this->result;
    }

}

?>
