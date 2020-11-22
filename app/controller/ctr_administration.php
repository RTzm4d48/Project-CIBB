<?php
require_once(URL_PROJECT.'/app/model/crud_administration.php');

class CTR_ADMINISTRATION{
    function ctr_select_user(){
        $ex=new CRUD_ADMINISTRATION();
        $data=$ex->crud_select_user();
        return$data;
    }
    function ctr_ascend_user($id_user){
        $ex=new CRUD_ADMINISTRATION();
        /* $ex->crud_select_rank_user($id_user); */
        return$ex->crud_ascend_user($id_user);
    }
    static function ctr_degrade_user($id_user){
        $ex=new CRUD_ADMINISTRATION();
        /* $ex->crud_select_rank_user($id_user); */
        return$ex->crud_degrade_user($id_user);
    }
    static function ctr_expel_user($id_user){
        $ex=new CRUD_ADMINISTRATION();
        /* $ex->crud_select_rank_user($id_user); */
        return$ex->crud_expel_user($id_user);
    }
}