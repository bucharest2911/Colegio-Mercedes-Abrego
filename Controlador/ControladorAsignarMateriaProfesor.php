<?php
 
require_once ('../Modelo/ModeloProfesorGrado.php');
 
 
if (isset($_POST['materiaseleccion']) ) 
{ 
    $idmateria=$_POST['materiaseleccion'];
// Instructions if $_POST['value'] exist 
$grado=new ProfesorGrado();
$grado->Obtenerdocentes($_POST['materiaseleccion']);

//$grado->Asignardocentegrado($_POST['materiaseleccion'],$_POST['gradoseleccion'],$_POST['docenteseleccion']);

} 
 
 
    

 
?>