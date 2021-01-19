<?php
  require_once ('../Modelo/ModeloEstudiante.php'); 


  if(isset($_POST['acudiente']  )){
    $estudiante=new Estudiante();
    $estudiante->buscaracudiente($_POST['acudiente']);
  }
  

?>