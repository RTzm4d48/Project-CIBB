<?php
require_once($_SERVER['DOCUMENT_ROOT'].'/app/config/config.php');
require_once(URL_PROJECT.'/app/libs/console.php');
require_once(URL_PROJECT.'/app/model/connection.php');
/* -- */
class CRUD_QUERYS_CODE_VALIDATIONS extends Connection{
    function __construct(){
        $this->connect();
    }
    function obtain_id(){
        $id = mysqli_insert_id($this->conn);
        setcookie('id_code',$id,strtotime('+360 days'),'/');
    }
    function crud_code_accound_valid($gmail,$code){
        //insert
        $pr=$this->conn->prepare("INSERT INTO `pending_codes` (`pc_gmail`, `pc_code`)VALUES(?,?)");
        $pr->bind_param("ss",$gmail,$code);
        if($pr->execute()){
            $this->obtain_id();
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
            $pr->bind_result($pc_id);
            //listamos todos los resultados
            while($pr->fetch()){
            return $pc_id;
            }
            $pr->close();
        }else{
            exit('Error al realizar la consulta:'.$pr->close());
        }
    }
    function crud_deleted_code(){
        //eliminar el registro del codigo
    }
    function crud_compare_gmail($gmail){
        $pr=$this->conn->prepare("SELECT `us_user`FROM `the_user` WHERE us_gmail=?;");
        $pr->bind_param("s",$gmail);
        if($pr->execute()){
            $pr->store_result();
            if($pr->num_rows==0)return false;
            else return true;
        }else{
            exit('Error al realizar la consulta:'.$pr->close());
        }
    }
    function crud_code_chanelpass_code($gmail,$code){
        //insert
        $pr=$this->conn->prepare("INSERT INTO `pending_codes` (`pc_gmail`, `pc_code`)VALUES(?,?)");
        $pr->bind_param("ss",$gmail,$code);
        if($pr->execute()){
            $this->obtain_id();
            return'execute finished';
        }else{
            exit('Error al realizar la consulta:'.$pr->close());
        }
    }
    function crud_select_gmail(){
        $pr=$this->conn->prepare("SELECT `pc_gmail`FROM `pending_codes` WHERE pc_id=".$_COOKIE['id_code'].";");
        if($pr->execute()){
            $pr->store_result();
                $pr->bind_result($pc_gmail);
                while($pr->fetch()){
                    $pr->close();return $pc_gmail;
                }
        }else{
            exit('Error al realizar la consulta:'.$pr->close());
        }   
    }
}
?>