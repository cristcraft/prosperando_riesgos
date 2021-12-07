<?php 
    require_once("../connection/connection.php");

    $selects = $_POST['selects'];
    $titulo = $_POST['titulo'];
    $listaDependiente = $_POST['listaDependiente'];
    $id = $_POST['id'];
    $consultaSql = '';
    $referencia = $_POST['referencia'];

    $consultaSql = "SELECT id, 	id_".$selects.", 	".$selects.", ".$listaDependiente."	 FROM 	".$selects."	 WHERE 	id_".$selects." = '$id'";
    $result = mysqli_query($connection, $consultaSql);

    /*switch ($selects) {
        case 'producto_servicio_afectado':
            $consultaSql = "SELECT id, 	id_".$selects.", 	".$selects.", ".$listaDependiente."	 FROM 	".$selects."	 WHERE 	id_".$selects." = '$id'";
            $result = mysqli_query($connection, $consultaSql);
    
            break;

        case 'nombre_del_riesgo':
            $consultaSql = "SELECT id, id_nombre_del_riesgo, 	nombre_del_riesgo, referencia FROM 	nombre_del_riesgo WHERE id_nombre_del_riesgo = '$id'";
            $result = mysqli_query($connection, $consultaSql);
            break;

        default:
            # code...
            break;
    }*/

    $string = "<div class='mb-3'>
        <label class='form-label'>$titulo</label>
        <select name='$selects' id='$selects' class='form-select'>
        <option value='0'>Selecciona una opcion</option>";
            while($res=mysqli_fetch_row($result)){
                $string = $string.'<option value='.$res[3].'>'.utf8_encode($res[2]).'</option>';
            };"</select>";

    echo $string."</div>";

?>