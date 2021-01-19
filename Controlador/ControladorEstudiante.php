<?php
  require_once ('../Modelo/ModeloEstudiante.php'); 
if(isset($_POST['nombreestudiante']) && isset($_POST['apellidoestudiante'])  && isset($_POST['correoestudiante'])  && isset($_POST['tipoidestudiante']) && isset($_POST['correoestudiante']) && isset($_POST['contraseñaestudiante'])  &&  isset($_POST['acudiente']) && isset($_POST['gradogrupo']) ){

   
    echo 'hola';
//echo $idacudiente;
    $estudiante=new Estudiante();
    $estudiante->GuardarEs($_POST['nombreestudiante'],$_POST['apellidoestudiante'],$_POST['tipoidestudiante'],$_POST['cedulaestudiante'],$_POST['contraseñaestudiante'],$_POST['correoestudiante'],4,$_POST['acudiente'],$_POST['gradogrupo']);
}

?>