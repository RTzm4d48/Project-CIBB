<?php
require_once(URL_PROJECT.'/app/model/crud_perfil_users.php');
class CTR_PERFIL_USERS{
    static function ctr_select_peril_user($id_user){
        $ex=new CRUD_PERFIL_USERS();
        $data=$ex->crud_select_peril_user($id_user);
        return $data;
    }
}
?>