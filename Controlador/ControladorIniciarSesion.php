  <?php
  
  
  require_once ('../Modelo/ModeloCorreo.php');



  if(isset($_POST['correo']) && isset($_POST['contraseña'])){
    $c=new Correo();
    $c->IniciarSesion($_POST['correo'],$_POST['contraseña']);
  }
 
  ?>