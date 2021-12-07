<?php 
    require_once("./connection/connection.php");
    require_once("./tables.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Lista dependiente</title>
</head>
<body>
    <h1>lista dependiente Prueba</h1>
    <div class="root" id="root">
        <form action="" method="post" id="form_principal">
            <div id="div_proceso_afectado"></div>
        </form>
        <hr>
        <div class="listasDependientes" id="listasDependientes"></div>
        <div class="subListasDependientes" id="subListasDependientes">
            <div id="nombre_del_riesgo"></div>
        </div>
        <div id="ref"></div>
        <div id="causa"></div>
        <hr>
        <div class="textarea" id="textarea"></div>
    </div>
    <script src="./scripts/main.js"></script>
    <script src="./scripts/loadContent.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>