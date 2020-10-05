<?php
echo 'test';
require_once ($_SERVER['DOCUMENT_ROOT']. '/app/config/config.php');
require_once (URL_PROJECT. '/app/libs/console.php');

$ex = new Connection();

class Connection{

    public $conn;
    
    public function __construct(){

        $this->connect();

    }

    public function connect(){
        $this->conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        if (! $this->conn) {
            console("Connection failed: " . mysqli_connect_error());
        }else{
            console("Connected successfully");
        }

        $pr = $this->conn->prepare("SELECT us_gmail FROM the_user WHERE us_gmail = ?;");
    
        $gmail = 'edgar.aggre@gmail.com';
        $pr->bind_param("s", $gmail);

        if($pr->execute()){
            
            //Alamacenaos los datos de la consulta
            $pr->store_result();

            if($pr->num_rows == 0){		
                echo "Sin resultados";
            }

            //Indicamos la variable donde se guardaran los resultados
            $pr->bind_result($telefono);
            
            //listamos todos los resultados
	        while($pr->fetch()){
		        echo "Telefono: $telefono <br>";
	        }
            
                
        }
    }
 
    
}
?>