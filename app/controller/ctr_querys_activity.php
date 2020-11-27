<?php
require_once(URL_PROJECT.'/app/model/crud_querys_activity.php');
class CTR_QUERYS_ACTIVITY{
    static function ctr_act_participation(){
        $ex=new CRUD_QUERYS_ACTIVITY();
        $num=$ex->crud_obtain_num_participation();
        $num++;
        $rpt=$ex->crud_act_participation($num);
        return $rpt;
    }
    static function ctr_act_assistance(){
        $ex=new CRUD_QUERYS_ACTIVITY();
        $num=$ex->crud_obtain_num_assistance();
        $num++;
        $rpt=$ex->crud_act_assistance($num);
        return $rpt;
    }
    static function ctr_act_activities(){
        $ex=new CRUD_QUERYS_ACTIVITY();
        $num=$ex->crud_obtain_num_activities();
        $num++;
        $rpt=$ex->crud_act_activities($num);
        return $rpt;
    }
    static function ctr_data_graphics($fo_code){
        $ex=new CRUD_QUERYS_ACTIVITY();
        $fo_id=$ex->crud_obtain_id_fo($fo_code);
        $data=$ex->crud_data_graphics($fo_id);
        return $data;
    }
}
?>