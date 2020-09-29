<?php
include_once ($_SERVER['DOCUMENT_ROOT']. '/app/config/config.php');
$x = 1;
if($x == 1){
    include_once ('views/pages/page_base.php');
}else{
    include_once ('views/pages/start.php');
}
?>