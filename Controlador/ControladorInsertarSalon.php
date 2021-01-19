<?php


if(isset($_POST['selecciongrado']) && isset($_POST['selecciongrupo'])){
    $grado=$_POST['selecciongrado'];
    $grupo=$_POST['selecciongrupo'];

    echo $grado;
}


?>