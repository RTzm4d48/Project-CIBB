<?php
session_start();

/* $c1=(isset($_SESSION['color_01']))?$_SESSION['color_01']:'#45A1E5';
$c2=(isset($_SESSION['color_02']))?$_SESSION['color_02']:'#45A1E5';
$c3=(isset($_SESSION['color_03']))?$_SESSION['color_03']:'#fff';
$c4=(isset($_SESSION['color_04']))?$_SESSION['color_04']:'#36393F';
$c5=(isset($_SESSION['color_05']))?$_SESSION['color_05']:'#8EDF4A'; */

$_SESSION['c1']=(isset($_POST['c1']))?$_POST['c1']:'#000';
$_SESSION['c2']=(isset($_POST['c2']))?$_POST['c2']:'#000';
$_SESSION['c3']=(isset($_POST['c3']))?$_POST['c3']:'#000';
$_SESSION['c4']=(isset($_POST['c4']))?$_POST['c4']:'#000';
$_SESSION['c5']=(isset($_POST['c5']))?$_POST['c5']:'#000';

echo json_encode(true);
?>