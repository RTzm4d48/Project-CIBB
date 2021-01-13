<?php
require_once(URL_PROJECT.'/app/model/crud_querys_code_validations.php');
class CTR_QUERYS_CODE_VALIDATIONS{
    static function ctr_code_accound_valid($gmail,$code){
        $ex = new CRUD_QUERYS_CODE_VALIDATIONS();
        $rpt=$ex->crud_code_accound_valid($gmail,$code);
        return $rpt;
    }
    static function ctr_code_comparison($gmail){
        $ex = new CRUD_QUERYS_CODE_VALIDATIONS();
        $rpt=$ex->crud_code_comparison($gmail,$_POST['code']);
        if($rpt!=''){
            $ex->crud_deleted_code();
            $ex->crud_active_accound();
            return'corecto';
        }else return'El codigo es incorrecto';
    }
}
?>