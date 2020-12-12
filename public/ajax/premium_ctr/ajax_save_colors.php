<?php
session_start();
/* include_once($_SERVER['DOCUMENT_ROOT']. '/app/config/config.php');
require_once(URL_PROJECT.'/app/controller/ctr_styles_premium.php'); */

$color=($_POST['color'])?$_POST['color']:null;
$position=($_POST['position'])?$_POST['position']:null;


if($position==1){$_SESSION['color_01']=$color;unset($_SESSION['c1']);}
if($position==2){$_SESSION['color_02']=$color;unset($_SESSION['c2']);}
if($position==3){$_SESSION['color_03']=$color;unset($_SESSION['c3']);}
if($position==4){$_SESSION['color_04']=$color;unset($_SESSION['c4']);}
if($position==5){$_SESSION['color_05']=$color;unset($_SESSION['c5']);}
if($position==6){$_SESSION['color_06']=$color;unset($_SESSION['c6']);}

echo json_encode(true);
?>