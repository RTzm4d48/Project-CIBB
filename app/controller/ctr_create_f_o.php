<?php
require_once(URL_PROJECT.'/app/model/crud_create_f_o.php');

class CTR_CREATE_F_O{
    static function ctr_prepare_data(){
        $ex=new CRUD_CREATE_F_O();
        $rpt=$ex->crud_prepare_data();
        $prev=$ex->crud_previous_create();
        //prepare data7
        $name=(isset($_POST['namee'])&& $_POST['namee'] != '') ? $_POST['namee'] : '';
        $description=(isset($_POST['description']) && $_POST['description'] != '') ? $_POST['description'] : '¡Siempre Unidos!';
        $tag=(isset($_POST['tag']) && $_POST['tag'] != '') ? $_POST['tag'] : 'null';
        $url_w_a=(isset($_POST['UrlWebAlternative']) && $_POST['UrlWebAlternative'] != '') ? $_POST['UrlWebAlternative'] : '';
        $url_b_b_f=(isset($_POST['UrlFo']) && $_POST['UrlFo'] != '') ? $_POST['UrlFo'] : '';
        $url_m=(isset($_POST['UrlMusic']) && $_POST['UrlMusic'] != '') ? $_POST['UrlMusic'] : '';
        $label_=(isset($_POST['label_']) && $_POST['label_'] != '')?$_POST['label_']:'';
        $image=(isset($_FILES['image']) && $_FILES['image']['tmp_name']!='')?'yesimg':'no_img';
        $data="name=".$name."&description=".$description."&tag=".$tag."&url_w_a=".$url_w_a."&url_b_b_f=".$url_b_b_f."&url_m=".$url_m."&label=".$label_."&image=".$image;
        if($rpt==false)return false;
        else if($prev==true)return 'prev';
        else return $data;
    }
    public function val_insert_fo($data){
            $ex = new CRUD_CREATE_F_O();
            if($ex->insert_fo($data)){
                return true;//todo bien
            }else{
                return false;//Ocurrio un error
            }
    }
    /* function val_insert_rules(){
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
    } */
    static function ctr_select_code_fo(){
        $ex=new CRUD_CREATE_F_O();
        $code=$ex->crud_select_code_fo();
        return $code;
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