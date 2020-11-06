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
    static function ctr_update_data_fo(){
        require_once(URL_PROJECT.'/app/model/crud_update_f_o.php');
        $ex=new CRUD_UPDATE_F_O();
        if(isset($_FILES['image']['tmp_name'])&&$_FILES['image']['tmp_name']!=''){$ex->update_with_img();$ex->update();}
        else $ex->update();
        if($ex==true)return true;
        else return false;
    }
    static function ctr_write_photo(){
        if($_FILES['photo_01']['tmp_name'] !=''||$_FILES['photo_02']['tmp_name'] !=''||$_FILES['photo_03']['tmp_name'] !=''){
            require_once(URL_PROJECT.'/app/model/crud_update_photo_fo.php');
            $ex=new CRUD_UPDATE_PHOTO_F_O();
            $ex->crud_write_photo();
            return true;
        }else return false;;
    }
    static function ctr_update_photo(){
        if(isset($_SESSION['sess_photo_01'])||isset($_SESSION['sess_photo_02'])||isset($_SESSION['sess_photo_03'])){
            require_once(URL_PROJECT.'/app/model/crud_update_photo_fo.php');
            $ex=new CRUD_UPDATE_PHOTO_F_O();
            $ex->crud_update_photo();
            $code=$ex->crud_obtain_code_fo();
            $lol=$ex->select_datos_fo_photo($code);
            return true;
        }else return false;
    }
    static function ctr_select_rules(){
        require_once(URL_PROJECT.'/app/model/crud_update_f_o.php');
        $ex=new CRUD_UPDATE_F_O();
        $rules=$ex->crud_select_rules($_COOKIE['user_id_fo']);
        /* print_r($rules); */
        return$rules;
    }
    static function ctr_select_prohibitions(){
        require_once(URL_PROJECT.'/app/model/crud_update_f_o.php');
        $ex=new CRUD_UPDATE_F_O();
        $prohibitions=$ex->crud_select_prohibitions($_COOKIE['user_id_fo']);
        /* print_r($prohibitions); */
        return $prohibitions;
    }
    static function ctr_update_rules_prohibitions(){
        require_once(URL_PROJECT.'/app/model/crud_update_f_o.php');
        $ex=new CRUD_UPDATE_F_O();
        $ex->crud_update_rules($_COOKIE['user_id_fo']);
        $ex->crud_update_prohibitions($_COOKIE['user_id_fo']);
        echo"ceececec";
        if($ex==true)
        return true;
        else return false;
    }
}?>