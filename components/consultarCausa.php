<?php

require_once("../connection/connection.php");

$selects = $_POST['selects'];
$titulo = $_POST['titulo'];
$id_causa = $_POST['id_causa'];
$causa;


$consultaSql = "SELECT id_causa FROM 	nombre_del_riesgo WHERE referencia = '$id_causa'";
$result = mysqli_query($connection, $consultaSql);
while($res=mysqli_fetch_assoc($result)){
    $causa = $res['id_causa'];
}

$consultaSql = "SELECT causa FROM causa WHERE id_causa = '$causa'";
$result2 = mysqli_query($connection, $consultaSql);

$string = "<div class='mb-3'>
        <label class='form-label'>$titulo</label>
        <select name='$selects' id='$selects' class='form-select'>
        <option value='0'>Selecciona una opcion</option>";
            while($res2=mysqli_fetch_row($result2)){
                $string = $string.'<option value='.$res2[0].'>'.utf8_encode($res2[0]).'</option>';
            };"</select>";

    echo $string."</div>";


?>