<?php
include_once ($_SERVER['DOCUMENT_ROOT']. '/app/config/config.php');
require_once(URL_PROJECT.'/app/controller/ctr_querys_fo.php');
if(isset($_POST['all']))$data=CTR_QUERYS_F_O::ctr_search_all_fo();
else $data=CTR_QUERYS_F_O::ctr_search_all_fo_for_name();

echo json_encode($data);
?>