<?php
require_once 'Controllers/FrontController.php'; // подключение
$controller = new FrontController(); // новая переменная

$action = "";
$result = "";
if ( isset($_GET['action']) ){
    $action = $_GET['action'];
}
switch ($action) {
    case "categories":
        echo $controller->categories();
        break; // если откріваеться страница категория, то віводить ехо
    case "page":
        echo $controller->page();
        break;
    case "pages":
        echo $controller->pages();
        break;
    case "index":
    default:
        echo $controller->index();
        break;
}
?>