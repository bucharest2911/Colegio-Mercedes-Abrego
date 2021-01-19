<?php
require_once ('../Modelo/ModeloMateria.php');

 


if(isset($_POST['seleccion'])&& isset($_POST['seleccionado'])){

    $seleccion=(int)$_POST['seleccion'];
    $seleccionado=$_POST['seleccionado'];
     
    $m=new Materia();
    $m->ListarDocente($seleccion,$seleccionado);
}


 


?>