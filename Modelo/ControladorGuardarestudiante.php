<?php

require_once ('../Modelo/ModeloEstudiante.php');


if(isset($_POST['nombreestudiante'])&&isset($_POST['apellidoestudiante'])&&isset($_POST['correoestudiante'])&&isset($_POST['cedulaestudiante'])&&isset($_POST['emailestudiante'])&&isset($_POST['nombreacudiente'])&&isset($_POST['apellidoacudiente'])&&isset($_POST['correoacudiente'])&&isset($_POST['emailacudiente'])&&isset($_POST['cedulacudiente']) &&isset($_POST['tipoidacudiente'])&&isset($_POST['tipoidacudiente'])  ){

    echo $_POST['nombreestudiante'];
    $estudiante=new Estudiante();
    $estudiante->Guardar($_POST['nombreestudiante'],$_POST['apellidoestudiante'],$_POST['cedulaestudiante'],$_POST[' tipoidestudiante'],$_POST['contraseñaestudiante'],$_POST['correoestudiante'],$_POST['correoestudiante '],$_POST['nombreacudiente'],$_POST['apellidoacudiente'],$_POST['tipoidacudiente'],,$_POST['contraseñaacudiente'],$_POST['correoacudiente'])


}

?>