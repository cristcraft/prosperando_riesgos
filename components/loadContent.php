<?php 
    require_once("../connection/connection.php");

    $selects = $_POST['selects'];
    $titulo = $_POST['titulo'];
    $lista_dependiente = $_POST['lista_dependiente'];

    $consultaSql = "SELECT * FROM $selects";
    $sqlResult = $connection->query($consultaSql);

    if($lista_dependiente === 'true'){
        
        $string = "<div class='mb-3'>
            <label class='  form-label' for='$selects'>$titulo</label>
                <select name='$selects' id='$selects' class='form-select'>
                <option value='0'>Selecciona una opcion</option>";
                while($row = $sqlResult ->fetch_assoc()){ 
                    $string = $string.'<option value='.$row['id'].'>'.$row[$selects].'</option>';
                };

        echo $string."</select></div>";
        
    }
    if($lista_dependiente === 'false'){

        $string = "<div class='mb-3' >
                <label class='form-label' for='$selects'>$titulo</label>
                    <select name='$selects'  class='form-select'>";
                    while($row = $sqlResult ->fetch_assoc()){ 
                        $string = $string.'<option value='.$row[$selects].'>'.$row[$selects].'</option>';
                    };

        echo $string."</select></div>";
    }
?>


