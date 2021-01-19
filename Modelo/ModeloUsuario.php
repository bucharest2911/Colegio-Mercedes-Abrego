<?php
 
class usuarios_modelo{
    private $db;
    private $usuarios;

    public function __construct(){
 
  // $bar =new Conexion();
  // $bar->Conectar();
   
     
    
    
}

 
    public function InsertarUsuario($nombre,$contraseña){
        
        require_once("Conectar.php");
      $consulta=$pdo->prepare("INSERT INTO cuenta (email,contraseña)  VALUES(?,?) ");
   
$consulta->bindParam( 1,$nombre);
$consulta->bindParam( 2,$contraseña);
$consulta->execute();
    }
}
 
?>