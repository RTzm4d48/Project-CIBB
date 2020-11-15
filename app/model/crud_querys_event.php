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
        $i_day=12;
        $i_month=11;
        $i_year=2020;
        $pr->bind_param("ssiiiiiiiii",$data['obj'],$data['desc'],$data['rank'],$i_day,$i_month,$i_year,$data['day'],$data['month'],$data['year'],$_COOKIE['id_user'],$_COOKIE['user_id_fo']);
        if($pr->execute()){
            return true;
        }else{
            //exit('Error al realizar la consulta: '.$pr->close());
            return false;
        } 
    }
}
?>