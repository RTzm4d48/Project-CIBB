<?php
$name=$_POST['name'];
$description=$_POST['description'];
$tag=$_POST['tag'];
$url_w_a=$_POST['url_w_a'];
$url_b_b_f=$_POST['url_b_b_f'];
$url_m=$_POST['url_m'];
$label=$_POST['label'];
$image=$_POST['image'];
include_once ($_SERVER['DOCUMENT_ROOT']. '/app/config/config.php');
require_once(URL_PROJECT.'/app/controller/ctr_create_f_o.php');
$data=['name'=>$name,'description'=>$description,'tag'=>$tag,'url_w_a'=>$url_w_a,'url_b_b_f'=>$url_b_b_f,'url_m'=>$url_m,'label'=>$label,'image'=>$image];

$rpt=CTR_CREATE_F_O::val_insert_fo($data);
/* echo'name='.$name.' description:'.$description.' tag:'.$tag.' url_w_a:'.$url_w_a.' url_b_b_f:'.$url_b_b_f.' url_m:'.$url_m.' label:'.$label; */
echo json_encode($rpt);
?>