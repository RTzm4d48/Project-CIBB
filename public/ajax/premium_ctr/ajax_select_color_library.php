<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']. '/app/config/config.php');
require_once(URL_PROJECT.'/app/controller/ctr_styles_premium.php');

if(isset($_POST['deleted'])){
    unset($_SESSION['color_01']);
    unset($_SESSION['color_02']);
    unset($_SESSION['color_03']);
    unset($_SESSION['color_04']);
    unset($_SESSION['color_05']);
    unset($_SESSION['color_06']);
}

$data = CTR_STYLES_PREMIUM::ctr_select_color();
echo json_encode($data);
?>