<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']. '/app/config/config.php');
require_once(URL_PROJECT.'/app/controller/ctr_styles_premium.php');

$c1=(isset($_SESSION['c1']))?$_SESSION['c1']:'#45A1E5';
$c2=(isset($_SESSION['c2']))?$_SESSION['c2']:'#45A1E5';
$c3=(isset($_SESSION['c3']))?$_SESSION['c3']:'#fff';
$c4=(isset($_SESSION['c4']))?$_SESSION['c4']:'#36393F';
$c5=(isset($_SESSION['c5']))?$_SESSION['c5']:'#8EDF4A';
$c6=(isset($_SESSION['c6']))?$_SESSION['c6']:'#36393F';


$color_01=(isset($_SESSION['color_01']))?$_SESSION['color_01']:$c1;
$color_02=(isset($_SESSION['color_02']))?$_SESSION['color_02']:$c2;
$color_03=(isset($_SESSION['color_03']))?$_SESSION['color_03']:$c3;
$color_04=(isset($_SESSION['color_04']))?$_SESSION['color_04']:$c4;
$color_05=(isset($_SESSION['color_05']))?$_SESSION['color_05']:$c5;
$color_06=(isset($_SESSION['color_06']))?$_SESSION['color_06']:$c6;
$name=($_POST['name']!='')?$_POST['name']:'unnamed';
$colors=[$name,$color_01,$color_02,$color_03,$color_04,$color_05,$color_06];

$rpt=CTR_STYLES_PREMIUM::save_colors($colors);

echo json_encode($rpt);
?>