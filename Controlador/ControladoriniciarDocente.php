<?php
require_once ('../Modelo/ModeloGuardarDocente.php');

if(isset($_POST['cedula']) && isset($_POST['contraseña'])){
    $c=new Docente();
   // echo $_POST['correo'];
    $c->IniciarSesion($_POST['cedula'],$_POST['contraseña']);
  }
?>