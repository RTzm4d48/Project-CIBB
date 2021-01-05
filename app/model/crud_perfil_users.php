<?php
require_once ($_SERVER['DOCUMENT_ROOT']. '/app/config/config.php');
require_once (URL_PROJECT.'/app/libs/console.php');
require_once (URL_PROJECT.'/app/model/connection.php');
/* -- */
class CRUD_PERFIL_USERS extends Connection{

    function __construct(){
        $this->connect();
    }
    function crud_select_peril_user($id_user){
        $pr=$this->conn->prepare("SELECT us_user,us_img_big,us_state,us_rank,us_point,us_participation,us_premium FROM the_user WHERE us_id=?");
        $pr->bind_param("i",$id_user);
        if($pr->execute()){
            $pr->store_result();
            $pr->bind_result($us_user,$us_img_big,$us_state,$us_rank,$us_point,$us_participation,$us_premium);
            //crear la carpeta
            $ruta=URL_PROJECT."/public/tmp/all_img_users/big_img_users";
            if(!file_exists($ruta)){
                mkdir($ruta,0700);
            }
            //listamos todos los resultados
	        while($pr->fetch()){
               $image_big=stripslashes(base64_decode($us_img_big));
               //echo($imagen);  
               $ruta_big=URL_PROJECT."/public/tmp/all_img_users/big_img_users/big_user_".$id_user."_img.jpg";
               $this->base64_to_jpeg($image_big,$ruta_big);

               return$data=['id_user'=>$id_user,'name_user'=>$us_user,'state'=>$us_state,'rank'=>$us_rank,'point'=>$us_point,'participation'=>$us_participation,'its_premium'=>$us_premium];
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
?>