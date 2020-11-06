<?php
require_once ($_SERVER['DOCUMENT_ROOT']. '/app/config/config.php');
require_once (URL_PROJECT.'/app/libs/console.php');
require_once (URL_PROJECT.'/app/model/connection.php');

class CRUD_UPDATE_PHOTO_F_O extends Connection{
    public function __construct(){
        $this->connect();
    }
    function crud_write_photo(){
        $image_01=(isset($_FILES['photo_01']))?$_FILES['photo_01']['tmp_name']:'null';
        $image_type_01=(isset($_FILES['photo_01']))?$_FILES['photo_01']['type']:'null';
        $image_02=(isset($_FILES['photo_02']))?$_FILES['photo_02']['tmp_name']:'null';
        $image_type_02=(isset($_FILES['photo_02']))?$_FILES['photo_02']['type']:'null';
        $image_03=(isset($_FILES['photo_03']))?$_FILES['photo_03']['tmp_name']:'null';
        $image_type_03=(isset($_FILES['photo_03']))?$_FILES['photo_03']['type']:'null';
        /* echo"hoLa <pre>";
        print_r($_FILES['photo_01']);
        echo"</pre>"; */
        //se redireccionan y se guardan en carpeta
        require_once URL_PROJECT.'/app/libs/resize_fo_photo.php';
        $rs=new Resize_photo();
        if($_FILES['photo_01']['tmp_name']!='')
        $rs->photo_big($image_01,'photo_01_user_'.$_COOKIE['id_user'],$image_type_01).$_SESSION['sess_photo_01']='true';
        if($_FILES['photo_02']['tmp_name']!='')
        $rs->photo_big($image_02,'photo_02_user_'.$_COOKIE['id_user'],$image_type_02).$_SESSION['sess_photo_02']='true';
        if($_FILES['photo_03']['tmp_name']!='')
        $rs->photo_big($image_03,'photo_03_user_'.$_COOKIE['id_user'],$image_type_03).$_SESSION['sess_photo_03']='true';
    }
    function crud_update_photo(){
        if(isset($_SESSION['sess_photo_01'])){
        //obtengo las imagenes ya redimensionadas
        $photo_01=URL_PROJECT."/public/tmp/tmp/photo_01_user_".$_COOKIE['id_user'].".jpg";
        $photo_01_bits=base64_encode(addslashes(fread(fopen($photo_01, "r"), filesize($photo_01))));
        $pr=$this->conn->prepare("UPDATE `f_o` SET `fo_photo_1`='".$photo_01_bits."' WHERE `fo_id`=?;");
        unset($_SESSION['sess_photo_01']);
        $pr->bind_param("i",$_COOKIE['user_id_fo']);
        if($pr->execute()){
            $pr->close();
            //deleted file
            $ruta1=URL_PROJECT."/public/tmp/tmp/photo_01_user_".$_COOKIE['id_user'].".jpg";
            if(file_exists($ruta1))@unlink($ruta1);
            return true;
        }else{
            $pr->close();
            return false;
        }
        }
        if(isset($_SESSION['sess_photo_02'])){
            //obtengo las imagenes ya redimensionadas
            $photo_02=URL_PROJECT."/public/tmp/tmp/photo_02_user_".$_COOKIE['id_user'].".jpg";
            $photo_02_bits=base64_encode(addslashes(fread(fopen($photo_02, "r"), filesize($photo_02))));
            $pr=$this->conn->prepare("UPDATE `f_o` SET `fo_photo_2`='".$photo_02_bits."' WHERE `fo_id`=?;");
            unset($_SESSION['sess_photo_02']);
            $pr->bind_param("i",$_COOKIE['user_id_fo']);
        if($pr->execute()){
            $pr->close();
            $ruta2=URL_PROJECT."/public/tmp/tmp/photo_02_user_".$_COOKIE['id_user'].".jpg";
            if(file_exists($ruta2))@unlink($ruta2);
            return true;
        }else{
            $pr->close();
            return false;
        }
        }
        if(isset($_SESSION['sess_photo_03'])){
            //obtengo las imagenes ya redimensionadas
            $photo_03=URL_PROJECT."/public/tmp/tmp/photo_03_user_".$_COOKIE['id_user'].".jpg";
            $photo_03_bits=base64_encode(addslashes(fread(fopen($photo_03, "r"), filesize($photo_03))));
            $pr=$this->conn->prepare("UPDATE `f_o` SET `fo_photo_3`='".$photo_03_bits."' WHERE `fo_id`=?;");
            unset($_SESSION['sess_photo_03']);
            $pr->bind_param("i",$_COOKIE['user_id_fo']);
        if($pr->execute()){
            $pr->close();
            $ruta3=URL_PROJECT."/public/tmp/tmp/photo_03_user_".$_COOKIE['id_user'].".jpg";
            if(file_exists($ruta3))@unlink($ruta3);
            return true;
        }else{
            $pr->close();
            return false;
        }
        }
        
    }
    function crud_obtain_code_fo(){
        $pr=$this->conn->prepare("SELECT fo_code FROM `f_o` WHERE fo_id=?;");
        $id=$_COOKIE['user_id_fo'];
        $pr->bind_param("s",$id);
        if($pr->execute()){
            $pr->store_result();
            $pr->bind_result($fo_code);
            //listamos todos los resultados
	        while($pr->fetch()){
              return $fo_code;
            }
            $pr->close();
        }else{
            exit('Error al realizar la consulta:'.$pr->close());
        }
    }
    function select_datos_fo_photo($code){
        $pr=$this->conn->prepare("SELECT fo_id,fo_photo_1,fo_photo_2,fo_photo_3 FROM f_o WHERE fo_code=?");
        $pr->bind_param("s",$code);
        if($pr->execute()){
            $pr->store_result();
            $pr->bind_result($id_fo,$fo_photo_1,$fo_photo_2,$fo_photo_3);
            //listamos todos los resultados
            while($pr->fetch()){
            //convert
            $photo_01=stripslashes(base64_decode($fo_photo_1));
            $photo_02=stripslashes(base64_decode($fo_photo_2));
            $photo_03=stripslashes(base64_decode($fo_photo_3));

            $ruta1=URL_PROJECT."/public/tmp/f_o/directori_".$id_fo."/photo_01.jpg";
            $this->base64_to_jpeg($photo_01,$ruta1);
            $ruta2=URL_PROJECT."/public/tmp/f_o/directori_".$id_fo."/photo_02.jpg";
            $this->base64_to_jpeg($photo_02,$ruta2);
            $ruta3=URL_PROJECT."/public/tmp/f_o/directori_".$id_fo."/photo_03.jpg";
            $this->base64_to_jpeg($photo_03,$ruta3);
            echo"<script type='text/javascript'>
            function actualizar(){location.reload(true);}
            setInterval('actualizar()',6000);
            </script>";
            return true;
            }
            $pr->close();
        }else{
            exit('Error al realizar la consulta:'.$pr->close());
        }
    }
    function base64_to_jpeg($base64_string,$output_file) {
        $ifp=fopen($output_file,"wb");
        fwrite($ifp,$base64_string);
        fclose($ifp);
    }
}