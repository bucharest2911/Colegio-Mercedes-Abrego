<?php

require_once ('../Modelo/ModeloEstudiante.php');
 

if(  isset($_POST['nombreacudiente']) && isset($_POST['apellidoacudiente']) && isset($_POST['correoacudiente']) && isset($_POST['tipoidacudiente']) && isset($_POST['cedulaacudiente'] ) && isset($_POST['contraseñaacudiente'])      ){
echo 'hola';

 
    $estudiante=new Estudiante();
    $estudiante->Guardaracudiente($_POST['nombreacudiente'],$_POST['apellidoacudiente'],$_POST['tipoidacudiente'] ,$_POST['cedulaacudiente'],$_POST['contraseñaacudiente'] ,$_POST['correoacudiente'],4);


}






?>