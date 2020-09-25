<?php
class VALIDATIONS{

    function val_insert_fo(){
        $day = date("d")+3;
        $month = date("m");

        if(24 >= $day || 8 != $month){
            require_once($_SERVER['DOCUMENT_ROOT'].'/model/crud.php');
            $ex = new CRUD();
        
            if($_FILES['image']['type'] == 'image/jpeg'){

                $ex -> insert_fo();
                include ($_SERVER['DOCUMENT_ROOT']."/views/pages/pages-template/create-fo/rules-fo.php");

            }else if($_FILES['image']['type'] == 'image/png'){

                $ex -> insert_fo();
                include ($_SERVER['DOCUMENT_ROOT']."/views/pages/pages-template/create-fo/rules-fo.php");

            }else if($_FILES['image']['type'] == ''){

                $ex -> insert_fo();
                include ($_SERVER['DOCUMENT_ROOT']."/views/pages/pages-template/create-fo/rules-fo.php");

            }else{

                include $_SERVER['DOCUMENT_ROOT']."/views/pages/pages-template/create-fo/data-form.php";
                echo "<script>document.getElementById('alert').innerHTML='Extencion de imagen no soportada';</script>";
            }
        }else{
            include $_SERVER['DOCUMENT_ROOT']."/views/pages/pages-template/create-fo/data-form.php";
                echo "<script>document.getElementById('alert').innerHTML='Tienes que esperar 3 dias desde la ultima ves que creaste una F_O';</script>";
        }
    }

    function val_insert_rules(){
        $day = date("d")+3;
        $month = date("m");
        if(24 >= $day || 9 != $month){
            require_once($_SERVER['DOCUMENT_ROOT'].'/model/crud.php');
            $ex = new CRUD();
            $ex -> insert_rules();
            $ex -> select_code();
            include $_SERVER['DOCUMENT_ROOT']."/views/pages/pages-template/create-fo/loading_creation_fo.php";
        }else{
            include ($_SERVER['DOCUMENT_ROOT']."/views/pages/pages-template/create-fo/rules-fo.php");
            echo "<script>console.log('espera');</script>";
            echo "<script>document.getElementById('alert').innerHTML='Tienes que esperar 3 dias desde la ultima ves que creaste una F_O';</script>";
    }
    }

}
?>
