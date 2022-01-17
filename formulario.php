<?php

require_once('./connection/connection.php');

$consultaSql = "SELECT * FROM 	proceso_afectado ";
$result = mysqli_query($connection, $consultaSql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Formulario</title>
</head>

<body>

    <div class="content-fluid">
        <form action="" method="post">

            <div class="proceso_afectado mb-3">
                <label for="proceso_afectado" class="form-label">proceso_afectado</label>
                <select name="proceso_afectado" id="proceso_afectado" class="form-select mb-3"
                    aria-label="Default select example">
                    <option value="0">Seleccione una opcion</option>
                    <?php while($res=mysqli_fetch_row($result)){
            echo '<option value="'.$res[0].'">'.$res[1].'</option>';
        } ?>
                </select>
            </div>


            <div class="producto_servicio_afectado mb-3 d-none">
                <label for="producto_servicio_afectado" class="form-label">producto_servicio_afectado</label>
                <select name="producto_servicio_afectado" id="producto_servicio_afectado"
                    class="form-select mb-3 " aria-label="Default select example">
                    <option value="0">Seleccione una opcion</option>
                </select>
            </div>

            <div class="nombre_riesgo mb-3 d-none">
                <label for="nombre_riesgo" class="form-label">Nombre riesgo</label>
                <select name="nombre_riesgo" id="nombre_riesgo" class="form-select mb-3"
                    aria-label="Default select example">
                    <option value="0">Seleccione una opcion</option>
                </select>
            </div>

            <div class="referencia mb-3 ">
                <label for="referencia" class="form-label">Referencia</label>
            </div>

            <div class="clase_riesgo_operativo mb-3 d-none">
                <label for="clase_riesgo_operativo" class="form-label">clase_riesgo_operativo</label>
                <select name="clase_riesgo_operativo" id="clase_riesgo_operativo" class="form-select mb-3"
                    aria-label="Default select example">
                    <option value="0">Seleccione una opcion</option>
                </select>
            </div>

            <div class="causa mb-3 d-none">
                <label for="causa" class="form-label">causa</label>
                <select name="causa" id="causa" class="form-select mb-3"
                    aria-label="Default select example">
                    <option value="0">Seleccione una opcion</option>
                </select>
            </div>

            <div class="control mb-3 d-none">
                <label for="control" class="form-label">control</label>
                <select name="control" id="control" class="form-select mb-3"
                    aria-label="Default select example">
                    <option value="0">Seleccione una opcion</option>
                </select>
            </div>
        </form>
    </div>

    <div class="res" id="res"></div>

    <script src="./scripts/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>