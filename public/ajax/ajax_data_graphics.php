<?php
include_once ($_SERVER['DOCUMENT_ROOT']. '/app/config/config.php');
require_once(URL_PROJECT.'/app/controller/ctr_querys_activity.php');
$data=CTR_QUERYS_ACTIVITY::ctr_data_graphics($_POST['fo_code']);


/* echo'<pre>';
print_r($data);
echo'</pre>'; */
echo json_encode($data);
?>