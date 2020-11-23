<?php
require_once ($_SERVER['DOCUMENT_ROOT']. '/app/config/config.php');
require_once (URL_PROJECT. '/app/libs/console.php');
require_once (URL_PROJECT. '/app/model/connection.php');
/* -- */
class CRUD_MESSAGE extends Connection{

    function __construct(){
        $this->connect();
    }
    function crud_obtain_name_user(){
        $pr=$this->conn->prepare("SELECT us_user FROM the_user WHERE us_id=".$_COOKIE['id_user'].";");
        if($pr->execute()){
            $pr->store_result();
            $pr->bind_result($us_name);
            //listamos todos los resultados
	        while($pr->fetch()){
                $pr->close();
              return $us_name;
            }
        }else{
            exit('Error al realizar la consulta:'.$pr->close());
        }
    }
    function crud_insert_message($text,$name){
        //insert
        $pr=$this->conn->prepare("INSERT INTO `messages`(`ms_text`,`us_id`,`fo_id`)
        VALUES (?,".$_COOKIE['id_user'].",".$_COOKIE['user_id_fo'].");");
        $pr->bind_param("s",$text);
        if($pr->execute()){
            return true;
        }else{
            //exit('Error al realizar la consulta: '.$pr->close());
            return false;
        }
    }
    function crud_update_message($text){
        $pr=$this->conn->prepare("UPDATE `messages` SET `ms_text`=? WHERE us_id=".$_COOKIE['id_user'].";");
        $pr->bind_param("s",$text);
        if($pr->execute()){
            return true;
        }else{
            return false;
        } 
    }
    function crud_select_message($id_fo){
        
        $pr=$this->conn->prepare("SELECT U.us_img_little, U.us_user, M.ms_text, M.us_id  FROM messages M, the_user U WHERE M.us_id = U.us_id and M.fo_id =".$id_fo.";");
        $pr->execute();
        $pr->store_result();
        $all_data=[];
        $Row=$pr->num_rows();
        $pr->bind_result($img,$us_user,$text,$us_id);
        //listamos todos los resultados
        while($pr->fetch()){
            $img_little=stripslashes(base64_decode($img));
            $ruta=URL_PROJECT."/public/tmp/all_img_users/user_".$us_id."_img.jpg";
            $this->base64_to_jpeg($img_little,$ruta);

            $data=[$us_user,$text,$us_id];
            array_push($all_data,$data);
        }
        $all=['Row'=>$Row,'data'=>$all_data];
        return$all;
    }
    function base64_to_jpeg($base64_string,$output_file) {
        $ifp=fopen($output_file,"wb");
        fwrite($ifp,$base64_string);
        fclose($ifp);
    }
    function valid_exist(){
        $pr=$this->conn->prepare("SELECT `ms_id`FROM `messages` WHERE us_id=".$_COOKIE['id_user'].";");
        if($pr->execute()){
            $pr->store_result();
            if($pr->num_rows==0)return false;
            else{$pr->close();return true;}
        }else{
            exit('Error al realizar la consulta:'.$pr->close());
        }
    }
    function crud_select_my_message(){
        $pr=$this->conn->prepare("SELECT `ms_text`FROM `messages` WHERE us_id=".$_COOKIE['id_user'].";");
        if($pr->execute()){
            $pr->store_result();
            if($pr->num_rows==0)return false;
            else{
                $pr->bind_result($text);
                while($pr->fetch()){
                    $pr->close();return $text;
                }
            }
        }else{
            exit('Error al realizar la consulta:'.$pr->close());
        }
    }
    function crud_deleted_message(){
        $pr=$this->conn->prepare("DELETE FROM `messages` WHERE us_id=".$_COOKIE['id_user'].";");
        if($pr->execute()){
            return true;
        }else{
            return false;
        } 
    }
    function crud_valid_my_fo($fo_code){
        $pr=$this->conn->prepare("SELECT fo_id FROM `f_o` WHERE fo_code='".$fo_code."';");
        $pr->execute();
        $pr->store_result();
        $pr->bind_result($fo_id);
        //listamos todos los resultados
        while($pr->fetch()){return$fo_id;}
    }
}
?>