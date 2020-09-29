<?php
require_once ($_SERVER['DOCUMENT_ROOT']. '/app/config/config.php');
require_once (URL_PROJECT. '/app/libs/console.php');

class Connection{

    public $conn;
    
    public function __construct(){

        $this->connect();

    }

    public function connect(){
        $connectionInfo = array('Database'=>DB_NAME, 'UID'=>DB_USER, 'PWD'=>DB_PASSWORD);
        $this->conn = sqlsrv_connect(DB_HOST, $connectionInfo);
        if($this->conn){
            return $this->conn;
        }else{
            console(print_r(sqlsrv_errors(), true));
        }
    }
}