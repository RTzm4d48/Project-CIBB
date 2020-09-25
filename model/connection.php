<?php
function console($date){
    echo "<script> console.log('Debug Objects: ". $date ."')</script>";
}

class Connection{
    static public function connect(){
        
        $servername = "localhost\SQLEXPRESS";
        $namedatabase = "cibbBD";
        $username = "user_01";
        $password = "123";

        
        $connectionInfo = array( "Database"=>$namedatabase, "UID"=>$username, "PWD"=>$password);
        $conn = sqlsrv_connect( $servername, $connectionInfo);
        if( $conn ) {
          console("Connection databese:$namedatabase established");
          return $conn;
       }else{
          console("Conecction dont established");
          console(print_r( sqlsrv_errors(), true));
       }
    }
}
?>