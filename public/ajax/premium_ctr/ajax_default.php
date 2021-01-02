<?php
include_once($_SERVER['DOCUMENT_ROOT']. '/app/config/config.php');
require_once(URL_PROJECT.'/app/controller/ctr_styles_premium.php');

$rpt = CTR_STYLES_PREMIUM::ctr_default_styles();
echo json_encode("Hola que pasa: ".$rpt);
?>