<?php 
    require_once("../connection/connection.php");

    $canal_de_servicio = "SELECT * FROM canal_de_servicio";
    $canal_de_servicioResult = $connection->query($canal_de_servicio);

    while($row = $canal_de_servicioResult -> fetch_assoc()){
        echo "<option value='".$row['canal_de_servicio']."'>".$row['canal_de_servicio']."</option>";
    }
    if(!$canal_de_servicioResult){
        echo 'error';
    }
?>