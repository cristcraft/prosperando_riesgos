<?php 
    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "prosperando_riesgos";  
    $connection = new mysqli($hostname, $username, $password, $dbname);
    
    if(!$connection){
        die("La conexion ha fallado".mysqli_connect_error());
    }

?>