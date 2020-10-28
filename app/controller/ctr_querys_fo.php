<?php
require_once(URL_PROJECT.'/app/model/crud_querys_f_o.php');
class CTR_QUERYS_F_O{
    static function get_out_fo(){
        $ex=new CRUD_QUERYS_F_O();
        $rpt=$ex->get_out_fo();
        return $rpt;
    }
    static function ctr_search_all_fo(){
        $ex=new CRUD_QUERYS_F_O();
        $data=$ex->crud_get_out_fo();
        /* echo '<pre>';
        print_r($data);
        echo '</pre>'; */
        return $data;
    }
    static function ctr_select_name_fo(){
        $ex=new CRUD_QUERYS_F_O();
        $name=$ex->crud_select_name_fo();
        return$name;
    }
    static function ctr_obtain_id_fo(){
        $ex=new CRUD_QUERYS_F_O();
        $rpt=$ex->crud_obtain_id_fo();
        return$rpt;
    }
}?>