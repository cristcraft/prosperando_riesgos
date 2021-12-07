<?php


$referencia = $_POST['referencia'];

    $string = '';
    $string = $string.'<div class="referencia">
    <label for="referencia">Referencia</label>
    <input value="'.$referencia.'" disabled>';
    echo $string."</div>";


?>