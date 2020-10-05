<?php
require_once(URL_PROJECT.'/app/model/crud.php');

class VALIDATIONS{

    public function val_insert_fo_2(){
        $_SESSION['image'] = (isset($_FILES['image'])) ? $_FILES['image']['tmp_name'] : 'null';
        $_SESSION['image_type'] = (isset($_FILES['image'])) ? $_FILES['image']['type'] : 'null';
        $_SESSION['img'] = ($_SESSION['image'] != '') ? $_FILES['image']['tmp_name'] : 'null';
        $_SESSION['name'] = (isset($_POST['namee']) && $_POST['namee'] != '') ? $_POST['namee'] : 'null';
        $_SESSION['description'] = (isset($_POST['description']) && $_POST['description'] != '') ? $_POST['description'] : 'null';
        $_SESSION['tag'] = (isset($_POST['tag']) && $_POST['tag'] != '') ? $_POST['tag'] : 'null';
        $_SESSION['url_w_a'] = (isset($_POST['UrlWebAlternative']) && $_POST['UrlWebAlternative'] != '') ? $_POST['UrlWebAlternative'] : 'null';
        $_SESSION['url_b_b_f'] = (isset($_POST['UrlFo']) && $_POST['UrlFo'] != '') ? $_POST['UrlFo'] : 'null';
        $_SESSION['url_m'] = (isset($_POST['UrlMusic']) && $_POST['UrlMusic'] != '') ? $_POST['UrlMusic'] : 'null';

        include URL_PROJECT."/public/views/pages/pages-page_base/create-fo/rules-fo.php";
    }
    
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
        $ex = new CRUD();
        $Row = $ex->select_datos_fo();

        return $Row;
        /* echo '<pre>';
        print_r($Row);
        echo '</pre>'; */
    }

    public static function prueba(){  
        return URL_PROJECT.'/app/controller/test.php';
    }

}
?>
