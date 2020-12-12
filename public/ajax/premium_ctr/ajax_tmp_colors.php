<?php
session_start();

$_SESSION['c1']=(isset($_POST['c1']))?$_POST['c1']:'#000';
$_SESSION['c2']=(isset($_POST['c2']))?$_POST['c2']:'#000';
$_SESSION['c3']=(isset($_POST['c3']))?$_POST['c3']:'#000';
$_SESSION['c4']=(isset($_POST['c4']))?$_POST['c4']:'#000';
$_SESSION['c5']=(isset($_POST['c5']))?$_POST['c5']:'#000';
$_SESSION['c6']=(isset($_POST['c6']))?$_POST['c6']:'#000';

echo json_encode(true);
?>