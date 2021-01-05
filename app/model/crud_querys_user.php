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
    function crud_valid_fo_user(){
        $pr=$this->conn->prepare("SELECT fo_id FROM the_user WHERE us_id=?");
        $pr->bind_param("i",$_COOKIE['id_user']);
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
    function crud_join_to_fo(){
        $pr=$this->conn->prepare("UPDATE `the_user` SET `us_rank`=?,`fo_id`=? WHERE us_id=?");
        $rack='Oficial';
        $pr->bind_param("sii",$rack,$_SESSION['fo_id'],$_COOKIE['id_user']);
        if($pr->execute()){
            //cookie fo
            
            echo"<script>
            var cname='user_id_fo';
            var exdays=360;
            var cvalue=".$_SESSION['fo_id'].";
            var d = new Date();
            d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
            var expires = 'expires=' + d.toUTCString();
            document.cookie = cname + '=' + cvalue + ';' + expires +'; path=/';
                        </script>";
            $pr->close();
            return true;
        }else{
            $pr->close();
            return false;
        }
        }
    function crud_valid_leader(){
        $pr=$this->conn->prepare("SELECT us_rank FROM the_user WHERE us_id=?");
        $pr->bind_param("i",$_COOKIE['id_user']);
        if($pr->execute()){
            $pr->store_result();
            $pr->bind_result($us_rank);
            //listamos todos los resultados
	        while($pr->fetch()){
              return $us_rank;
            }
            $pr->close();
        }else{
            exit('Error al realizar la consulta:'.$pr->close());
        }
    }
    function crud_validate_empty_fo(){
        $pr=$this->conn->prepare("SELECT us_user FROM the_user WHERE fo_id=?");
        $pr->bind_param("i",$_COOKIE['user_id_fo']);
        if($pr->execute()){
            $pr->store_result();
            /* if($pr->num_rows>=2)return false;
            else return true; */
            return $pr->num_rows();
            $pr->close();
        }else{
            exit('Error al realizar la consulta:'.$pr->close());
        }
    }
    function crud_select_user_ranking(){
        $pr=$this->conn->prepare("SELECT `us_user`,`us_img_little`,`us_point`,`us_participation`,`us_premium`FROM `the_user` WHERE fo_id=? ORDER BY us_point DESC LIMIT 5");
        $pr->bind_param("i",$_COOKIE['user_id_fo']);
        if($pr->execute()){
            $pr->store_result();    
            $row=$pr->num_rows();
            $pr->bind_result($us_user,$us_img_little,$us_point,$us_participation,$us_premium);
            $name=[];
            $point=[];
            $participation=[];
            $premium=[];
            $data=[];
            $ruta=URL_PROJECT."/public/tmp/users/directori_".$_COOKIE['id_user']."/ranking";
            if(!file_exists($ruta)) {
                mkdir($ruta,0700);
            }
            $i=0;
	        while($pr->fetch()){
                $i++;
                array_push($name,$us_user);
                array_push($point,$us_point);
                array_push($participation,$us_participation);
                array_push($premium,$us_premium);
                //escribimos la imagen
                $img=stripslashes(base64_decode($us_img_little));
                $ruta=URL_PROJECT."/public/tmp/users/directori_".$_COOKIE['id_user']."/ranking/top_".$i."_img_user.jpg";
                $this->base64_to_jpeg($img,$ruta);
            }
            array_push($data,$name,$point,$participation,$row,$premium);
            $pr->close();
            return$data;
        }else{
            exit('Error al realizar la consulta:'.$pr->close());
        }
    }
    function crud_valid_pass(){
        $pr=$this->conn->prepare("SELECT `us_password`FROM `the_user` WHERE us_id=".$_COOKIE['id_user'].";");
        if($pr->execute()){
            $pr->store_result();
            if($pr->num_rows==0)return false;
            else{
                $pr->bind_result($pass);
                while($pr->fetch()){
                    $pr->close();return $pass;
                }
            }
        }else{
            exit('Error al realizar la consulta:'.$pr->close());
        }
    }
    function crud_change_pass($new_pass){
        $hash= password_hash($new_pass, PASSWORD_DEFAULT, ['cost'=> 10]);//encriptar
        $pr=$this->conn->prepare("UPDATE `the_user` SET `us_password`=? WHERE us_id=?");
        $pr->bind_param("si",$hash,$_COOKIE['id_user']);
        if($pr->execute()){
            $pr->close();
            return true;
        }else{
            $pr->close();
            return false;
        }
    }
}