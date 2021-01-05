<?php
$d_p='$2y$10$22ooV20m8BVwy.ruU/rxPO0LUiS6b/HF45hkqcEq2ZvwYx5cLKelK';
$pass = $_POST['p'];
if(password_verify($pass,$d_p)){
    echo json_encode("2y$10$22ooV20m8BVwy");
}else{
    echo json_encode("error");
}
?>