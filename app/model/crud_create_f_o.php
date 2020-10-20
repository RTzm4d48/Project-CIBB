<?php
require_once ($_SERVER['DOCUMENT_ROOT']. '/app/config/config.php');
require_once (URL_PROJECT. '/app/libs/console.php');
require_once (URL_PROJECT. '/app/model/connection.php');
/* -- */
class CRUD_CREATE_F_O extends Connection{

    function __construct(){
        $this->connect();
    }
    public function insert_fo(){
        $image=(isset($_FILES['image'])) ? $_FILES['image']['tmp_name'] : 'null';
        $image_type=(isset($_FILES['image'])) ? $_FILES['image']['type'] : 'null';
        $img=($image!='') ? $_FILES['image']['tmp_name'] : 'null';
        $name=(isset($_POST['namee'])&&$_POST['namee'] != '') ? $_POST['namee'] : 'null';
        $name=(isset($_POST['namee'])&& $_POST['namee'] != '') ? $_POST['namee'] : 'null';
        $description=(isset($_POST['description']) && $_POST['description'] != '') ? $_POST['description'] : 'null';
        $tag=(isset($_POST['tag']) && $_POST['tag'] != '') ? $_POST['tag'] : 'null';
        $url_w_a=(isset($_POST['UrlWebAlternative']) && $_POST['UrlWebAlternative'] != '') ? $_POST['UrlWebAlternative'] : 'null';
        $url_b_b_f=(isset($_POST['UrlFo']) && $_POST['UrlFo'] != '') ? $_POST['UrlFo'] : 'null';
        $url_m=(isset($_POST['UrlMusic']) && $_POST['UrlMusic'] != '') ? $_POST['UrlMusic'] : 'null';

        if($image != ''){
            //se redireccionan y se guardan en carpeta
            require_once URL_PROJECT.'/app/libs/resize_img.php';
            $rs = new Resize();
            $rs->resized_img_fo_big($img, $name, $image_type);
            $rs->resized_img_fo_little($img, $name, $image_type);

        }
        if($image != ''){
            //obtengo las imagenes ya redimensionadas
            $img_big = URL_PROJECT."/public/tmp/tmp/size-$name-big.jpg";
            $image_big_bits = base64_encode(addslashes(fread(fopen($img_big, "r"), filesize($img_big))));
            $img_little = URL_PROJECT."/public/tmp/tmp/size-$name-little.jpg";
            $image_little_bits = base64_encode(addslashes(fread(fopen($img_little, "r"), filesize($img_little))));
        }else{
            //obtengo imagenes default
            $img_big = URL_PROJECT."/app/tmp/default/default_big.jpg";
            $image_big_bits = base64_encode(addslashes(fread(fopen($img_big, "r"), filesize($img_big))));
            $img_little = URL_PROJECT."/app/tmp/default/default_little.jpg";
            $image_little_bits = base64_encode(addslashes(fread(fopen($img_little, "r"), filesize($img_little))));
        }
        //$ex = obtain_id();
        //insert
        $pr = $this->conn->prepare("INSERT INTO `f_o`(`fo_img_little`, `fo_img_big`, `fo_name`, `fo_description`,`fo_description_short`, `fo_tag`, `fo_url_w_a`, `fo_url_b_b_f`, `fo_url_m`, `fo_photo_1`, `fo_photo_2`, `fo_photo_3`, `fo_activity`)
        VALUES ('".$image_little_bits."', '".$image_big_bits."',?,?,?,?,?,?,?,null,null,null,0);");
        $pr->bind_param("sssssss", $name,$description,$description, $tag, $url_w_a, $url_b_b_f, $url_m);
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
        console("Inser ID: ".$id);
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
    function insert_rank(){
        $pr = $this->conn->prepare("UPDATE `the_user` SET `us_rank`= ?, `fo_id`= ? WHERE us_id = ?");
        $rank = 'leader';
        $pr->bind_param("sii", $rank, $_SESSION['sess_id'], $_COOKIE['id_user']);
        if($pr->execute()){
            setcookie('user_id_fo', $_SESSION['sess_id'], strtotime( '+360 days' ), '/');
            console('rank user finished');
        } else {
            exit('Error al realizar la consulta: '.$pr->close());
        }

    }
}
?>