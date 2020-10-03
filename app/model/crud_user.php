<?php
require_once ($_SERVER['DOCUMENT_ROOT']. '/app/config/config.php');
require_once (URL_PROJECT. '/app/libs/console.php');
require_once (URL_PROJECT. '/app/model/connection.php');

/* -- */

class CRUD extends Connection{

    private $gmail;
    private $user;
    private $password;

    function __construct(){
        $this->connect();
        
        /* $this->select_code(); */
    }

    public function execute($query){

        try{
        $rpt = mysqli_query($this->conn, $query);
        if ($rpt) {
            console("exec query successfully");
            $row = mysqli_fetch_assoc($rpt);
            return $row;
        } else {
            console("ERROR in create new record");
            return 'error';
        }
        }catch (PDOException $e) {

        $this->error = $e->getMessage();
        echo $this->error;
        }
        
    }

    function register_user(){
        if(isset($_POST['gmail'])) $this->gmail =  $_POST['gmail'];
        if(isset($_POST['user'])) $this->user = $_POST['user'];
        if(isset($_POST['password'])) $this->password = $_POST['password'];
        console("heee". $this->user);
        $sql = "INSERT INTO `the_user`(`us_gmail`, `us_user`, `US_password`, `us_img`, `us_date_register`, `us_state`, `us_rank`, `us_point`, `us_participation`, `us_position`, `fo_id`) 
        VALUES ('". $this->gmail ."','". $this->user ."','". $this->password ."', null, now(),null,null,0,0,00, 4);";
        $this->execute($sql);
    }

    function validate_gmail(){
        if(isset($_POST['gmail'])){
            $sql = "SELECT us_gmail FROM the_user WHERE us_gmail = 'edgar.aggre@gmail.com';";
            $Row = $this->execute($sql);
            if(isset($Row)) return 'error';
            else return 'true';
        }
    }
}