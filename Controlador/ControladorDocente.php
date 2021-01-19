<?php
require_once ('../Modelo/ModeloGuardarDocente.php');



 
if(isset($_POST['nombre'])&& isset($_POST['apellido'])  &&isset($_POST['tipo_identificacion'])   &&isset($_POST['numero_identificacion'])  && isset($_POST['tipo_persona']) && isset($_POST['contraseña'])  && isset($_POST['email']) ){
   $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    
    $tipo_identificacion=(int)$_POST['tipo_identificacion'];
    $numero_identificacion= (int)$_POST['numero_identificacion'];
    $email=$_POST['email'];
     $contraseña=$_POST['contraseña'];
    $tipo_persona=(int)$_POST['tipo_persona'];
    
  echo 'nombre'.$nombre.'contraseña'.$contraseña;
  
 $docente=new Docente();
     $docente->Registrardocente($nombre,$apellido,$tipo_identificacion,$numero_identificacion,$tipo_persona,$contraseña,$email);
    
}

 
 

?>