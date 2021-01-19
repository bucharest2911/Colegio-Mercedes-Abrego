<?php

 
 
 
 
  

if(isset($_POST['usuario']) && isset($_POST['password'])){
    $user=$_POST['usuario'];
    $contraseña=$_POST['password'];
    $encriptar_contraseña=password_hash($contraseña,PASSWORD_DEFAULT,array("cost"=>12));

    echo $encriptar_contraseña;
   $separar=substr($encriptar_contraseña,32);
    if($user===''|| $contraseña===''){
       echo json_encode('llena los campos');
      }else{
      
        
       echo    json_encode("Usuarios");

       require_once ('../Modelo/ModeloUsuario.php');
       $ul=new usuarios_modelo();
       $ul->InsertarUsuario($user,$encriptar_contraseña);
      }
       

       //$usuario->InsertarUsuario($user,$contraseña);
}
 
//$insertarusuario=new ModeloUsuario($user,$contraseña);



?>