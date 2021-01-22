<?php
include_once($_SERVER['DOCUMENT_ROOT']. '/app/config/config.php');
require_once(URL_PROJECT.'/app/controller/ctr_querys_code_validations.php');
$id=$_POST['id'];
$pass=$_POST['pass'];
$ex=CTR_QUERYS_CODE_VALIDATIONS::ctr_chanel_password($id,$pass);
if($ex==true)$ex2=CTR_QUERYS_CODE_VALIDATIONS::ctr_deleted_code_pass($id);
echo json_encode($ex);
?>