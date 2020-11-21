<?php
include_once ($_SERVER['DOCUMENT_ROOT']. '/app/config/config.php');
require_once(URL_PROJECT.'/app/controller/ctr_perfil_users.php');
$id_user=$_POST['id_user'];
$data=CTR_PERFIL_USERS::ctr_select_peril_user($id_user);
echo json_encode($data);
?>