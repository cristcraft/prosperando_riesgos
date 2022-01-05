<?php 
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "riesgosDB";  
    $connection = new mysqli($hostname, $username, $password, $dbname);
    
    if(!$connection){
        die("La conexion ha fallado".mysqli_connect_error());
    }

?>