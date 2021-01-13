<?php
session_start();
include_once($_SERVER['DOCUMENT_ROOT']. '/app/config/config.php');
require_once(URL_PROJECT.'/app/controller/ctr_querys_code_validations.php');
$gmail=$_POST['gmail'];
$code=$_POST['code'];
$ex=CTR_QUERYS_CODE_VALIDATIONS::ctr_code_accound_valid($gmail,$code);

echo json_encode('hola ya estoy en ayax php g:'.$gmail.' c: '.$code.'-----'.$ex);
?>