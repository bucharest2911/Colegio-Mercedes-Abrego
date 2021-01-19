<?php


 
require_once ('../Modelo/ModeloCorreo.php');
 
if(isset($_POST['codigo']) &&isset($_POST['contraseña']) ){
    $codigo=$_POST['codigo'];
    $contraseña=$_POST['contraseña'];
    
  $correo=new Correo();
  $correo->actualizarcontraseña($codigo,$contraseña);

    echo json_encode('hecho');
}





?>