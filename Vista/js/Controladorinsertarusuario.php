<?php

//require_once("../Modelo/ModeloUsuario.php");

$user=$_POST['usuario'];
$contraseña=$_POST['password'];
echo $user;
if($user===''|| $contraseña===''){
    echo json_encode('llena los campos');
}else{
    echo json_encode('Correcto:');
}
//$insertarusuario=new ModeloUsuario($user,$contraseña);



?>