<?php
require_once(URL_PROJECT.'/app/model/crud_message.php');
class CTR_MESSAGE{
    static function ctr_querys_message($text){
        $ex=new CRUD_MESSAGE();
        if($ex->valid_exist()){
            $rpt=$ex->crud_update_message($text);
            return$rpt;
        }else{
            $name=$ex->crud_obtain_name_user();
            $rpt=$ex->crud_insert_message($text,$name);
            return $rpt;  
        }
    }
    static function ctr_select_message(){
        $ex=new CRUD_MESSAGE();
        $id_fo=$ex->crud_valid_my_fo($_GET['C']);
        $rpt=$ex->crud_select_message($id_fo);
        return $rpt;
    }
    static function ctr_select_my_message(){
        $ex=new CRUD_MESSAGE();
        $text=$ex->crud_select_my_message();
        return $text;
    }
    static function ctr_deleted_message(){
        $ex=new CRUD_MESSAGE();
        return $ex->crud_deleted_message();
    }
    static function ctr_valid_my_fo($fo_code){
        $ex=new CRUD_MESSAGE();
        $id_fo=$ex->crud_valid_my_fo($fo_code);
        return $id_fo;
    }
}
?>