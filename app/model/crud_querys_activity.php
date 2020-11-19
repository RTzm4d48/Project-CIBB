<?php
require_once ($_SERVER['DOCUMENT_ROOT']. '/app/config/config.php');
require_once (URL_PROJECT.'/app/libs/console.php');
require_once (URL_PROJECT.'/app/model/connection.php');
/* -- */
class CRUD_QUERYS_ACTIVITY extends Connection{

    function __construct(){
        $this->connect();
    }
    function crud_obtain_num_participation(){
        $pr=$this->conn->prepare("SELECT `act_participations` FROM `activity` WHERE `fo_id`=".$_COOKIE['user_id_fo']." AND `act_month`=MONTH(NOW());");
        $pr->execute();
        $pr->store_result();
        $pr->bind_result($num);
        //listamos todos los resultados
        while($pr->fetch()){return$num;}
    }
    function crud_act_participation($num){
        $pr=$this->conn->prepare("UPDATE`activity`SET`act_participations`=$num WHERE `fo_id`=".$_COOKIE['user_id_fo']." AND `act_month`=MONTH(NOW());");
        if($pr->execute()){
            return true;
        }else{
            return false;
        }
    }
    function crud_obtain_num_assistance(){
        $pr=$this->conn->prepare("SELECT `act_assistance` FROM `activity` WHERE `fo_id`=".$_COOKIE['user_id_fo']." AND `act_month`=MONTH(NOW());");
        $pr->execute();
        $pr->store_result();
        $pr->bind_result($num);
        //listamos todos los resultados
        while($pr->fetch()){return$num;}
    }
    function crud_act_assistance($num){
        $pr=$this->conn->prepare("UPDATE`activity`SET`act_assistance`=$num WHERE `fo_id`=".$_COOKIE['user_id_fo']." AND `act_month`=MONTH(NOW());");
        if($pr->execute()){
            return true;
        }else{
            return false;
        }
    }
    function crud_obtain_num_activities(){
        $pr=$this->conn->prepare("SELECT `act_activities` FROM `activity` WHERE `fo_id`=".$_COOKIE['user_id_fo']." AND `act_month`=MONTH(NOW());");
        $pr->execute();
        $pr->store_result();
        $pr->bind_result($num);
        //listamos todos los resultados
        while($pr->fetch()){return$num;}
    }
    function crud_act_activities($num){
        $pr=$this->conn->prepare("UPDATE`activity`SET`act_activities`=$num WHERE `fo_id`=".$_COOKIE['user_id_fo']." AND `act_month`=MONTH(NOW());");
        if($pr->execute()){
            return true;
        }else{
            return false;
        }
    }
    function crud_obtain_id_fo($fo_code){
        $pr=$this->conn->prepare("SELECT fo_id FROM `f_o` WHERE fo_code='".$fo_code."';");
        $pr->execute();
        $pr->store_result();
        $pr->bind_result($fo_id);
        //listamos todos los resultados
        while($pr->fetch()){return$fo_id;}
    }
    function crud_data_graphics($fo_id){
        $pr=$this->conn->prepare("SELECT `act_id`,`fo_id`,`act_assistance`,`act_activities`,`act_participations`,`act_month`
        FROM `activity` WHERE fo_id=".$fo_id.";");
        //Ejecutamos la consulta
        if($pr->execute()){
            //Alamacenaos los datos de la consulta
            $pr->store_result();
            if($pr->num_rows==0){		
                return false;
            }else{
                //Indicamos la variable donde se guardaran los resultados
                $pr->bind_result($act_id,$fo_id,$act_assistance,$act_activities,$act_participations,$act_month);
                //listamos todos los resultados
                $all_data=[];

                $data_month_01=[];
                $data_month_02=[];
                $data_month_03=[];
                $data_month_04=[];
                $data_month_05=[];
                $data_month_06=[];
                $i=0;
                while($pr->fetch()){
                    $i++;
                    if($i==1)array_push($data_month_01,$act_id,$fo_id,$act_assistance,$act_activities,$act_participations,$act_month);
                    if($i==2)array_push($data_month_02,$act_id,$fo_id,$act_assistance,$act_activities,$act_participations,$act_month);
                    if($i==3)array_push($data_month_03,$act_id,$fo_id,$act_assistance,$act_activities,$act_participations,$act_month);

                    if($i==4)array_push($data_month_04,$act_id,$fo_id,$act_assistance,$act_activities,$act_participations,$act_month);
                    if($i==5)array_push($data_month_05,$act_id,$fo_id,$act_assistance,$act_activities,$act_participations,$act_month);
                    if($i==6)array_push($data_month_06,$act_id,$fo_id,$act_assistance,$act_activities,$act_participations,$act_month);
                }
                $all_data=[$data_month_01[5]=>$data_month_01,
                $data_month_02[5]=>$data_month_02,
                $data_month_03[5]=>$data_month_03,
                $data_month_04[5]=>$data_month_04,
                $data_month_05[5]=>$data_month_05,
                $data_month_06[5]=>$data_month_06];
                return $all_data;
            }
            //Cerramos la conexion
            $pr->close();
        } else {
            exit('Error al realizar la consulta: '.$pr->close());
        }
    }
}
?>