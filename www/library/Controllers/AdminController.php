<?php

/**
 * Description of AdminController
 *
 * @author root
 */
require_once 'AppController.php'; // подключение файла

class AdminController extends AppController {

    protected $result = "";
    protected $DB = NULL;

    function __construct() {
        echo date("Y-m-d H:i:s"); // вызвали ехо с датой
        $this->result = $this->readFile('Admin/layout.phtml'); // что бы открывлся layout.phtml
        include_once __DIR__ . '/../Lib/DB.php';
        $this->DB = new DB();
    }

    //Pages
    //List of pages
    public function list_pages(){
        $db_result = $this->DB->query("SELECT * FROM pages");
        $page = $this->readFile ('Admin/' . __FUNCTION__ . '.phtml');
        $body = "";

        $body.= "<p><a href = admin.php?action=edit_page>Add new page</a></p>";
        while ($row = mysql_fetch_assoc($db_result)) {
            $body .= str_replace(array('{ID}', '{TITLE}'), array ($row['id'], $row['title']),$page);
        }
        if (isset($_GET['res'])){
            if($_GET['res'] == 'success_delete'){
                $body = '<div class = "success">Успешно удалено</div>'.$body;
            }
        }

        $this->result = str_replace('{BODY}', $body, $this->result);
        return $this->result;
    }

    //Create page
    //Edit page
    public function update_page() {
        return $this->result;
        $page = $this->readFile('Admin/' . __FUNCTION__ . '.phtml');
        $body = "";

        $id =0;
        if (isset ($_GET['id'])){
            $id = (int)$_GET['id'];
        }
        $success_message = "";
        $error_message ="";

        if (empty ($_POST)){
            if ($id >0){
                $db_result = $this->DB->query("SELECT * FROM pages WHERE id =".(int)$_GET['id']);
                while ($row = mysql_fetch_assoc($db_result)){
                    $body.=str_replace(array ('{ID}','{TITLE}',  '{PAGE_BODY}'), array ($row ['id'], $row['title'] ,  $row['body']), $page);

                }

            }  else {
                $body.=str_replace (array ('{ID}', '{TITLE}',), array(), $page);
            }
        }  else {
            $row = array();
              if($id>0){
                  $row['id']=$id;
              }
              $row['title'] = $_POST['title'];
              $row['body'] = $_POST['body'];
             $db_res - $this->save ($row, 'pages');
             if ($db-res){
                 $success_message="<p class=success>Успешно сохранены данные</p>";
             }
             if(!$id>0){
                 $id=$db_res;
             }
             $body.=str_replace(array ('{ID}', '{TITLE}', '{PAGE_BODY}'),array($id, $row['title'], $row['body']), $page );
        }

        $body = str_replace(array('{ERROR_MSG}', '{SUCCESS_MSG}'), array($error_message, $success_message), $body);
        $this->result = str_replace('{PAGE_BODY}', $body, $this->result);
        return $this->result;
    }

    //Delete page
    public function delete_page() {
        return $this->result;
        $db_result=$this->DB->query ("DELETE FROM pages WHERE id = ".(int) $_GET['id']);
        if($db_result){
            header("Location: admin.php?action=pages&res=success_delete");
        }
        return $this->result;

    }

    //Categories
    //List of Categories
    public function list_categories() {
        //Work with this function only
        //Get data from database
        $db_result = $this->DB->query("SELECT * FROM categories");

        //Read HTML to variable
        $page = $this->readFile('Admin/' . __FUNCTION__ . '.phtml');
        $body = "";

        $body .= "<p><a href=admin.php?action=edit_category>Add new catogory</a></p>";
        //Add data from database to HTML for this page
        while ($row = mysql_fetch_assoc($db_result)) {
            $body .= str_replace(array('{ID}', '{TITLE}'), array($row['id'], $row['title']), $page);
        }

        if (isset($_GET['res'])) {
            if ($_GET['res'] == 'success_delete') {
                $body = '<div class="success">Успешно удалено</div>'.$body;
            }
        }

        //Add HTML for this page to layout
        $this->result = str_replace('{BODY}', $body, $this->result);
        return $this->result;
    }

    //Create category
    //Edit category
    public function update_category() {
        //Read HTML to variable
        $page = $this->readFile('Admin/' . __FUNCTION__ . '.phtml');
        $body = "";

        //Проверяем есть ли идентификатор категории в запросе
        $id = 0;
        if (isset($_GET['id'])) {
            $id = (int) $_GET['id'];
        }
        $success_message = "";
        $error_message = "";

        if (empty($_POST)) {
            if ($id > 0) {
                // Вставлять данные из базы
                $db_result = $this->DB->query("SELECT * FROM categories WHERE id = " . (int) $_GET['id']);
                while ($row = mysql_fetch_assoc($db_result)) {
                    $body .= str_replace(array('{ID}', '{TITLE}', '{DESCRIPTION}'), array($row['id'], $row['title'], $row['description']), $page);
                }
            } else {
                // Показывать пустые поля
                $body .= str_replace(array('{ID}', '{TITLE}', '{DESCRIPTION}'), array(), $page);
            }
        } else {
            //Work with data from form
            $row = array();
            if ($id > 0) {
                $row['id'] = $id;
            }
            $row['title'] = $_POST['title'];
            $row['description'] = $_POST['description'];
            $db_res = $this->DB->save($row, 'categories');
            if ($db_res) {
                $success_message = "<p class=success>Успешно сохранены данные</p>";
            }
            if (!$id > 0) {
                $id = $db_res;
            }
            // Вставляем данные, которые мы передали в форме
            $body .= str_replace(array('{ID}', '{TITLE}', '{DESCRIPTION}'), array($id, $row['title'], $row['description']), $page);
        }

        //Обработка ошибок и сообщений
        $body = str_replace(array('{ERROR_MSG}', '{SUCCESS_MSG}'), array($error_message, $success_message), $body);
        $this->result = str_replace('{BODY}', $body, $this->result);
        return $this->result;
    }

    //Delete category
    public function delete_category() {
        $db_result = $this->DB->query("DELETE FROM categories WHERE id = " . (int) $_GET['id']);
        if ($db_result) {
            header("Location: admin.php?action=categories&res=success_delete ");
        }
        return $this->result;
    }

    //Users
    //List of Users
    public function list_users() {
        return $this->result;
    }

    //Create user
    //Edit user
    public function update_user() {
        return $this->result;
    }

    //Delete user
    public function delete_user() {
        return $this->result;
    }

    function __destruct() {
//        return $this->result;
    }

}

?>