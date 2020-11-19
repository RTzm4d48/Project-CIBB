<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/app/config/config.php');
require_once(URL_PROJECT.'/app/controller/ctr_querys_event.php');
$ex=CTR_QUERYS_EVENT::ctr_participation_plus();
$rpt=CTR_QUERYS_EVENT::ctr_joind_event($_POST['evt_id']);
echo$rpt;
?>