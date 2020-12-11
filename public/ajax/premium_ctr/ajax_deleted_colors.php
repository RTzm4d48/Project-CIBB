<?php
include_once($_SERVER['DOCUMENT_ROOT']. '/app/config/config.php');
require_once(URL_PROJECT.'/app/controller/ctr_styles_premium.php');
$id=$_POST['id'];
$rpt = CTR_STYLES_PREMIUM::ctr_deleted_color($id);
echo json_encode($rpt);
?>