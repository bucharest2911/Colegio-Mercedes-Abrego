<?php

require_once('../Modelo/ModeloGuardarDocente.php');
if(isset($_POST['ceduladocente'])){
    echo $_POST['ceduladocente'];
$doc=new Docente();
$doc->EliminarDocente($_POST['ceduladocente']);
}

?>