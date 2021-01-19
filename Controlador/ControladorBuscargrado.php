<?php
require_once('../Modelo/ModeloGuardarDocente.php');
if(isset($_POST['grado'])){
    $docente=new Docente();

    //echo $_POST['materia'];
$docente->buscargrado($_POST['grado']);
}




?>