<?php
echo 'test';
require_once ($_SERVER['DOCUMENT_ROOT']. '/app/config/config.php');
require_once (URL_PROJECT. '/app/libs/console.php');

$conn = new Connection();

class Connection{

    public $conn;
    
    public function __construct(){

        $this->connect();

    }

    public function connect(){
        $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if (!$conn) {
            console("Connection failed: " . mysqli_connect_error());
        }else{
            console("Connected successfully");
        }
 
        
 
        $sql = "INSERT INTO `f_o`(`fo_img_little`, `fo_img_big`, `fo_name`, `fo_description`, `fo_tag`, `fo_url_w_a`, `fo_url_b_b_f`, `fo_url_m`, `fo_photo_1`, `fo_photo_2`, `fo_photo_3`) VALUES (null, null,'Frih ets','mmmm mm',null,null,'url',null,null,null,null);";
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
?>