<?php
$objetive=(isset($_POST['objetive']))?$_POST['objetive']:null;
$description=(isset($_POST['description']))?$_POST['description']:null;
$rank=(isset($_POST['rank']))?$_POST['rank']:null;
$day=(isset($_POST['day']))?$_POST['day']:null;
$month=(isset($_POST['month']))?$_POST['month']:null;
$year=(isset($_POST['year']))?$_POST['year']:null;
$array=['obj'=>$objetive,'desc'=>$description,'rank'=>$rank,'day'=>$day,'month'=>$month,'year'=>$year];
echo json_encode($array);
?>