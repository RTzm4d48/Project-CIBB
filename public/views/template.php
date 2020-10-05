<?php
include_once ($_SERVER['DOCUMENT_ROOT']. '/app/config/config.php');
require_once (URL_PROJECT. '/app/libs/console.php');

$x = false;
if(isset($_COOKIE["id_user"])) $x = true;

if($x == true){
    include_once ('views/pages/page_base.php');
}else{
    include_once ('views/pages/start.php');
}

//crear una cookie
/* setcookie("id_user","maiz"); */

//borrar una cookie
/* setcookie("galleta", "maiz", time() - 10); */