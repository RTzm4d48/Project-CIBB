<?php
include_once ($_SERVER['DOCUMENT_ROOT'].'/app/config/config.php');
require_once(URL_PROJECT.'/app/controller/ctr_querys_event.php');
$t1=$_POST['top_1'];
$t2=$_POST['top_2'];
$t3=$_POST['top_3'];
$evt_id=$_POST['evt_id'];

$id_t1=$_POST['id_top_1'];
$id_t2=$_POST['id_top_2'];
$id_t3=$_POST['id_top_3'];

$point_top_1=$_POST['point_top_1'];
$point_top_2=$point_top_1/2;
$point_top_3=$point_top_1/3;

//puntages de grafica
require_once(URL_PROJECT.'/app/controller/ctr_administration.php');
$act_ex=CTR_QUERYS_ACTIVITY::ctr_act_assistance();
$act_ex=CTR_QUERYS_ACTIVITY::ctr_act_activities();

if($_POST['id_top_1']!=null)$x=CTR_QUERYS_EVENT::ctr_add_point_users($point_top_1,$_POST['id_top_1']);
if($_POST['id_top_2']!=null)$x=CTR_QUERYS_EVENT::ctr_add_point_users($point_top_2,$_POST['id_top_2']);
if($_POST['id_top_1']!=null)$x=CTR_QUERYS_EVENT::ctr_add_point_users($point_top_3,$_POST['id_top_3']);

$rpt=CTR_QUERYS_EVENT::ctr_position_participants($t1,$t2,$t3,$evt_id);
/* echo 'holaaaa'.$id_t1.'/'.$id_t2.'/'.$id_t3.'/top1: '.$point_top_1.'/top2: '.round($point_top_2).'/top3: '.round($point_top_3); */
echo $rpt;
?>