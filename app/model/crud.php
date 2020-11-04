<?php
require_once ($_SERVER['DOCUMENT_ROOT']. '/app/config/config.php');
require_once (URL_PROJECT. '/app/libs/console.php');
require_once (URL_PROJECT. '/app/model/connection.php');
/* -- */
class CRUD extends Connection{
    function __construct(){
        $this->connect();
    }
    function select_code(){
        $pr = $this->conn->prepare("SELECT fo_code FROM`f_o`WHERE fo_id=?");
        $pr->bind_param("i",$_SESSION['sess_id']);
        if($pr->execute()){
            $pr->store_result();
            $pr->bind_result($fo_code);
            //obtenemos el resultado
	        while($pr->fetch()){
                $_SESSION['sess_code']=$fo_code; 
                $this->rank_user_leader();
            }
            $pr->close();
        }else{
            exit('Error al realizar la consulta:'.$pr->close());
        }
    }
    function rank_user_leader(){
        $pr=$this->conn->prepare("UPDATE `the_user` SET `us_rank`=?, `fo_id`=? WHERE us_id=?");
        $rank='leader';
        $pr->bind_param("sii", $rank, $_SESSION['sess_id'], $_COOKIE['id_user']);
        if($pr->execute()){
            console('rank user finished');
        } else {
            exit('Error al realizar la consulta:'.$pr->close());
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
    public function select_datos_fo($code){
        if(isset($code)){
            $pr=$this->conn->prepare("SELECT fo_img_little, fo_img_big, fo_name, fo_description, 
            fo_tag, fo_url_w_a, fo_url_b_b_f, fo_url_m, fo_id FROM f_o WHERE fo_code=?");
            $pr->bind_param("s",$code);
            if($pr->execute()){
                $pr->store_result();
                if($pr->num_rows==0){
                    $pr->close();
                    echo"<div style='color: white;font-family:Arial;text-align:center;width:100%'><br><br><br><br><br><br>";
                    exit('<h1>No existe ninguan fuerza operativa afianxada a la URL</h1>');
                    echo "</div>";
                }
                $pr->bind_result($fo_img_little,$fo_img_big,$fo_name,$fo_description,$fo_tag, $fo_url_w_a,$fo_url_b_b_f,$fo_url_m,$fo_id);
                //listamos todos los resultados
                while($pr->fetch()){
                    $Row=['name'=>$fo_name,'description'=>$fo_description,'fo_tag'=>$fo_tag,'fo_url_w_a'=>$fo_url_w_a,'fo_url_b_b_f'=>$fo_url_b_b_f,'fo_url_m'=>$fo_url_m,'fo_id'=>$fo_id];
                //Escribimos las imagenes de la BD
                //creamos un directorio
                $ruta=URL_PROJECT."/public/tmp/f_o/directori_".$fo_id;
                if(!file_exists($ruta)){
                    mkdir($ruta,0700);
                }
                //convert
                $img_big=stripslashes(base64_decode($fo_img_big));
                $img_little=stripslashes(base64_decode($fo_img_little));
                //imagen big
                $ruta=URL_PROJECT."/public/tmp/f_o/directori_".$Row['fo_id']."/fo_img_big.jpg";
                $this->base64_to_jpeg($img_big,$ruta);
                //imagen little
                $ruta=URL_PROJECT."/public/tmp/f_o/directori_".$Row['fo_id']."/fo_img_little.jpg";
                $this->base64_to_jpeg($img_little,$ruta);
                return $Row;
                }
                $pr->close();
            }else{
                exit('Error al realizar la consulta:'.$pr->close());
            }
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
    function select_user_leader($id_fo){   
        $pr=$this->conn->prepare("SELECT us_user, us_img_little FROM the_user WHERE fo_id = ? and us_rank = ?");
        $rank='leader';
        $pr->bind_param("is",$id_fo,$rank);
        if($pr->execute()){
            $pr->store_result();
            $pr->bind_result($leader_user,$img_user);
            if($pr->num_rows==0){		
                console('nonee');
            }
            //listamos todos los resultados
            while($pr->fetch()){
                //convert
                $img=stripslashes(base64_decode($img_user));
                //creamos la imagen
                $ruta=URL_PROJECT."/public/tmp/f_o/directori_".$id_fo."/leader_img.jpg";
                $this->base64_to_jpeg($img,$ruta);
                $Row=['user_leader'=>$leader_user];
                return $Row;
            }
            $pr->close();
        }else{
            exit('Error al realizar la consulta:'.$pr->close());
        }
    }
}
/* $crud = new CRUD(); */