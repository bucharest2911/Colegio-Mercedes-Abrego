<?php

require_once('../Modelo/ModeloGuardarDocente.php');
if(isset($_POST['materiaseleccion']   ) && $_POST['gradoseleccion']  && $_POST['detalle'] && $_POST['nombreactividad']) {
  
    $docente=new Docente();

    
    $docente->Buscarmateriagrupo($_POST['gradoseleccion'],$_POST['materiaseleccion'],$_POST['detalle'],$_POST['nombreactividad']);

}

?>