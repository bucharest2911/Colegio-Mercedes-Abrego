
<?php
function generarCodigo($longitud) {
    $key = '';
    $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
    $max = strlen($pattern)-1;
    for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
    return $key;
   }

   echo   generarCodigo(6);
require_once ('../Modelo/ModeloCorreo.php');
 



if(isset($_POST['correo'])){
    $correo=$_POST['correo'];
    
    
  $enlace="http://localhost/Colegio-Mercedes/Vista/confirmar.html";
    $c=new Correo();
    $c->EnviarMail($correo,$enlace,generarCodigo(6));

    echo json_encode('hecho');
}
 


?>