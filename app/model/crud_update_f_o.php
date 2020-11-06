<?php
require_once ($_SERVER['DOCUMENT_ROOT']. '/app/config/config.php');
require_once (URL_PROJECT.'/app/libs/console.php');
require_once (URL_PROJECT.'/app/model/connection.php');

class CRUD_UPDATE_F_O extends Connection{
    public function __construct(){
        $this->connect();
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
    function update_with_img(){
        $image=(isset($_FILES['image'])) ? $_FILES['image']['tmp_name'] : 'null';
        $image_type=(isset($_FILES['image'])) ? $_FILES['image']['type'] : 'null';
        $name='foid_'.$_COOKIE['user_id_fo'].'update';
        //se redireccionan y se guardan en carpeta
        require_once URL_PROJECT.'/app/libs/resize_img.php';
        $rs=new Resize();
        $rs->resized_img_fo_big($image,$name,$image_type);
        $rs->resized_img_fo_little($image,$name,$image_type);
        //obtengo las imagenes ya redimensionadas
        $img_big=URL_PROJECT."/public/tmp/tmp/size-$name-big.jpg";
        $image_big_bits=base64_encode(addslashes(fread(fopen($img_big,"r"),filesize($img_big))));
        $img_little=URL_PROJECT."/public/tmp/tmp/size-$name-little.jpg";
        $image_little_bits=base64_encode(addslashes(fread(fopen($img_little,"r"),filesize($img_little))));
        //update
        $pr=$this->conn->prepare("UPDATE `f_o` SET `fo_img_little`='".$image_little_bits."', `fo_img_big`='".$image_big_bits."' WHERE `fo_id`=?;");
        $pr->bind_param("i",$_COOKIE['user_id_fo']);
        if($pr->execute()){
            $pr->close();
            /* echo"<script type='text/javascript'>
            if (window.location.href.substr(-2) !== '/?settings_fo=set&edit=set') {
                window.location = window.location.href;
            }
            </script>"; */
            return true;
        }else{
            $pr->close();
            return false;
        }
    }
    function crud_select_rules($fo_id){
        $pr=$this->conn->prepare("SELECT `rf_rule` FROM `rules_fo` WHERE `fo_id`=?");
        $pr->bind_param("i",$fo_id);
        if($pr->execute()){
            $pr->store_result();
            $num_rules=$pr->num_rows();
            $pr->bind_result($rules_fo);
            $rules=[];
            $data=[];
            while($pr->fetch()){
                array_push($rules,$rules_fo);
            }
            array_push($data,$num_rules,$rules);
            $pr->close();
            return $data;
        }else{
            $pr->close();
        }
    }
    function crud_select_prohibitions($fo_id){
        $pr=$this->conn->prepare("SELECT `pf_prohibition` FROM `prohibition_fo` WHERE `fo_id`=?");
        $pr->bind_param("i",$fo_id);
        if($pr->execute()){
            $pr->store_result();
            $num_prohibitions=$pr->num_rows();
            $pr->bind_result($prohibitions_fo);
            $prohibitions=[];
            $data=[];
            while($pr->fetch()){
                array_push($prohibitions,$prohibitions_fo);
            }
            array_push($data,$num_prohibitions,$prohibitions);
            $pr->close();
            return $data;
        }else{
            $pr->close();
        }
    }
    function crud_update_rules($fo_id){
        $num_rules=(isset($_POST['num_rule']))?$_POST['num_rule']:1;

        $rule_1=(isset($_POST['rule_1']))?$_POST['rule_1']:'null';
        $rule_2=(isset($_POST['rule_2']))?$_POST['rule_2']:'null';
        $rule_3=(isset($_POST['rule_3']))?$_POST['rule_3']:'null';
        $rule_4=(isset($_POST['rule_4']))?$_POST['rule_4']:'null';
        $rule_5=(isset($_POST['rule_5']))?$_POST['rule_5']:'null';

        $pr=$this->conn->prepare("CALL proc_update_rulers(?,?,?,?,?,?,?)");
        $pr->bind_param("iisssss",$num_rules,$fo_id,$rule_1,$rule_2,$rule_3,$rule_4,$rule_5);
        if($pr->execute()){
            $pr->close();
            return true;
        }else{
            $pr->close();
            return false;
        }
    }
    function crud_update_prohibitions($fo_id){
        $num_prohibitions=(isset($_POST['num_prohibition']))?$_POST['num_prohibition']:1;

        $prohibition_1=(isset($_POST['prohibition_1']))?$_POST['prohibition_1']:'null';
        $prohibition_2=(isset($_POST['prohibition_2']))?$_POST['prohibition_2']:'null';
        $prohibition_3=(isset($_POST['prohibition_3']))?$_POST['prohibition_3']:'null';
        $prohibition_4=(isset($_POST['prohibition_4']))?$_POST['prohibition_4']:'null';
        $prohibition_5=(isset($_POST['prohibition_5']))?$_POST['prohibition_5']:'null';

        $pr=$this->conn->prepare("CALL proc_update_prohibitions(?,?,?,?,?,?,?)");
        $pr->bind_param("iisssss",$num_prohibitions,$fo_id,$prohibition_1,$prohibition_2,$prohibition_3,$prohibition_4,$prohibition_5);
        if($pr->execute()){
            $pr->close();
            return true;
        }else{
            $pr->close();
            return false;
        }
    }
}