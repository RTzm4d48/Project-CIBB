<?php
/* define("DB_HOST" , "bh8908.banahosting.com");
define("DB_NAME" , "uqufbjbs_CibbBD2");
define("DB_USER" , "uqufbjbs_edgar");
define("DB_PASSWORD" , "123456.nnnnnn@n");
define("URL_PROJECT" , $_SERVER['DOCUMENT_ROOT']);
define("PROJECT_NAME" , "CIBB");

 */
require_once ($_SERVER['DOCUMENT_ROOT']. '/app/config/config.php');
require_once (URL_PROJECT. '/app/libs/console.php');

echo'Hola esto es el test:<br>';
connect();

function connect(){
    $xx->conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if (!$xx->conn) {
        echo'conexion failed';
    }else{
        echo'Connected successfully';
        return $xx->conn;
    }
}
?>