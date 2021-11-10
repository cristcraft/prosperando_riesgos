<?php 
    require_once("./connection/connection.php");
    require_once("./tables/tables.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <title>Lista dependiente</title>
</head>
<body>
    <h1>lista dependiente</h1>
    <select name="departamentos" id="departamentos">
        <?php while($row = $canal_de_servicioResult -> fetch_assoc()){ ?>
            <option value="<? $row['canal_de_servicio'] ?>"><? $row['canal_de_servicio'] ?></option>
        <?php }?>
    </select>

    <hr>

    <div class="municipios" id="municipios"></div>
    <script src="./scripts/main.js"></script>
</body>
</html>