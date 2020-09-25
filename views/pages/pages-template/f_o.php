<br><br><br><br><br><br><br>

<?php
echo 'hello';
require_once($_SERVER['DOCUMENT_ROOT'].'/model/connection.php');
$conn = Connection::connect();
$get_code = $_GET['address'];

$sql = "select * from f_o where fo_code = '".$get_code."';";
$result = sqlsrv_query($conn, $sql);
if(!$result){
    echo "error";
}else{
    $Row = sqlsrv_fetch_array($result);
    echo '<br>';
    echo "Code: ". $Row['fo_code'];
    echo '<br>';
    echo "Name: ". $Row['fo_name'];
    echo '<br>';
    echo "Description: ". $Row['fo_description'];
    
    echo "<br>";
    echo "día: ".date("d");
    echo "<br>";
    echo "mes: ".date("m");
}
?>