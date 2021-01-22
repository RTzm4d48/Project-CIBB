<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/app/config/config.php');
require_once(URL_PROJECT.'/app/libs/console.php');
require_once(URL_PROJECT.'/app/model/connection.php');
/* -- */
class CRUD_QUERYS_CODE_VALIDATIONS extends Connection{
    function __construct(){
        $this->connect();
    }
    /* function obtain_id(){
        $id = mysqli_insert_id($this->conn);
        setcookie('id_code',$id,strtotime('+360 days'),'/');
    } */
    function crud_code_accound_valid($gmail,$code){
        //insert
        $pr=$this->conn->prepare("INSERT INTO `pending_codes` (`pc_gmail`, `pc_code`)VALUES(?,?)");
        $pr->bind_param("ss",$gmail,$code);
        if($pr->execute()){
            /* $this->obtain_id(); */
            return'execute finished';
        }else{
            exit('Error al realizar la consulta:'.$pr->close());
        }
    }
    function crud_code_comparison($gmail,$code){
        $pr=$this->conn->prepare("SELECT `pc_id` FROM `pending_codes` WHERE pc_gmail = ? and pc_code=?;");
        $pr->bind_param("ss",$gmail,$code);
        if($pr->execute()){
            $pr->store_result();
            if($pr->num_rows==0)return false;
            else return true;
        }else{
            exit('Error al realizar la consulta:'.$pr->close());
        }
    }
    function crud_deleted_code($gmail){
        //deleted
        $pr=$this->conn->prepare("DELETE FROM `pending_codes` WHERE pc_gmail=?");
        $pr->bind_param("s",$gmail);
        if($pr->execute()){
            return true;
        }else{
            return false;
        }
    }
    function crud_active_accound($gmail){
        //update
        $pr=$this->conn->prepare("UPDATE `the_user` SET `us_accound_active`='yes' WHERE us_gmail=? and us_id=?;");
        $pr->bind_param("si",$gmail,$_COOKIE['id_user']);
        if($pr->execute()){
            /* $this->obtain_id(); */
            return'update finished';
        }else{
            exit('Error al realizar la consulta:'.$pr->close());
        }
    }
    function crud_compare_gmail($gmail){
        $pr=$this->conn->prepare("SELECT `us_id`FROM `the_user` WHERE us_gmail=?;");
        $pr->bind_param("s",$gmail);
        if($pr->execute()){
            $pr->store_result();
            if($pr->num_rows==0)return false;
            else{
                $pr->bind_result($us_id);
                //listamos todos los resultados
                while($pr->fetch()){
                return $us_id;
                }
                $pr->close();
            }
        }else{
            exit('Error al realizar la consulta:'.$pr->close());
        }
    }
    function crud_code_chanelpass_code($gmail,$code){
        //insert
        $pr=$this->conn->prepare("INSERT INTO `pending_codes` (`pc_gmail`, `pc_code`)VALUES(?,?)");
        $pr->bind_param("ss",$gmail,$code);
        if($pr->execute()){
            /* $this->obtain_id(); */
            return'execute finished';
        }else{
            exit('Error al realizar la consulta:'.$pr->close());
        }
    }
    function crud_equals_gmail($gmail){
        $pr=$this->conn->prepare("SELECT `pc_id` FROM `pending_codes` WHERE pc_gmail = ?;");
        $pr->bind_param("s",$gmail);
        if($pr->execute()){
            $pr->store_result();
            if($pr->num_rows==0)return false;
            else return true;
        }else{
            exit('Error al realizar la consulta:'.$pr->close());
        }
    }
    function crud_update_code($gmail,$code){
        //update
        $pr=$this->conn->prepare("UPDATE `pending_codes` SET `pc_code`=? WHERE pc_gmail=?;");
        $pr->bind_param("ss",$code,$gmail);
        if($pr->execute()){
            /* $this->obtain_id(); */
            return'update finished';
        }else{
            exit('Error al realizar la consulta:'.$pr->close());
        }
    }
    function crud_chanel_password($id,$pass){
        $hash= password_hash($pass, PASSWORD_DEFAULT, ['cost'=> 10]);//encriptar

        $pr=$this->conn->prepare("UPDATE `the_user` SET `us_password`=? WHERE us_id=?");
        $pr->bind_param("si",$hash,$id);
        if($pr->execute()){
            $pr->close();
            return true;
        }else{
            $pr->close();
            return false;
        }
    }
    function crud_valid_code_pass($us_id){
        $pr=$this->conn->prepare("SELECT `pcp_gmail` FROM `pending_codes_pass` WHERE pcp_us_id=?;");
        $pr->bind_param("i",$us_id);
        if($pr->execute()){
            $pr->store_result();
            if($pr->num_rows==0)return false;
            else return true;
        }else{
            exit('Error al realizar la consulta:'.$pr->close());
        }
    }
    function crud_deleted_code_pass($us_id){
        //deleted
        $pr=$this->conn->prepare("DELETE FROM `pending_codes_pass` WHERE pcp_us_id=?");
        $pr->bind_param("s",$us_id);
        if($pr->execute()){
            return true;
        }else{
            return false;
        }
    }
    function crud_equals_id_pass($us_id){
        $pr=$this->conn->prepare("SELECT `pcp_us_id` FROM `pending_codes_pass` WHERE pcp_us_id = ?;");
        $pr->bind_param("i",$us_id);
        if($pr->execute()){
            $pr->store_result();
            if($pr->num_rows==0)return false;
            else return true;
        }else{
            exit('Error al realizar la consulta:'.$pr->close());
        }
    }
    function crud_code_chanelpass_code_pass($gmail,$us_id){
        //insert
        $pr=$this->conn->prepare("INSERT INTO `pending_codes_pass` (`pcp_gmail`, `pcp_us_id`)VALUES(?,?)");
        $pr->bind_param("si",$gmail,$us_id);
        if($pr->execute()){
            /* $this->obtain_id(); */
            return'execute finished';
        }else{
            exit('Error al realizar la consulta:'.$pr->close());
        }
    }
}
?>