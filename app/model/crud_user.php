<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/app/config/config.php');
require_once(URL_PROJECT.'/app/libs/console.php');
require_once(URL_PROJECT.'/app/model/connection.php');
/* -- */
class CRUD_U extends Connection{
    function __construct(){
        $this->connect();
    }
    function obtain_id(){
        $id=mysqli_insert_id($this->conn);
        console("Inser ID:".$id);
        $_SESSION['us_id']=$id;
        //crear un directorio
        mkdir(URL_PROJECT."/public/tmp/users/directori_".$id,0700);
    }
    function register_user(){
        //obtener la imagen
        $hash_pass= password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost'=> 10]);//encriptar
        $img_big=URL_PROJECT."/public/tmp/default/default_user_img_big.jpg";
        $image_big_bits=base64_encode(addslashes(fread(fopen($img_big,"r"),filesize($img_big))));

        $img_little=URL_PROJECT."/public/tmp/default/default_user_img_little.jpg";
        $image_little_bits=base64_encode(addslashes(fread(fopen($img_little,"r"),filesize($img_little))));
        //insert
        $pr=$this->conn->prepare("INSERT INTO`the_user`(`us_gmail`,`us_user`,`us_password`,`us_img_big`,`us_img_little`,`us_date_register`,`us_state`,`us_rank`,`us_point`,`us_participation`,`us_position`,`fo_id`)
        VALUES(?,?,?,'".$image_big_bits."','".$image_little_bits."',now(),'¡Hola! soy parte de la comunidad CIBB.','sin rango',0,0,00,null);");
        $gamail='Lucas@gmail.com';
        $user='Lucas';
        $pass='12345678';
        $pr->bind_param("sss",$_POST['gmail'],$_POST['user'],$hash_pass);
        if($pr->execute()){
            $this->obtain_id();
        }else{
            exit('Error al realizar la consulta:'.$pr->close());
        }
    }
    function validate_gmail(){
        if(isset($_POST['gmail'])){
            $pr=$this->conn->prepare("SELECT us_gmail FROM the_user WHERE us_gmail=?;");
            $this->gmail=$_POST['gmail'];
            $pr->bind_param("s",$this->gmail);
            if($pr->execute()){
                //Alamacenaos los datos de la consulta
                $pr->store_result();
                if($pr->num_rows==0)return'true';
                else return'error';
            }
        }
    }
    function crud_select_pass(){
        $pr=$this->conn->prepare("SELECT `us_password`FROM `the_user` WHERE us_user=?;");
        $pr->bind_param("s",$_POST['user']);
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
    function login_user(){
        $pr=$this->conn->prepare("SELECT us_id, fo_id FROM the_user WHERE us_user=?");
        $pr->bind_param("s",$_POST['user']);
        if($pr->execute()){
            $pr->store_result();
            if($pr->num_rows==0){		
                echo "La contraseña o el usuario es incorrecto";
            }
            $pr->bind_result($us_id,$fo_id);
            //listamos todos los resultados
	        while($pr->fetch()){
                //crear un directorio
                $ruta=URL_PROJECT."/public/tmp/users/directori_".$us_id;
                if(!file_exists($ruta)){
                    mkdir($ruta,0700);
                }
                //creamos la cookie
                /* setcookie('id_user',$us_id,strtotime('+360 days'),'/');
                setcookie('user_id_fo',$fo_id,strtotime('+360 days'),'/'); */
                if($fo_id == null)$fo_id = 'null';
                echo"
                <script>
                var cname_1='id_user';
                var cname_2='user_id_fo';
                var exdays=360;
                var cvalue_1=".$us_id.";
                var cvalue_2=".$fo_id.";
                var d = new Date();
                d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
                var expires = 'expires=' + d.toUTCString();
                document.cookie = cname_1 + '=' + cvalue_1 + ';' + expires +'; path=/';
                document.cookie = cname_2 + '=' + cvalue_2 + ';' + expires +'; path=/';
                </script>
                ";
                echo "<script> location.href='/'; </script>";
            }
            $pr->close();
        }else{
            exit('Error al realizar la consulta:'.$pr->close());
        }
    }
    function select_data_user(){
        $pr=$this->conn->prepare("SELECT us_user,us_img_big,us_img_little,us_state,us_rank,us_point,us_participation,us_position,fo_id FROM the_user WHERE us_id=?");
        $pr->bind_param("i",$_COOKIE['id_user']);
        if($pr->execute()){
            $pr->store_result();
            $pr->bind_result($us_user,$img_big,$us_img_little,$us_state,$us_rank,$us_point,$us_participation,$us_position,$fo_id);
            //listamos todos los resultados
	        while($pr->fetch()){
               $image_big=stripslashes(base64_decode($img_big));
               $image_little=stripslashes(base64_decode($us_img_little));
               //echo($imagen);
               $ruta_big=URL_PROJECT."/public/tmp/users/directori_".$_COOKIE['id_user']."/img_perfil_big.jpg";
               $this->base64_to_jpeg($image_big,$ruta_big);
               $ruta_little=URL_PROJECT."/public/tmp/users/directori_".$_COOKIE['id_user']."/img_perfil_little.jpg";
               $this->base64_to_jpeg($image_little,$ruta_little);
               //guardar en una cookie la id de la fo para validarlo
               if($fo_id==null)$fo_id='none';
               setcookie('user_id_fo',$fo_id,strtotime('+360 days'),'/');
               //retornar data
               return$data=['name_user'=>$us_user,'state'=>$us_state,'rank'=>$us_rank,'point'=>$us_point,'participation'=>$us_participation,'position'=>$us_position,'fo_id'=>$fo_id];
            }
            $pr->close();
        }else{
            exit('Error al realizar la consulta:'.$pr->close());
        }
    }
    function crud_select_name_user(){
        $pr=$this->conn->prepare("SELECT us_user FROM the_user WHERE us_id=?");
        $id_user=(isset($_COOKIE['id_user']))?$_COOKIE['id_user']:0;
        $pr->bind_param("i",$id_user);
        if($pr->execute()){
            $pr->store_result();
            $pr->bind_result($us_user);
            while($pr->fetch()){
                return $us_user;
            }
        }else{
            exit('Error al realizar la consulta:'.$pr->close());
        }
    }
    function base64_to_jpeg($base64_string,$output_file){
        $ifp=fopen($output_file,"wb");
        fwrite($ifp,$base64_string);
        fclose($ifp); 
    }
    function verificate_f_o_of_user(){
        $pr = $this->conn->prepare("SELECT fo_id FROM the_user WHERE us_id = ?");
        $pr->bind_param("i",$_COOKIE['id_user']);
        if($pr->execute()){
            $pr->store_result();
            $pr->bind_result($fo_id);
            //listamos todos los resultados
	        while($pr->fetch()){
                if(isset($fo_id))return$fo_id;
                else return false;
            }
            $pr->close();
        }else{
            exit('Error al realizar la consulta:'.$pr->close());
        }  
    }
    function user_f_o($id_fo){
        $pr=$this->conn->prepare("SELECT fo_code, fo_img_little FROM f_o WHERE fo_id = ?");
        $pr->bind_param("i",$id_fo);
        if($pr->execute()){
            $pr->store_result();
            $pr->bind_result($fo_code,$fo_img_little);
            //listamos todos los resultados
	        while($pr->fetch()){
                //convert
                $fo_img=stripslashes(base64_decode($fo_img_little));
                //imagen big
                $ruta=URL_PROJECT."/public/tmp/users/directori_".$_COOKIE['id_user']."/my_f_o_img_little.jpg";
                $this->base64_to_jpeg($fo_img,$ruta);
                return$fo_code;
            }
            $pr->close();
        }else{
            exit('Error al realizar la consulta:'.$pr->close());
        }
    }
}
