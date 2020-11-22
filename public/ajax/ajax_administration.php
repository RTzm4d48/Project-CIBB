<?php
include_once ($_SERVER['DOCUMENT_ROOT']. '/app/config/config.php');
require_once(URL_PROJECT.'/app/controller/ctr_administration.php');
$id_user=$_POST['id_user'];
if($_POST['action']=='ascend')$ex=CTR_ADMINISTRATION::ctr_ascend_user($_POST['id_user']);
else if($_POST['action']=='degrade')$ex=CTR_ADMINISTRATION::ctr_degrade_user($_POST['id_user']);
else if($_POST['action']=='expel')$ex=CTR_ADMINISTRATION::ctr_expel_user($_POST['id_user']);
return $ex;
?>