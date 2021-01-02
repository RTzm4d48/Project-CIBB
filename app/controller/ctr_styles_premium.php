<?php
require_once(URL_PROJECT.'/app/model/crud_styles_premium.php');
class CTR_STYLES_PREMIUM{
    static function save_colors($colors){
        $ex=new CRUD_STYLES_PREMIUM();
        $ex->desactive_all_styles();
        $rpt=$ex->crud_save_colors($colors);
        return $rpt;
    }
    static function ctr_select_color(){
        $ex=new CRUD_STYLES_PREMIUM();
        $data=$ex->crud_select_color();
        return $data;
    }
    static function ctr_deleted_color($id){
        $ex=new CRUD_STYLES_PREMIUM();
        $rpt=$ex->crud_deleted_color($id);
        return $rpt;
    }
    static function ctr_insert_style_fo($co1,$co2,$co3,$co4,$co5,$co6){
        $ex=new CRUD_STYLES_PREMIUM();
        $rpt=$ex->crud_valid_style_fo($co1,$co2,$co3,$co4,$co5,$co6);
        return true;
    }
    static function ctr_default_styles(){
        $id_fo = $_COOKIE['user_id_fo'];
        $ex=new CRUD_STYLES_PREMIUM();
        $rpt=$ex->crud_default_styles($id_fo);
        return $rpt;
    }
}
?>