<?php
require_once(URL_PROJECT.'/app/model/crud_user.php');

class VALIDATIONS{

    function __construct(){
        /* $this->val_register_user(); */
    }

    static function val_register_user(){
        $ex = new CRUD();
        $Row = $ex->validate_gmail();
        if($Row != 'error'){
            $ex->register_user();
            setcookie('id_user', $_SESSION['us_id'], strtotime( '+360 days' ), '/');
            header('Location: '.'/');
        }else{
            echo 'La cuenta de gmail ya esta afiliada';
        }
    }

    static function val_login_user(){
        $ex = new CRUD();
        $Row = $ex->login_user();
    }

    static function val_select_data_user(){
        $ex = new CRUD();
        $Row = $ex->select_data_user();
    }
}