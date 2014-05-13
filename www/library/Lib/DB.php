<?php

/**
 * Description of DB
 *
 * @author root
 */
class DB {

    protected $db_configs = array();
    protected $connection = NULL;

    function __construct() {
        if ($this->connection == NULL) {
            $this->connect();
        }
    }

    public function query($query) {
        $result = FALSE;
        if ($this->connection !== NULL) {
            $result = mysql_query($query, $this->connection);
            if (!$result) {
                echo 'Ошибка запроса: ' . mysql_error();
                exit;
            }
        } else {
            echo 'No connections';
            exit;
        }

        return $result;
    }

    public function save($row = array(), $table_name = "") {
        $result = FALSE;
        if ( empty($row)){
            echo "Не передали массив с данными для работы с базой данных";
            exit;
        }
        if ( !strlen($table_name) > 0 ){
            echo "Не передали название таблицы в базе данных";
            exit;
        }

        if ($this->connection !== NULL) {
            if ( !isset($row['id']) ){
                // Вставляем новую строку
                $keys = array_keys($row);
                $values = array();
                foreach ( array_values($row) as $val  ){
                    $values[] = "'".$val."'";
                }
                $query = "INSERT INTO $table_name (".implode(",", $keys).") VALUES ( ".implode(",", $values)." )";
                $result = mysql_query($query, $this->connection);
                if ( $result ){
                    return mysql_insert_id();
                }
            } else {
                // Обновляем существующую строку
                $set = array();
                foreach ( $row as $key => $value ){
                    $set[] = "$key = '$value'";
                }
                $query = "UPDATE $table_name SET ".implode(",", $set)." WHERE id = ".$row['id'];
                $result = mysql_query($query, $this->connection);
            }
        }
        return $result;
    }

    protected function connect() {
        //read config
        include __DIR__ . '/../configs.php';
        if (!empty($configs['db'])) {
            $db_configs = $configs['db'];

            $connection = mysql_connect(
                    $db_configs['host'].':'.$db_configs['port'],
                    $db_configs['user'],
                    $db_configs['password']
            );
            if (!$connection) {
                die('Error while connect соединения: ' . mysql_error());
            }
            mysql_select_db('nika_test1', $connection);
            mysql_query("set names 'utf8'");
            $this->connection = $connection;
        } else {
            echo 'No configs';
            exit;
        }
    }

}
