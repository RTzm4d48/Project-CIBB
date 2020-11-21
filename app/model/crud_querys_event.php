<?php
require_once ($_SERVER['DOCUMENT_ROOT']. '/app/config/config.php');
require_once (URL_PROJECT.'/app/libs/console.php');
require_once (URL_PROJECT.'/app/model/connection.php');
/* -- */
class CRUD_QUERYS_EVENT extends Connection{

    function __construct(){
        $this->connect();
    }
    function crud_create_event($data){
        //insert
        $pr = $this->conn->prepare("INSERT INTO `the_event`(`evt_objetive`, `evt_description`, `evt_rango`, `evt_day_i`, `evt_month_i`, `evt_year_i`, `evt_day_f`, `evt_month_f`, `evt_year_f`, `evt_id_creator`, `evt_num_participants`, `evt_top_1`, `evt_top_2`, `evt_top_3`, `evt_operating`, `fo_id`)
        VALUES (?,?,?,?,?,?,?,?,?,?,0,NULL,NULL,NULL,'yes',?);");
        $i_day=date("j");
        $i_month=date("n");
        $i_year=date("Y");
        $pr->bind_param("ssiiiiiiiii",$data['obj'],$data['desc'],$data['rank'],$i_day,$i_month,$i_year,$data['day'],$data['month'],$data['year'],$_COOKIE['id_user'],$_COOKIE['user_id_fo']);
        if($pr->execute()){
            return true;
        }else{
            //exit('Error al realizar la consulta: '.$pr->close());
            return false;
        }
    }
    function crud_consult_exist_event(){
        $pr = $this->conn->prepare("SELECT `evt_id`,`evt_objetive`,`evt_description`,`evt_rango`,`evt_day_f`,`evt_month_f`,`evt_year_f`,`evt_id_creator`,`evt_num_participants`,`fo_id`,`evt_day_i`, `evt_month_i`, `evt_year_i`
        FROM`the_event`WHERE fo_id=? and evt_operating='yes' ORDER BY evt_id DESC LIMIT 1;");
        $pr->bind_param("i",$_COOKIE['user_id_fo']);
        //Ejecutamos la consulta
        if($pr->execute()){
            //Alamacenaos los datos de la consulta
            $pr->store_result();
            if($pr->num_rows==0){
                return false;
            }else{
                //Indicamos la variable donde se guardaran los resultados
                $pr->bind_result($evt_id,$evt_objetive,$evt_description,$evt_rango,$evt_day_f,$evt_month_f,$year_f,$evt_id_creador,$evt_num_participants,$fo_id,$evt_day_i,$evt_month_i,$evt_year_i);
                //listamos todos los resultados
                while($pr->fetch()){
                    $data=[$evt_id,$evt_objetive,$evt_description,$evt_rango,$evt_day_f,$evt_month_f,$year_f,$evt_id_creador,$evt_num_participants,$fo_id,$evt_day_i,$evt_month_i,$evt_year_i];
                }
                return $data;
            }
            //Cerramos la conexion
            $pr->close();
        } else {
            exit('Error al realizar la consulta: '.$pr->close());
        }
    }
    function deleted_participantion_user($id_event){
        $pr=$this->conn->prepare("DELETE FROM `participants_event` WHERE evt_id=$id_event;");
        if($pr->execute()){
            return true;
        }else{
            return false;
        } 
    }
    function crud_deleted_event($id_event){
        //update
        $pr=$this->conn->prepare("UPDATE `the_event` SET `evt_operating`='not' WHERE evt_id = $id_event;");
        if($pr->execute()){
            return true;
        }else{
            return false;
        } 
    }
    function validate_joind_event(){   
        $pr=$this->conn->prepare("SELECT `pe_id`,`us_id` FROM `participants_event` WHERE us_id=".$_COOKIE['id_user']." and fo_id=".$_COOKIE['user_id_fo'].";");
        $pr->execute();
        $pr->store_result();
        if($pr->num_rows==0)return false;
        else return true;
    }
    function crud_select_participants($id_evt){
        $pr=$this->conn->prepare("SELECT `us_id`,`pe_user_name` FROM `participants_event` WHERE fo_id=".$_COOKIE['user_id_fo']." and evt_id=".$id_evt.";");
        $pr->execute();
        $pr->store_result();
        $user_id=[];
        $user=[];
        $data=[];
        $Row=$pr->num_rows();
        $pr->bind_result($us_id,$name_us);
        //listamos todos los resultados
        while($pr->fetch()){array_push($user_id,$us_id);array_push($user,$name_us);}
        array_push($data,$Row,$user_id,$user);
        return$data;
    }
    function crud_select_name_user(){
        $pr=$this->conn->prepare("SELECT`us_user`FROM `the_user` WHERE us_id=".$_COOKIE['id_user'].";");
        $pr->execute();
        $pr->store_result();
        $pr->bind_result($name);
        //listamos todos los resultados
        while($pr->fetch()){return$name;}
    }

    function crud_joind_event($id_evt,$name){
        //insert
        $pr=$this->conn->prepare("INSERT INTO `participants_event`(`us_id`,`fo_id`,`evt_id`,`pe_user_name`) VALUES (".$_COOKIE['id_user'].",".$_COOKIE['user_id_fo'].",".$id_evt.",?);");
        $pr->bind_param("s",$name);
        if($pr->execute()){
            return true;
        }else{
            return false;
        }
    }
    function crud_position_participants($top_1,$top_2,$top_3,$id_evt){
        $pr=$this->conn->prepare("UPDATE `the_event` SET `evt_top_1`=?,`evt_top_2`=?,`evt_top_3`=?,`evt_operating`='not' WHERE evt_id = ?;");
        $pr->bind_param("sssi",$top_1,$top_2,$top_3,$id_evt);
        if($pr->execute()){
            return true;
        }else{
            return false;
        }
    }
    function crud_obtain_points_user($id_user){
        $pr=$this->conn->prepare("SELECT us_point FROM the_user WHERE us_id=$id_user;");
        $pr->execute();
        $pr->store_result();
        $pr->bind_result($point);
        //listamos todos los resultados
        while($pr->fetch()){return$point;}
    }
    function crud_add_point_users($points,$id_user){
        $pr=$this->conn->prepare("UPDATE `the_user` SET `us_point`=? WHERE us_id=?");
        $pr->bind_param("ii",$points,$id_user);
        if($pr->execute()){
            return true;
        }else{
            return false;
        }
    }
    function crud_obtain_id_event(){
        $pr=$this->conn->prepare("SELECT `evt_id` FROM `participants_event` WHERE us_id=".$_COOKIE['id_user'].";");
        $pr->execute();
        $pr->store_result();
        $pr->bind_result($evt_id);
        //listamos todos los resultados
        while($pr->fetch()){return$evt_id;}
    }
    function crud_obtain_winers($evt_id){
        $pr = $this->conn->prepare("SELECT `evt_top_1`,`evt_top_2`,`evt_top_3`,`evt_rango`
        FROM`the_event`WHERE evt_id=? ORDER BY evt_id DESC LIMIT 1;");
        $pr->bind_param("i",$evt_id);
        //Ejecutamos la consulta
        if($pr->execute()){
            //Alamacenaos los datos de la consulta
            $pr->store_result();
                //Indicamos la variable donde se guardaran los resultados
                $pr->bind_result($evt_top_1,$evt_top_2,$evt_top_3,$evt_rango);
                //listamos todos los resultados
                while($pr->fetch()){
                    $data=[$evt_top_1,$evt_top_2,$evt_top_3,$evt_rango];
                }
                return $data;
            //Cerramos la conexion
            $pr->close();
        } else {
            exit('Error al realizar la consulta: '.$pr->close());
        }
    }
    function crud_close_event(){
        $pr=$this->conn->prepare("DELETE FROM `participants_event` WHERE us_id=?");
        $pr->bind_param("i",$_COOKIE['id_user']);
        if($pr->execute()){
            return true;
        }else{
            return false;
        }
    }
    function crud_obtain_num_participation(){
        $pr=$this->conn->prepare("SELECT `us_participation` FROM `the_user` WHERE us_id=".$_COOKIE['id_user'].";");
        $pr->execute();
        $pr->store_result();
        $pr->bind_result($us_participation);
        //listamos todos los resultados
        while($pr->fetch()){return$us_participation;}
    }
    function crud_participation_plus($num_participation){
        $pr=$this->conn->prepare("UPDATE`the_user`SET`us_participation`=$num_participation WHERE us_id=".$_COOKIE['id_user'].";");
        if($pr->execute()){
            return true;
        }else{
            return false;
        }
    }
}
?>