<?php
include_once($_SERVER['DOCUMENT_ROOT']. '/app/config/config.php');
require_once(URL_PROJECT.'/app/controller/ctr_querys_user.php');
$new_pass=$_POST['pass_n'];
$old_pass=$_POST['pass_a'];
$ex=CTR_QUERYS_USER::ctr_change_pass($old_pass,$new_pass);
echo json_encode($ex);
?>