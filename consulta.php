<?php 
    require_once("./connection/connection.php");

    $selects = $_POST['selects'];
    $titulo = $_POST['titulo'];
    $lista = $_POST['lista'];
    $id = $_POST['id'];
    $consultaSql = '';

    // if($selects === 'producto_servicio_afectado'){
    //     $consultaSql = "SELECT id, 	id_'$selects', producto_servicio_afectado FROM producto_servicio_afectado WHERE id_'$selects' = '$id'";
    // }

    switch ($selects) {
        case 'producto_servicio_afectado':
            $consultaSql = "SELECT id, 		id_proceso_afectado, 	producto_servicio_afectado	 FROM 	producto_servicio_afectado	 WHERE 	id_proceso_afectado = '$id'";
            $result = mysqli_query($connection, $consultaSql);
    
            break;

        case 'nombre_del_riesgo':
            $consultaSql = "SELECT id, id_producto_servicio_afectado, 	nombre_del_riesgo FROM 	nombre_del_riesgo WHERE id_producto_servicio_afectado = '$id'";
            $result = mysqli_query($connection, $consultaSql);
            break;

        default:
            # code...
            break;
    }

    $string = "<div class='mb-3'>
    <label class='form-label'>$titulo</label>
        <select name='$selects' id='$selects' class='form-select'>
        <option value='0'>Selecciona una opcion</option>";
            while($res=mysqli_fetch_row($result)){
                $string = $string.'<option value='.$res[0].'>'.utf8_encode($res[2]).'</option>';
            };

    echo $string."</select></div>";
?>