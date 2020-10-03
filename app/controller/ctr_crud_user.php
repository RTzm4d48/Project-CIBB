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
        }else{
            echo 'La cuenta de gmail ya esta usada';
        }
    }
}