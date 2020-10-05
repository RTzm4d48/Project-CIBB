<?php
require_once ($_SERVER['DOCUMENT_ROOT']. '/app/config/config.php');
require_once (URL_PROJECT. '/app/libs/console.php');
require_once (URL_PROJECT. '/app/model/connection.php');

/* -- */

class CRUD extends Connection{

    function __construct(){
        $this->connect();
        
        /* $this->select_code(); */
    }

    public function execute($query){

        try{
        $rpt = mysqli_query($this->conn, $query);
        if ($rpt) {
            console("New record created successfully");
            return $rpt;
        } else {
            console("ERROR in create new record");
            return 'error';
        }
        }catch (PDOException $e) {

        $this->error = $e->getMessage();
        echo $this->error;
        }
        
    }

    function obtain_id(){
        $id = mysqli_insert_id($this->conn);
        console("Inser ID: ".$id);
        $_SESSION['sess_id'] = $id;
    }

    public function insert_fo(){
        $image = $_SESSION['image'];
        $image_type = $_SESSION['image_type'];
        $img = $_SESSION['img'];
        $name = $_SESSION['name'];
        $description = $_SESSION['description'];
        $tag = $_SESSION['tag'];
        $url_w_a = $_SESSION['url_w_a'];
        $url_b_b_f = $_SESSION['url_b_b_f'];
        $url_m = $_SESSION['url_m'];

        if($image != ''){
            require_once URL_PROJECT.'/app/libs/resize_img.php';
            $rs = new Resize();
            $rs -> resized_img_fo_big($img, $name, $image_type);
            $rs -> resized_img_fo_little($img, $name, $image_type);

            //obtengo las imagenes ya redimensionadas
            $img_big = URL_PROJECT."/app/tmp/size-$name-big.jpg";
            $image_big_bits = base64_encode(addslashes(fread(fopen($img_big, "r"), filesize($img_big))));
            $img_little = URL_PROJECT."/app/tmp/size-$name-little.jpg";
            $image_little_bits = base64_encode(addslashes(fread(fopen($img_little, "r"), filesize($img_little))));
        }else{
            //obtengo imagenes default
            $img_big = URL_PROJECT."/app/tmp/default/default_big.jpg";
            $image_big_bits = base64_encode(addslashes(fread(fopen($img_big, "r"), filesize($img_big))));
            $img_little = URL_PROJECT."/app/tmp/default/default_little.jpg";
            $image_little_bits = base64_encode(addslashes(fread(fopen($img_little, "r"), filesize($img_little))));
        }
        //$ex = obtain_id();
        //insert
        $pr = $this->conn->prepare("INSERT INTO `f_o`(`fo_img_little`, `fo_img_big`, `fo_name`, `fo_description`, `fo_tag`, `fo_url_w_a`, `fo_url_b_b_f`, `fo_url_m`, `fo_photo_1`, `fo_photo_2`, `fo_photo_3`)
        VALUES ('".$image_little_bits."', '".$image_big_bits."',?,?,?,?,?,?,null,null,null);");
        $pr->bind_param("ssssss", $name, $description, $tag, $url_w_a, $url_b_b_f, $url_m);

        if($pr->execute()){
            console("New record created successfully");
        }else{
            exit('Error al realizar la consulta: '.$pr->close());
        }

        $this->obtain_id();

    }

    function insert_rules(){

        $num_rules = $_POST['num_rule'];
        $num_prohibitions = $_POST['num_prohibition'];

        for($iv = 1; $iv <= $num_rules; $iv++){

            $pr = $this->conn->prepare("INSERT INTO `rules_fo`(`fo_id`, `rf_rule`) VALUES (?,?);");
            $pr->bind_param("is", $_SESSION['sess_id'], $_POST['rule_'.$iv]);

            if($pr->execute()){
                console("Inser Rule Exit");
            }else{
                exit('Error al realizar la consulta: '.$pr->close());
            }

        }
        for($iv = 1; $iv <= $num_prohibitions; $iv++){

            $pr = $this->conn->prepare("INSERT INTO `prohibition_fo`(`fo_id`, `pf_prohibition`) VALUES (?,?);");
            $pr->bind_param("is", $_SESSION['sess_id'], $_POST['prohibition_'.$iv]);

            if($pr->execute()){
                console("Inser Rule Exit");
            }else{
                exit('Error al realizar la consulta: '.$pr->close());
            }

        }
    }

    function select_code(){
        $pr = $this->conn->prepare("SELECT fo_code FROM `f_o` WHERE fo_id = ?");
        $pr->bind_param("i", $_SESSION['sess_id']);

        if($pr->execute()){
            $pr->store_result();
            $pr->bind_result($fo_code);

            //obtenemos el resultado
	        while($pr->fetch()){
                $_SESSION['sess_code'] = $fo_code; 
            }

            $pr->close();
        }else{
            exit('Error al realizar la consulta: '.$pr->close());
        }
    }

    function rank_user_leader(){
        $pr = $this->conn->prepare("UPDATE `the_user` SET `us_rank`= ?, `fo_id`= ? WHERE us_id = ?");
        $rank = 'leader';
        $pr->bind_param("sii", $rank, $_SESSION['sess_id'], $_COOKIE['id_user']);
        if($pr->execute()){
            console('rank user finished');
        } else {
            exit('Error al realizar la consulta: '.$pr->close());
        }

    }

    public function select_datos_fo(){
        if(isset($_GET['C'])){
            $code = $_GET['C'];
            $sql5 = "SELECT * FROM f_o WHERE fo_code = '". $code ."';";
            $rpt = $this->execute($sql5);

            return $Row = sqlsrv_fetch_array($rpt);
            
        }
    }

}


/* $crud = new CRUD(); */
