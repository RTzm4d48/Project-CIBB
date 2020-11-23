<?php
include_once($_SERVER['DOCUMENT_ROOT']. '/app/config/config.php');
require_once(URL_PROJECT.'/app/controller/ctr_message.php');
$id_user=(isset($_POST['id_user']))?$_POST['id_user']:null;
$text=(isset($_POST['text']))?$_POST['text']:null;
if(isset($_POST['deleted']))$ex=CTR_MESSAGE::ctr_deleted_message();
else $ex=CTR_MESSAGE::ctr_querys_message($text);

echo$ex;
?>