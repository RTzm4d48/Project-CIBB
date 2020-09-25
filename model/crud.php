<?php 
require_once($_SERVER['DOCUMENT_ROOT'].'/model/connection.php');

class CRUD{

    function insert_fo(){

        $image = (isset($_FILES['image'])) ? $_FILES['image']['tmp_name'] : 'null';
        $image_type = (isset($_FILES['image'])) ? $_FILES['image']['type'] : 'null';
        $img = ($image != '') ? $_FILES['image']['tmp_name'] : 'null';
        $name = (isset($_POST['namee']) && $_POST['namee'] != '') ? $_POST['namee'] : 'null';
        $description = (isset($_POST['description']) && $_POST['description'] != '') ? $_POST['description'] : 'null';
        $tag = (isset($_POST['tag']) && $_POST['tag'] != '') ? $_POST['tag'] : 'null';
        $url_w_a = (isset($_POST['UrlWebAlternative']) && $_POST['UrlWebAlternative'] != '') ? $_POST['UrlWebAlternative'] : 'null';
        $url_b_b_f = (isset($_POST['UrlFo']) && $_POST['UrlFo'] != '') ? $_POST['UrlFo'] : 'null';
        $url_m = (isset($_POST['UrlMusic']) && $_POST['UrlMusic'] != '') ? $_POST['UrlMusic'] : 'null';

        //envio la imagen original a rediemncionarse
        if($image != ''){
            require_once($_SERVER['DOCUMENT_ROOT'].'/model/resize.php');
            $rs = new Resize();
            $rs -> resized_img_fo_big($img, $name, $image_type);
            $rs -> resized_img_fo_little($img, $name, $image_type);

            //obtengo las imagenes ya redimensionadas
            $img_big = $_SERVER['DOCUMENT_ROOT']."/model/tmp/size-$name-big.jpg";
            $image_big_bits = base64_encode(addslashes(fread(fopen($img_big, "r"), filesize($img_big))));
            $img_little = $_SERVER['DOCUMENT_ROOT']."/model/tmp/size-$name-little.jpg";
            $image_little_bits = base64_encode(addslashes(fread(fopen($img_little, "r"), filesize($img_little))));
        }else{
            //obtengo imagenes default
            $img_big = $_SERVER['DOCUMENT_ROOT']."/model/tmp/default/default_big.jpg";
            $image_big_bits = base64_encode(addslashes(fread(fopen($img_big, "r"), filesize($img_big))));
            $img_little = $_SERVER['DOCUMENT_ROOT']."/model/tmp/default/default_little.jpg";
            $image_little_bits = base64_encode(addslashes(fread(fopen($img_little, "r"), filesize($img_little))));
        }
        
        $conn = Connection::connect();

        //insert
        $sql = "insert f_o (fo_img_little, fo_img_big, fo_name, fo_description, fo_tag, fo_url_w_a, fo_url_b_b_f, fo_url_m, fo_photo_1, fo_photo_2, fo_photo_3)
        values ('".$image_little_bits."', '".$image_big_bits."','".$name."','".$description."','".$tag."','".$url_w_a."','".$url_b_b_f."','".$url_m."',null,null,null);";
        $sql_select_id = "select SCOPE_IDENTITY() as id ;";
        $result = sqlsrv_query($conn, $sql);
        
        if (!$result) {
            console('the insertion is fail');//console es una funcion mia
        }else {
            console("the insertion is successful");
            $scope = sqlsrv_query($conn, $sql_select_id);
            $Row = sqlsrv_fetch_array($scope);
        
            $_SESSION['sess_id'] = $Row['id'];
            console($_SESSION['sess_id']);
        }

        /* limpar las variables POST */
       /*  echo "<script>
              if(window.history.replaceState ){
                  window.history.replaceState(null, null, window.location.href );
              }
             </script>"; */
    }

    function insert_rules(){
        console("rules: ".$_POST['num_rule']." - prohibitions: ".$_POST['num_prohibition']);
        
        $num_rules = $_POST['num_rule'];
        $num_prohibitions = $_POST['num_prohibition'];

        $conn = Connection::connect();

        for($iv = 1; $iv <= $num_rules; $iv++){
            console($_POST['rule_'.$iv]);
            $sql = "insert rules_fo (fo_id, rf_rule) VALUES (".$_SESSION['sess_id'].", '".$_POST['rule_'.$iv]."');";
            $result = sqlsrv_query($conn, $sql);
        }
        for($iv = 1; $iv <= $num_prohibitions; $iv++){
            console($_POST['prohibition_'.$iv]);
            $sql= "insert prohibition_fo (fo_id, pf_prohibition) VALUES (".$_SESSION['sess_id'].", '".$_POST['prohibition_'.$iv]."');";
            $result = sqlsrv_query($conn, $sql);
        }
    }

    function select_code(){
        $conn = Connection::connect();

        $sql_select_code = "select fo_code from f_o where fo_id = ".$_SESSION['sess_id'].";";
        $rpt = sqlsrv_query($conn, $sql_select_code);
        if(!$rpt){
            console("error en obtencioon de codigo");
        }else{
            $code = sqlsrv_fetch_array($rpt);
            console("code: ".$code['fo_code']);
            $_SESSION['sess_code'] = $code['fo_code'];
            
            console("code_2: ".$_SESSION['sess_code']);
        }
    }
}
?>