<?php
require_once(URL_PROJECT.'/app/model/crud_querys_code_validations.php');
class CTR_QUERYS_CODE_VALIDATIONS{
    static function ctr_code_accound_valid($gmail,$code){
        $ex=new CRUD_QUERYS_CODE_VALIDATIONS();
        if($x=$ex->crud_equals_gmail($gmail))$rpt=$ex->crud_update_code($gmail,$code);
        else $rpt=$ex->crud_code_accound_valid($gmail,$code);
        return $rpt;
    }
    static function ctr_code_comparison($gmail){
        $ex = new CRUD_QUERYS_CODE_VALIDATIONS();
        if($rpt=$ex->crud_code_comparison($gmail,$_POST['code'])){
            $ex->crud_deleted_code($gmail);
            $ex->crud_active_accound($gmail);
            return true;
        }    
        else return false;
    }
    static function ctr_compare_gmail($gmail,$code){
        $ex = new CRUD_QUERYS_CODE_VALIDATIONS();
        $rpt_us_id=$ex->crud_compare_gmail($gmail);
        if($rpt_us_id!=false){
            $x=$ex->crud_equals_id_pass($rpt_us_id);
            if(!$x)$the_rpt=$ex->crud_code_chanelpass_code_pass($gmail,$rpt_us_id);
            return $x;
        }else return 'el gmail '.$gmail.' no esta registrado en ninguna cuenta.';
    }
    static function ctr_chanel_password($id,$pass){
        $ex = new CRUD_QUERYS_CODE_VALIDATIONS();
        $rpt=$ex->crud_chanel_password($id,$pass);
        return $rpt;
    }
    static function ctr_valid_code_pass($id_us){
        $ex = new CRUD_QUERYS_CODE_VALIDATIONS();
        $rpt=$ex->crud_valid_code_pass($id_us);
        return $rpt;
    }
    static function ctr_deleted_code_pass($id_us){
        $ex = new CRUD_QUERYS_CODE_VALIDATIONS();
        $rpt=$ex->crud_deleted_code_pass($id_us);
        return $rpt;
    }
  
}
?>