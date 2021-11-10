<?php 
    require_once("./connection/connection.php");

    $departamento = $_POST['departamentos'];

    $consultaSql = "SELECT id, id_departamento, municipio FROM departamentos WHERE id_departamento = '$departamento'";

    $result = mysqli_query($connection, $consultaSql);
    
    $string = "<label>Municipios</label>
                <select name='selectMunicipios' id='selectMunicipios' class='selectMunicipios'>";
                while($res=mysqli_fetch_row($result)){
                    $string = $string.'<option value='.$res[0].'>'.utf8_encode($res[2]).'</option>';
                };

    echo $string."</select>";

?>