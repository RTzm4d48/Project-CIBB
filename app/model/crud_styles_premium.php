<?php
require_once ($_SERVER['DOCUMENT_ROOT']. '/app/config/config.php');
require_once (URL_PROJECT.'/app/libs/console.php');
require_once (URL_PROJECT.'/app/model/connection.php');
/* -- */
class CRUD_STYLES_PREMIUM extends Connection{

    function __construct(){
        $this->connect();
    }
    function desactive_all_styles(){

    }
    function crud_save_colors($colors){
        //insert
        $pr = $this->conn->prepare("INSERT INTO `styles_premium`(`sp_nombre`, `sp_color_1`, `sp_color_2`, `sp_color_3`, `sp_color_4`, `sp_color_5`, `fo_id`)
        VALUES (?,?,?,?,?,?,?)");
        $pr->bind_param("ssssssi",$colors[0],$colors[1],$colors[2],$colors[3],$colors[4],$colors[5],$_COOKIE['user_id_fo']);
        if($pr->execute()){
            $pr->close();
            return true;
        }else{
            $pr->close();
            return false;
        }
    }
    function crud_select_color(){
        $pr=$this->conn->prepare("SELECT `sp_id`, `sp_nombre`, `sp_color_1`, `sp_color_2`, `sp_color_3`, `sp_color_4`, `sp_color_5` FROM `styles_premium` WHERE fo_id = 3");
        if($pr->execute()){
            $pr->store_result();
            $Row=$pr->num_rows();
            //Indicamos la variable donde se guardaran los resultados
            $pr->bind_result($sp_id, $sp_nombre, $sp_color_1, $sp_color_2, $sp_color_3, $sp_color_4, $sp_color_5);
            $all_data=[];
            while($pr->fetch()){
                $data=['num'=>$Row,'id'=>$sp_id,'name'=>$sp_nombre,'color_01'=>$sp_color_1,'color_02'=>$sp_color_2,'color_03'=>$sp_color_3,'color_04'=>$sp_color_4,'color_05'=>$sp_color_5];
                array_push($all_data,$data);
            }
            return $all_data;
        }
    }
    function crud_deleted_color($id){
        $pr=$this->conn->prepare("DELETE FROM `styles_premium` WHERE sp_id=".$id.";");
        if($pr->execute()){
            $pr->close();
            return true;
        }else{
            $pr->close();
            return false;
        }
    }
    function crud_valid_style_fo($co1,$co2,$co3,$co4,$co5){
        $pr=$this->conn->prepare("SELECT `spf_id` FROM `styles_premium_fo` WHERE fo_id = ".$_COOKIE['user_id_fo'].";");
        if($pr->execute()){
            $pr->store_result();
            if($pr->num_rows == 0){$pr->close(); $this->crud_insert_style_fo($co1,$co2,$co3,$co4,$co5);}
            else {$pr->close(); $this->crud_deleted_styles_fo($co1,$co2,$co3,$co4,$co5);}
        }
    }
    function crud_deleted_styles_fo($co1,$co2,$co3,$co4,$co5){
        $pr=$this->conn->prepare("DELETE FROM `styles_premium_fo` WHERE fo_id = ".$_COOKIE['user_id_fo'].";");
        if($pr->execute()){
            $pr->close();
            $this->crud_insert_style_fo($co1,$co2,$co3,$co4,$co5);
        }else{
            $pr->close();
            return false;
        }
    }
    function crud_insert_style_fo($co1,$co2,$co3,$co4,$co5){
        $pr=$this->conn->prepare("INSERT INTO `styles_premium_fo`(`spf_color_1`, `spf_color_2`, `spf_color_3`, `spf_color_4`, `spf_color_5`, `fo_id`)
        VALUES ('".$co1."','".$co2."','".$co3."','".$co4."','".$co5."',".$_COOKIE['user_id_fo'].");");
        if($pr->execute()){
            $pr->close();
            return true;
        }else{
            $pr->close();
            return false;
        }
    }
}
?>