<?php

require_once("../connection/connection.php");

$selects = $_POST['selects'];
$titulo = $_POST['titulo'];
$id_mbre_del_riesgono = $_POST['id'];
echo $id_nombre_del_riesgo;

$consultaSql = "SELECT id, id_nombre_del_riesgo, nombre_del_riesgo, referencia, id_causa FROM 	nombre_del_riesgo WHERE id_nombre_del_riesgo = '$id_mbre_del_riesgono'";
$result = mysqli_query($connection, $consultaSql);


$string = "<div class='mb-3'>
        <label class='form-label'>$titulo</label>
        <select name='$selects' id='$selects' class='form-select'>
        
        <option value='0'>Selecciona una opcion</option>";
        while($res=mysqli_fetch_row($result)){
                $string = $string.'<option value="'.$res[3].'">'.utf8_encode($res[2]).'</option>';
            };
        "</select>";
        

    echo $string."</div>";


?>