<?php
require_once ($_SERVER['DOCUMENT_ROOT']. '/app/config/config.php');
require_once (URL_PROJECT. '/app/libs/console.php');
require_once (URL_PROJECT. '/app/model/connection.php');


/* -- */

class CRUD extends Connection{

    function __construct(){
        $this->connect();
        
        $this->select_code();
    }

    function select_code(){
        echo $this->conn;
    }
}


$crud = new CRUD();

?>