<?php

require_once ('../Modelo/Modeloasignarmateria.php');

 
if(isset($_POST['materiaid'])&& isset($_POST['profesorid'])){
    $idmateria=$_POST['materiaid'];
    $idprofesorid=$_POST['profesorid'];
    $m=new MateriaDocente();
 $m->Matriculardocente($idprofesorid,$idmateria);
    
}


?>