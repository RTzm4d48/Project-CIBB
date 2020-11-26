<?php
require_once ($_SERVER['DOCUMENT_ROOT']. '/app/config/config.php');
require_once (URL_PROJECT. '/app/libs/console.php');
require_once (URL_PROJECT. '/app/model/connection.php');
/* -- */
class CRUD_CREATE_F_O extends Connection{

    function __construct(){
        $this->connect();
    }
    function crud_prepare_data(){
        $image=(isset($_FILES['image'])) ? $_FILES['image']['tmp_name'] : 'null';
        $image_type=(isset($_FILES['image'])) ? $_FILES['image']['type'] : 'null';
        $img=($image!='') ? $_FILES['image']['tmp_name'] : 'null';
        $name=(isset($_POST['namee'])&& $_POST['namee'] != '') ? $_POST['namee'] : 'null';
        if($_FILES['image']['type'] == 'image/jpeg' || $_FILES['image']['type'] == 'image/png' || $_FILES['image']['type'] == ''){
            if($image != ''){
                //se redireccionan y se guardan en carpeta
                require_once URL_PROJECT.'/app/libs/resize_img.php';
                $rs = new Resize();
                $rs->resized_img_fo_big($img, $name, $image_type);
                $rs->resized_img_fo_little($img, $name, $image_type);
                return true;}
                else return true;
        }else{
            return true;//extencion no permitida
        }
    }
    function crud_previous_create(){
        $day = date("d")+3;
        $month = date("m");
        if(28 >= $day || 8 != $month){
        }
        return false;
    }
    function insert_fo($data){
        if($data['image']=='yesimg'){
            //obtengo las imagenes ya redimensionadas
            $img_big = URL_PROJECT."/public/tmp/tmp/size-".$data['name']."-big.jpg";
            $image_big_bits = base64_encode(addslashes(fread(fopen($img_big, "r"), filesize($img_big))));
            $img_little = URL_PROJECT."/public/tmp/tmp/size-".$data['name']."-little.jpg";
            $image_little_bits = base64_encode(addslashes(fread(fopen($img_little, "r"), filesize($img_little))));
        }else{
            //obtengo imagenes default
            $img_big = URL_PROJECT."/app/tmp/default/default_big.jpg";
            $image_big_bits = base64_encode(addslashes(fread(fopen($img_big, "r"), filesize($img_big))));
            $img_little = URL_PROJECT."/app/tmp/default/default_little.jpg";
            $image_little_bits = base64_encode(addslashes(fread(fopen($img_little, "r"), filesize($img_little))));
        }
        $photo_url=URL_PROJECT."/public/tmp/default/photo_defaultt.jpg";
        $photo=base64_encode(addslashes(fread(fopen($photo_url, "r"), filesize($photo_url))));
        //$ex = obtain_id();
        //insert
        $pr = $this->conn->prepare("INSERT INTO `f_o`(`fo_img_little`, `fo_img_big`, `fo_name`, `fo_description`,`fo_description_short`, `fo_tag`, `fo_url_w_a`, `fo_url_b_b_f`, `fo_url_m`, `fo_photo_1`, `fo_photo_2`, `fo_photo_3`, `fo_activity`,`fo_label`)
        VALUES ('".$image_little_bits."', '".$image_big_bits."',?,?,?,?,?,?,?,'".$photo."','".$photo."','".$photo."',0,?);");
        $pr->bind_param("ssssssss",$data['name'],$data['description'],$data['description'],$data['tag'],$data['url_w_a'],$data['url_b_b_f'],$data['url_m'],$data['label']);
        if($pr->execute()){
            $this->obtain_id();
            return true;
        }else{
            //exit('Error al realizar la consulta: '.$pr->close());
            return false;
        } 
    }
    function obtain_id(){
        $id = mysqli_insert_id($this->conn);
        /* console("Inser ID: ".$id); */
        $_SESSION['sess_id'] = $id;
        $this->insert_rank();
        $this->select_code();
    }
    function select_code(){
        $pr = $this->conn->prepare("SELECT fo_code FROM `f_o` WHERE fo_id = ?");
        $pr->bind_param("i", $_SESSION['sess_id']);
        if($pr->execute()){
            $pr->store_result();
            $pr->bind_result($fo_code);

            //obtenemos el resultado
	        while($pr->fetch()){
                $_SESSION['sess_code'] = $fo_code; 
            }
            $pr->close();
        }else{
            exit('Error al realizar la consulta: '.$pr->close());
        }
    }
    function crud_select_code_fo(){
        $pr=$this->conn->prepare("SELECT fo_code FROM `f_o` WHERE fo_id=".$_COOKIE['user_id_fo'].";");
        $pr->execute();
        $pr->store_result();
        $pr->bind_result($fo_code);
        //listamos todos los resultados
        while($pr->fetch()){return$fo_code;}
    }
    function insert_rank(){
        $pr = $this->conn->prepare("UPDATE `the_user` SET `us_rank`= ?, `fo_id`= ? WHERE us_id = ?");
        $rank = 'Líder';
        $pr->bind_param("sii", $rank, $_SESSION['sess_id'], $_COOKIE['id_user']);
        if($pr->execute()){
            setcookie('user_id_fo', $_SESSION['sess_id'], strtotime( '+360 days' ), '/');
            /* console('rank user finished'); */
        } else {
            exit('Error al realizar la consulta: '.$pr->close());
        }

    }
}
?>