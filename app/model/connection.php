<?php
require_once ($_SERVER['DOCUMENT_ROOT']. '/app/config/config.php');
require_once (URL_PROJECT. '/app/libs/console.php');

class Connection{

    public $conn;
    
    public function __construct(){

        $this->connect();

    }

    public function connect(){
        $this->conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if (!$this->conn) {
            console("Connection failed: " . mysqli_connect_error());
        }else{
            console("Connected successfully");
            return $this->conn;
        }
    }
}