<?php


 
 
require_once ('../Modelo/ModeloProfesorGrado.php');
 
 
if ( isset($_POST['docenteseleccion']) && isset($_POST['gradoseleccion']) ) 
{ 
   // $idmateria=$_POST['materiaseleccion'];
// Instructions if $_POST['value'] exist 
$grado=new ProfesorGrado();
//$grado->Obtenerdocentes($_POST['materiaseleccion']);
 
$grado->Asignardocentegrado( $_POST['docenteseleccion'],$_POST['gradoseleccion']);

} 
 
 
    

 

?>