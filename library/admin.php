<?php
require_once 'Controllers/AdminController.php'; // подключение
$controller = new AdminController(); // новая переменная

$action = "";
$result = "";
if ( isset($_GET['action']) ){
    $action = $_GET['action'];
}
switch ($action) {
    case "categories":
        $result =   $controller->list_categories();
        break;
    case "add_category":
    case "edit_category":
        $result =   $controller->update_category();
        break;
    case "delete_category":
        $result =   $controller->delete_category();
        break;
    case "users":
        $result =   $controller->list_users();
        break;
    case "add_user":
    case "edit_user":
        $result =   $controller->update_user();
        break;
    case "delete_user":
        $result =   $controller->delete_user();
        break;
    case "add_page":
    case "edit_page":
        $result =   $controller->update_page();
        break;
    case "delete_page":
        $result =   $controller->delete_page();
        break;
    case "pages":
    case "index":
    default:
        $result =   $controller->list_pages();
        break;
}
echo $result;
?>