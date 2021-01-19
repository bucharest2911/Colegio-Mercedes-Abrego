<?php
require_once('../Modelo/ModeloGuardarDocente.php');
if(isset($_POST['materia'])){
    $docente=new Docente();

    //echo $_POST['materia'];
$docente->buscarmateria();

}



?>