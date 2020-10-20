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
}?>