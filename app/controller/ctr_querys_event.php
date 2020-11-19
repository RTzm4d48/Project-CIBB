<?php
require_once(URL_PROJECT.'/app/model/crud_querys_event.php');
class CTR_QUERYS_EVENT{
    static function ctr_create_event($data){
        $ex=new CRUD_QUERYS_EVENT();
        $rpt=$ex->crud_create_event($data);
        return$rpt;
    }
    static function ctr_consult_exist_event(){
        $ex=new CRUD_QUERYS_EVENT();
        $rpt=$ex->crud_consult_exist_event();
        return $rpt;
    }
    static function ctr_deleted_event($id_event){
        $ex=new CRUD_QUERYS_EVENT();
        $rpt=$ex->crud_deleted_event($id_event);
        return $rpt;
    }
    static function ctr_joind_event($id_evt){
        $ex=new CRUD_QUERYS_EVENT();
        if($ex->validate_joind_event()!=false)return'exist';
        else{
            $name=$ex->crud_select_name_user(); 
            $rpt=$ex->crud_joind_event($id_evt,$name);return$rpt;
        }
    }
    static function ctr_validate_joind_event(){
        $ex=new CRUD_QUERYS_EVENT();
        return $ex->validate_joind_event();
    }
    static function ctr_select_participants($id_evt){
        $ex=new CRUD_QUERYS_EVENT();
        $rpt=$ex->crud_select_participants($id_evt);
        return$rpt;
    }
    static function ctr_position_participants($top_1,$top_2,$top_3,$id_evt){
        $ex=new CRUD_QUERYS_EVENT();
        $rpt=$ex->crud_position_participants($top_1,$top_2,$top_3,$id_evt);
        return$rpt;
    }
    static function ctr_add_point_users($point,$id_user){
        $ex=new CRUD_QUERYS_EVENT();
        $num_point=$ex->crud_obtain_points_user($id_user);
        $p=$num_point+$point;
        $rpt=$ex->crud_add_point_users($p,$id_user);
        return$rpt;
    }
    static function ctr_obtain_winers(){
        $ex=new CRUD_QUERYS_EVENT();
        $evt_id=$ex->crud_obtain_id_event();
        $data=$ex->crud_obtain_winers($evt_id);
        return $data;
    }
    static function ctr_close_event(){
        $ex=new CRUD_QUERYS_EVENT();
        $rpt=$ex->crud_close_event();
        return$rpt;
    }
    static function ctr_participation_plus(){
        $ex=new CRUD_QUERYS_EVENT();
        $us_participation=$ex->crud_obtain_num_participation();
        $us_participation++;
        $rpt=$ex->crud_participation_plus($us_participation);
        return$rpt;
    }
}
?>