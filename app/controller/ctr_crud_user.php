<?php
require_once(URL_PROJECT.'/app/model/crud_user.php');
class VALIDATIONS_U{
    function __construct(){
        /* $this->val_register_user(); */
    }
    static function val_register_user(){
        $ex = new CRUD_U();
        $Row = $ex->validate_gmail();
        if($Row != 'error'){
            $ex->register_user();
            setcookie('id_user', $_SESSION['us_id'], strtotime( '+360 days' ), '/');
            echo "<script> location.href='/'; </script>";
        }else{
            echo 'La cuenta de gmail ya esta afiliada';
        }
    }   
    static function val_login_user(){
        $ex = new CRUD_U();
        $pass=$ex->crud_select_pass();
        if(password_verify($_POST['password'],$pass)){
            $Row = $ex->login_user();
        }else{
            echo "La contraseña o el usuario es incorrecto.";
        }
    }
    static function val_select_data_user(){
        $ex = new CRUD_U();
        $data = $ex->select_data_user();
        return $data;
    }
    static function val_verificate_f_o_of_user(){
        $fo_code = null;
        $exx = new CRUD_U();
        $id_fo = $exx->verificate_f_o_of_user();
        if($id_fo == false){
            return null;
        }else{
            $fo_code = $exx->user_f_o($id_fo);
            return $fo_code;
        }
    }
}