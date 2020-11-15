<?php
require_once ($_SERVER['DOCUMENT_ROOT']. '/app/config/config.php');
require_once (URL_PROJECT.'/app/libs/console.php');
require_once (URL_PROJECT.'/app/model/connection.php');
/* -- */
class CRUD_QUERYS_F_O extends Connection{

    function __construct(){
        $this->connect();
    }
    function valid_empty_fo(){
        $pr=$this->conn->prepare("SELECT us_user FROM the_user WHERE fo_id=?");
        $pr->bind_param("i",$_COOKIE['user_id_fo']);
        if($pr->execute()){
            $pr->store_result();
            if($pr->num_rows==1){		
                $pr2=$this->conn->prepare("UPDATE `f_o` SET `fo_operating`=? WHERE fo_id=?");
                $operating='not';
                $pr2->bind_param("si",$operating,$_COOKIE['user_id_fo']);
                $pr2->execute();
            }
        } else {
            exit('Error al realizar la consulta: '.$pr->close());
        }
    }
    function get_out_fo(){
        $pr=$this->conn->prepare("UPDATE `the_user` SET `us_rank`= ?, `fo_id`= ? WHERE us_id = ?");
        $rank='Sin rango';
        $fo_id=null;
        $pr->bind_param("sii", $rank, $fo_id, $_COOKIE['id_user']);
        if($pr->execute()){
            $pr->close();
            return true;
        } else {
            $pr->close();
            return false;
        }
    }
    function crud_get_out_fo(){
        $pr=$this->conn->prepare("SELECT fo_img_little,fo_name,fo_code,fo_activity,fo_description_short FROM `f_o` WHERE fo_operating='yes' ORDER BY fo_activity DESC LIMIT 10");
        if($pr->execute()){
            $pr->store_result();
            $Rows=$pr->num_rows();
            //Indicamos la variable donde se guardaran los resultados
            $pr->bind_result($fo_img_little,$fo_name,$fo_code,$fo_activity,$fo_description_short);
            $data=[];
            $name=[];
            $code=[];
            $activity=[];
            $description=[];
            //creamos un directorio
            $ruta=URL_PROJECT."/public/tmp/users/directori_".$_COOKIE['id_user']."/search_fo";
            if(!file_exists($ruta)) {
                mkdir($ruta,0700);
            }
            $i=0;
            while($pr->fetch()){
                $i++;
                array_push($name,$fo_name);
                array_push($code,$fo_code);
                array_push($activity,$fo_activity);
                array_push($description,$fo_description_short);
                //escribimos las imagenes
                $img=stripslashes(base64_decode($fo_img_little));
                $ruta=URL_PROJECT."/public/tmp/users/directori_".$_COOKIE['id_user']."/search_fo/img_all_".$fo_code.".jpg";
                $this->base64_to_jpeg($img,$ruta);
            }
            array_push($data,$name,$code,$activity,$description,$Rows);  
            return $data;
        }
    }
    function crud_get_out_fo_for_name(){
        $pr=$this->conn->prepare("SELECT fo_img_little,fo_name,fo_code,fo_activity,fo_description_short FROM `f_o` WHERE fo_operating='yes' and fo_name=? ORDER BY fo_activity DESC LIMIT 10");
        $name='neffex';
        $pr->bind_param("s",$_POST['txtSearch']);
        if($pr->execute()){
            $pr->store_result();
            $Rows=$pr->num_rows();
            //Indicamos la variable donde se guardaran los resultados
            $pr->bind_result($fo_img_little,$fo_name,$fo_code,$fo_activity,$fo_description_short);
            $data=[];
            $name=[];
            $code=[];
            $activity=[];
            $description=[];
            //creamos un directorio
            $ruta=URL_PROJECT."/public/tmp/users/directori_".$_COOKIE['id_user']."/search_fo";
            if(!file_exists($ruta)) {
                mkdir($ruta,0700);
            }
            $i=0;
            while($pr->fetch()){
                $i++;
                array_push($name,$fo_name);
                array_push($code,$fo_code);
                array_push($activity,$fo_activity);
                array_push($description,$fo_description_short);
                //escribimos las imagenes
                $img=stripslashes(base64_decode($fo_img_little));
                $ruta=URL_PROJECT."/public/tmp/users/directori_".$_COOKIE['id_user']."/search_fo/img_all_".$fo_code.".jpg";
                $this->base64_to_jpeg($img,$ruta);
            }
            array_push($data,$name,$code,$activity,$description,$Rows);  
            return $data;
        }
    }
    function base64_to_jpeg($base64_string,$output_file){
        $ifp=fopen($output_file,"wb");
        fwrite($ifp,$base64_string);
        fclose($ifp);
    }
    function crud_select_name_fo(){
        $pr=$this->conn->prepare("SELECT fo_name FROM `f_o` WHERE fo_id=?;");
        $pr->bind_param('i',$_COOKIE['user_id_fo']);
        if($pr->execute()){
            $pr->store_result();
            $pr->bind_result($fo_name);
            while($pr->fetch()){
                return$fo_name;
            }
        }
    }
    function crud_obtain_id_fo(){
        $pr=$this->conn->prepare("SELECT fo_id FROM `f_o` WHERE fo_code=?;");
        $code=(isset($_GET['C']))?$_GET['C']:$_SESSION['code_f_o'];
        $pr->bind_param("s",$code);
        if($pr->execute()){
            $pr->store_result();
            $pr->bind_result($fo_id);
            //listamos todos los resultados
	        while($pr->fetch()){
              return $fo_id;
            }
            $pr->close();
        }else{
            exit('Error al realizar la consulta:'.$pr->close());
        }
    }
}
