<?php 
    require_once("./connection/connection.php");

    $canal_de_servicio = "SELECT * FROM canal_de_servicio";
    $canal_de_servicioResult = $connection->query($canal_de_servicio);

    // $db = "SELECT COUNT(*) FROM sys.tables";
    // $dbResult = $connection->query($db);


    // while($row = $dbResult -> fetch_assoc()){ 
    //     echo $row;
    // }
    
    if(!$canal_de_servicioResult){
        echo 'error';
    }
?>