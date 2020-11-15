<?php
require_once(URL_PROJECT.'/app/model/crud_querys_event.php');
class CTR_QUERYS_EVENT{
    static function ctr_create_event($data){
        $ex=new CRUD_QUERYS_EVENT();
        $rpt=$ex->crud_create_event($data);
        return$rpt;
    }
}
?>