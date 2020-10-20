<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/app/config/config.php');
require_once(URL_PROJECT.'/app/libs/console.php');
require_once(URL_PROJECT.'/app/model/connection.php');
class CRUD_QUERYS_USER extends Connection{
    function __construct(){
        $this->connect();
    }

    function crud_uptade_data_user($val_img){
        $image=(isset($_FILES['img']))?$_FILES['img']['tmp_name']:null;
        $image_type=(isset($_FILES['img']))?$_FILES['img']['type']:null;
        $user=(isset($_POST['name']))?$_POST['name']:null;
        $state=(isset($_POST['state']))?$_POST['state']:null;
        $email=(isset($_POST['email']))?$_POST['email']:null;
        if($val_img){
            require_once URL_PROJECT.'/app/libs/resize_img_user.php';
            $rs=new Resize_user();
            $rs->resized_img_fo_big($image,$user,$image_type);
            $rs->resized_img_fo_little($image,$user,$image_type);
            //obtengo las imagenes ya redimensionadas
            $img_big=URL_PROJECT."/public/tmp/tmp/user_size-$user-big.jpg";
            $image_big_bits=base64_encode(addslashes(fread(fopen($img_big,"r"),filesize($img_big))));
            $img_little=URL_PROJECT."/public/tmp/tmp/user_size-$user-little.jpg";
            $image_little_bits=base64_encode(addslashes(fread(fopen($img_little,"r"),filesize($img_little))));
            $pr=$this->conn->prepare("UPDATE`the_user`SET`us_gmail`=?,`us_user`=?,`us_img_big`='". $image_big_bits ."',`us_img_little`='". $image_little_bits ."',`us_state`=? WHERE us_id=?");
            $pr->bind_param("sssi",$email,$user,$state,$_COOKIE['id_user']);
            if($pr->execute()){
                $pr->close();
                $this->crud_select_data_user();
                return true;
            }else{
                $pr->close();
                return false;
            }
        }
        else{$pr=$this->conn->prepare("UPDATE `the_user` SET `us_gmail`=?,`us_user`=?,`us_state`=? WHERE us_id=?");
        $pr->bind_param("sssi",$email,$user,$state,$_COOKIE['id_user']);
        if($pr->execute()){
            $pr->close();
            return true;
        }else{
            $pr->close();
            return false;
        }
        }
    }
    function crud_select_data_user(){
        $pr=$this->conn->prepare("SELECT us_user,us_img_big,us_img_little,us_state,us_gmail FROM the_user WHERE us_id=?");
        $pr->bind_param("i",$_COOKIE['id_user']);
        if($pr->execute()){
            $pr->store_result();
            $pr->bind_result($us_user,$img_big,$us_img_little,$us_state,$us_gmail);
            //listamos todos los resultados
	        while($pr->fetch()){
               $image_big=stripslashes(base64_decode($img_big));
               $image_little=stripslashes(base64_decode($us_img_little));
               //echo($imagen);  
               $ruta_big=URL_PROJECT."/public/tmp/users/directori_".$_COOKIE['id_user']."/img_perfil_big.jpg";
               $this->base64_to_jpeg($image_big,$ruta_big);
               $ruta_little=URL_PROJECT."/public/tmp/users/directori_".$_COOKIE['id_user']."/img_perfil_little.jpg";
               $this->base64_to_jpeg($image_little,$ruta_little);
               return$data=['name_user'=>$us_user,'state'=>$us_state,'gmail'=>$us_gmail];
            }
            $pr->close();
        }else{
            exit('Error al realizar la consulta:'.$pr->close());
        }
    }
    function base64_to_jpeg($base64_string, $output_file){
        $ifp=fopen( $output_file,"wb");
        fwrite($ifp,$base64_string);
        fclose($ifp); 
    }
}