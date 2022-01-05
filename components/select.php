<?php 
    require_once('../connection/connection.php');

    $tabla_principal = $_POST['tabla_principal'];
    $tabla_dependiente = $_POST['tabla_dependiente'];
    $id_tabla_principal = $_POST['id_tabla_principal'];

    $consultaSql = "SELECT * FROM `".$tabla_dependiente."` WHERE `id_".$tabla_principal."` = '$id_tabla_principal'";
    $result = mysqli_query($connection, $consultaSql);

    $datos = array();

    if ($result) {
        while($res=mysqli_fetch_row($result)){
            array_push($datos, array('id' => $res[0], 'nombre' => $res[2]));
        }
        echo json_encode($datos);
    }else{
        echo 'ERROR';
    }
?>