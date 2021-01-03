<?php
require_once(URL_PROJECT.'/app/model/crud.php');
class VALIDATIONS{
    public function val_insert_fo(){
        $day = date("d")+3;
        $month = date("m");
        if(28 >= $day || 8 != $month){
            require_once($_SERVER['DOCUMENT_ROOT'].'/app/model/crud.php');
            $ex = new CRUD();
            if($_FILES['image']['type'] == 'image/jpeg' || $_FILES['image']['type'] == 'image/png' || $_FILES['image']['type'] == ''){
                //$ex -> insert_fo();
                $this->val_insert_fo_2();
            }else{
                include URL_PROJECT."/public/views/pages/pages-page_base/create-fo/data-form.php";
                echo "<script>document.getElementById('alert').innerHTML='Extencion de imagen no soportada';</script>";
            }
        }else{
            include URL_PROJECT."/public/views/pages/pages-page_base/create-fo/data-form.php";
                echo "<script>document.getElementById('alert').innerHTML='Tienes que esperar 3 dias desde la ultima ves que creaste una F_O';</script>";
        }
    }
    function val_insert_rules(){
        $day = date("d")+3;
        $month = date("m");
        if(24 >= $day || 8 != $month){
            require_once(URL_PROJECT.'/app/model/crud.php');
            $ex = new CRUD();
            $ex -> insert_fo();
            $ex -> insert_rules();
            $ex -> select_code();
            $ex -> rank_user_leader();
            include URL_PROJECT."/public/views/pages/pages-page_base/create-fo/loading_creation_fo.php";
        }else{
            include URL_PROJECT."/public/views/pages/pages-page_base/create-fo/rules-fo.php";
            echo "<script>console.log('espera');</script>";
            echo "<script>document.getElementById('alert').innerHTML='Tienes que esperar 3 dias desde la ultima ves que creaste una F_O';</script>";
        }
    }
    static function val_select_datos_fo(){
        $ex=new CRUD();
        $Row=$ex->select_datos_fo($_GET['C']);
        $lol=$ex->select_datos_fo_photo($_GET['C']);
        $User_leader=$ex->select_user_leader($Row['fo_id']);
        array_push($Row, $User_leader);
        return $Row;
    }
    static function val_select_datos_fo_settings(){
        $ex=new CRUD();
        $code=$ex->crud_obtain_code_fo();
        $Row=$ex->select_datos_fo($code);
        /* echo'<pre>';
        print_r($Row);
        echo'</pre>'; */
        return $Row;
    }
    public static function prueba(){  
        return URL_PROJECT.'/app/controller/test.php';
    }
    static function ctr_obtaiin_color(){
        $ex=new CRUD();
        $fo_id=$ex->crud_obtain_id_fo();
        $data_color=$ex->crud_obtain_color($fo_id);
        return $data_color;
    }
    static function ctr_obtain_code_my_fo(){
        $ex=new CRUD();
        $rpt=$ex->crud_obtain_code_my_fo();
        if($rpt=='')return false;
        else{
            if($rpt == $_GET['C'])return true;
            else return false;
        }
    }
    static function ctr_valid_premium_fo(){
        $ex=new CRUD();
        $rpt=$ex->crud_valid_premium_fo();
        if($rpt=='')return false;
        else return true;
    }
}
?>