<?php
require_once ($_SERVER['DOCUMENT_ROOT']. '/app/config/config.php');
require_once (URL_PROJECT.'/app/libs/console.php');
require_once (URL_PROJECT.'/app/model/connection.php');
/* -- */
class CRUD_ADMINISTRATION extends Connection{

    function __construct(){
        $this->connect();
    }
    function crud_select_user(){
        $pr=$this->conn->prepare("SELECT us_id,us_user,us_img_big,us_rank FROM the_user WHERE fo_id=".$_COOKIE['user_id_fo']." AND us_rank != 'lider';");
        if($pr->execute()){
            $pr->store_result();
            $Row=$pr->num_rows();
            $pr->bind_result($us_id,$us_user,$us_img_big,$us_rank);
            //crear la carpeta
            $ruta=URL_PROJECT."/public/tmp/all_img_users/big_img_users";
            if(!file_exists($ruta)){
                mkdir($ruta,0700);
            }
            $all_data=[];
            //listamos todos los resultados
	        while($pr->fetch()){
               $image_big=stripslashes(base64_decode($us_img_big));
               //echo($imagen);  
               $ruta_big=URL_PROJECT."/public/tmp/all_img_users/big_img_users/big_user_".$us_id."_img.jpg";
               $this->base64_to_jpeg($image_big,$ruta_big);
               $data=[$us_id,$us_user,$us_rank];
               array_push($all_data,$data);
            }
            $all=['user'=>$all_data,'Row'=>$Row];
            $pr->close();
            return$all;
        }else{
            exit('Error al realizar la consulta:'.$pr->close());
        }
    }
    function base64_to_jpeg($base64_string,$output_file) {
        $ifp=fopen($output_file,"wb");
        fwrite($ifp,$base64_string);
        fclose($ifp);
    }
    function crud_select_rank_user($id_user){
        $pr=$this->conn->prepare("SELECT us_rank FROM the_user WHERE us_id=$id_user;");
        if($pr->execute()){
            $pr->store_result();
            $pr->bind_result($us_rank);
            //listamos todos los resultados
	        while($pr->fetch()){$pr->close();return$us_rank;}
        }else{
            exit('Error al realizar la consulta:'.$pr->close());
        }
    }
    function crud_ascend_user($id_user){
        $pr=$this->conn->prepare("UPDATE `the_user` SET `us_rank`='Leyenda' WHERE us_id = $id_user;");
        if($pr->execute()){
            return true;
        }else{
            return false;
        }
    }
    function crud_degrade_user($id_user){
        $pr=$this->conn->prepare("UPDATE `the_user` SET `us_rank`='Oficial' WHERE us_id = $id_user;");
        if($pr->execute()){
            return true;
        }else{
            return false;
        }
    }
    function crud_expel_user($id_user){
        $pr=$this->conn->prepare("UPDATE `the_user` SET `us_rank`='Sin rango',`fo_id`=null,`us_participation`=0,`us_point`=0 WHERE us_id = $id_user;");
        if($pr->execute()){
            return true;
        }else{
            return false;
        }
    }

    function deleted_participation_user($id_user){
        $pr=$this->conn->prepare("DELETE FROM `participants_event` WHERE us_id=?");
        $pr->bind_param("i",$id_user);
        if($pr->execute()){
            return true;
        }else{
            return false;
        }
    }
    function deleted_messages_user($id_user){
        $pr=$this->conn->prepare("DELETE FROM `messages` WHERE us_id=?");
        $pr->bind_param("i",$id_user);
        if($pr->execute()){
            return true;
        }else{
            return false;
        }
    }
}
?>