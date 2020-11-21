<?php
require_once(URL_PROJECT.'/app/model/crud_fo_access.php');
class CTR_FO_ACCESS{
    static function ctr_select_tree_users_img(){
        $ex=new CRUD_FO_ACCESS();
        $id_fo=$ex->crud_obtain_id_fo($_GET['C']);
        $rpt=$ex->crud_select_tree_users_img($id_fo);
        return $rpt;
    }
    static function ctr_select_num_all_user(){
        $ex=new CRUD_FO_ACCESS();
        $id_fo=$ex->crud_obtain_id_fo($_GET['C']);
        $num=$ex->crud_select_num_all_user($id_fo);
        $num=$num-3;
        return$num;
    }
    static function ctr_select_users(){
        $ex=new CRUD_FO_ACCESS();
        $id_fo=$ex->crud_obtain_id_fo($_GET['C']);
        $data=$ex->crud_select_users($id_fo);
        return $data;
    }
    static function ctr_select_rules(){
        $ex=new CRUD_FO_ACCESS();
        $id_fo=$ex->crud_obtain_id_fo($_GET['C']);
        $data=[];
        $rules=$ex->crud_select_rules($id_fo);
        $prohibitions=$ex->crud_select_prohibitions($id_fo);
        array_push($data,$rules,$prohibitions);
        return $data;
    }
}
?>