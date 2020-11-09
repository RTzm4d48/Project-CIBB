<?php
require_once(URL_PROJECT.'/app/model/crud_querys_user.php');
class CTR_QUERYS_USER{
    static function ctr_uptade_data_user(){
        $ex=new CRUD_QUERYS_USER();
        $image=(isset($_FILES['img']))?$_FILES['img']['tmp_name']:null;
        if($image){
            $rpt=$ex->crud_uptade_data_user(true);
            return$rpt;
        }else{
            $rpt=$ex->crud_uptade_data_user(false);
            return$rpt;
        }
    }
    static function ctr_select_data_user(){
        $ex=new CRUD_QUERYS_USER();
        $data=$ex->crud_select_data_user();
        /* echo'<pre>';
        print_r($data);
        echo'</pre>'; */
        return$data;
    }
    static function ctr_join_to_fo(){
        $ex=new CRUD_QUERYS_USER();
        $rpt=$ex->crud_join_to_fo();
        return$rpt;
    }
    static function ctr_valid_fo_user(){
        if(!isset($_COOKIE['id_user'])){
            return 0;
        }else{
            $ex=new CRUD_QUERYS_USER();
            $rpt=$ex->crud_valid_fo_user();
            return$rpt;
        }
    }
    static function ctr_valid_leader(){
        $ex=new CRUD_QUERYS_USER();
        $rpt=$ex->crud_valid_leader();
        if($rpt=='Líder')return true;
        else return false;
    }
    static function ctr_validate_empty_fo(){
        $ex=new CRUD_QUERYS_USER();
        return $rpt=$ex->crud_validate_empty_fo();
    }
}?>