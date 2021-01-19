<?php

require_once ('../Modelo/ModeloMateria.php');

 
if(isset($_POST['nombremateria'])){

    $materia=$_POST['nombremateria'];

    echo $materia;
    $m=new Materia();
    $m->guardarMateria($materia);
  
}
 
?>