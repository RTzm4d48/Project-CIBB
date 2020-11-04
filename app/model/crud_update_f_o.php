<?php
require_once ($_SERVER['DOCUMENT_ROOT']. '/app/config/config.php');
require_once (URL_PROJECT.'/app/libs/console.php');
require_once (URL_PROJECT.'/app/model/connection.php');

class CRUD_UPDATE_F_O extends Connection{
    public function __construct(){
        $this->connect();
    }
    function ctr_function_update(){
        if(!isset($_POST['image']))$this->update();
    }
    function update(){
        $pr=$this->conn->prepare("UPDATE `f_o` SET `fo_name`=?,`fo_description`=?,`fo_description_short`=?,`fo_tag`=?,`fo_url_w_a`=?,`fo_url_b_b_f`=?,`fo_url_m`=? WHERE `fo_id`=?;");
        $name=(isset($_POST['input_name']))?$_POST['input_name']:'--';
        $description=(isset($_POST['description']))?$_POST['description']:'--';
        $description_short=(isset($_POST['description']))?$_POST['description']:'--';
        $tag=(isset($_POST['input_tag']))?$_POST['input_tag']:'--';
        $url_w_a=(isset($_POST['input_url_w_a']))?$_POST['input_url_w_a']:'--'; 
        $fo_url_b_b_f=(isset($_POST['fo_url_b_b_f']))?$_POST['fo_url_b_b_f']:'--';
        $fo_url_m=(isset($_POST['fo_url_m']))?$_POST['fo_url_m']:'--';
        $pr->bind_param("sssssssi",$name,$description,$description_short,$tag,$url_w_a,$fo_url_b_b_f,$fo_url_m,$_COOKIE['user_id_fo']);
        if($pr->execute()){
            $pr->close();
            return true;
        }else{
            $pr->close();
            return false;
        }
    }
}