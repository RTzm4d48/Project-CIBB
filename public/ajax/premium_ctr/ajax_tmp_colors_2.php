<?php
session_start();

$c1_=(isset($_SESSION['color_01']))?$_SESSION['color_01']:'#45A1E5';
$c2_=(isset($_SESSION['color_02']))?$_SESSION['color_02']:'#45A1E5';
$c3_=(isset($_SESSION['color_03']))?$_SESSION['color_03']:'#fff';
$c4_=(isset($_SESSION['color_04']))?$_SESSION['color_04']:'#36393F';
$c5_=(isset($_SESSION['color_05']))?$_SESSION['color_05']:'#8EDF4A';

$c1=(isset($_SESSION['c1']))?$_SESSION['c1']:$c1_;
$c2=(isset($_SESSION['c2']))?$_SESSION['c2']:$c2_;
$c3=(isset($_SESSION['c3']))?$_SESSION['c3']:$c3_;
$c4=(isset($_SESSION['c4']))?$_SESSION['c4']:$c4_;
$c5=(isset($_SESSION['c5']))?$_SESSION['c5']:$c5_;

$data=['c1'=>$c1,'c2'=>$c2,'c3'=>$c3,'c4'=>$c4,'c5'=>$c5];

echo json_encode($data);
?>