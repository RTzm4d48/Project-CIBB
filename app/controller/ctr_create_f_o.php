<?php
require_once(URL_PROJECT.'/app/model/crud_create_f_o.php');

class CTR_CREATE_F_O{
    
    public function val_insert_fo(){
        $day = date("d")+3;
        $month = date("m");
        if(28 >= $day || 8 != $month){
            $ex = new CRUD_CREATE_F_O();
            if($_FILES['image']['type'] == 'image/jpeg' || $_FILES['image']['type'] == 'image/png' || $_FILES['image']['type'] == ''){
                if($ex->insert_fo()){
                    include URL_PROJECT."/public/views/pages/pages-page_base/create-fo/loading_creation_fo.php";
                }else{
                    include URL_PROJECT."/public/views/pages/pages-page_base/create-fo/data-form.php";
                echo "<script>document.getElementById('alert').innerHTML='Ocurrio un error';</script>";
                }
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
        $ex = new CRUD();
        $Row = $ex->select_datos_fo();
        $User_leader = $ex->select_user_leader($Row['fo_id']);
        array_push($Row, $User_leader);
        return $Row;
    }
    public static function prueba(){  
        return URL_PROJECT.'/app/controller/test.php';
    }
}
?>