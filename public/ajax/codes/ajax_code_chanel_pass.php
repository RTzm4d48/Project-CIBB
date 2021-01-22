<?php
include_once($_SERVER['DOCUMENT_ROOT']. '/app/config/config.php');
require_once(URL_PROJECT.'/app/controller/ctr_querys_code_validations.php');
$gmail=$_POST['gmail'];
$code=$_POST['code'];
$ex=CTR_QUERYS_CODE_VALIDATIONS::ctr_compare_gmail($gmail,$code);
echo json_encode($ex);
?>