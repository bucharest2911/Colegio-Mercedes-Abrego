<?php


class Estudiante {
  
    

public function Guardaracudiente($nombre,$apellido,$tipo_identificacion,$numero_identificacion,$contraseña,$email,$tipo){
  require_once("Conectar.php");
  //$consulta=$pdo->prepare("INSERT INTO persona (nombre,apellido,tipo_identificacion,numero_identificacion,tipo_persona,id_acudiente,contraseña, email)  VALUES(:nombre,:apellido,:tipo_identificacion,:numero_identificacion,:tipo_persona,:id_acudiente,:contraseña, :email) ");
//    echo $nombre;
//$sql='INSERT INTO persona (nombre,apellido,tipo_identificacion,numero_identificacion,tipo_persona,id_acudiente,contraseña,email) VALUES (:nombre,:apellido,:tipo_identificacion,:numero_identificacion,:tipo_persona,:id_acudiente,:contraseña,:email)';
   $consulta=$pdo->prepare("INSERT INTO persona (nombre,apellido,tipo_identificacion,numero_identificacion,tipo_persona,contraseña, email)  VALUES( ?,?,?,?,?,?,?) ");
// $consulta=$pdo->prepare($sql);
$consulta->bindParam( 1,$nombre);
$consulta->bindParam( 2,$apellido);
$consulta->bindParam( 3 ,$tipo_identificacion  );
$consulta->bindParam( 4 ,$numero_identificacion) ;
$consulta->bindParam(5 ,$tipo);

$consulta->bindParam( 6 ,$contraseña);
$consulta->bindParam( 7 ,$email);
$consulta->execute();
}



public function GuardarEs($nombre,$apellido,$tipo_identificacion,$numero_identificacion,$contraseña,$email,$tipo,$id_acudiente,$grado){
  require_once("Conectar.php");
  //$consulta=$pdo->prepare("INSERT INTO persona (nombre,apellido,tipo_identificacion,numero_identificacion,tipo_persona,id_acudiente,contraseña, email)  VALUES(:nombre,:apellido,:tipo_identificacion,:numero_identificacion,:tipo_persona,:id_acudiente,:contraseña, :email) ");
//    echo $nombre;
//$sql='INSERT INTO persona (nombre,apellido,tipo_identificacion,numero_identificacion,tipo_persona,id_acudiente,contraseña,email) VALUES (:nombre,:apellido,:tipo_identificacion,:numero_identificacion,:tipo_persona,:id_acudiente,:contraseña,:email)';
   $consulta=$pdo->prepare("INSERT INTO persona (nombre,apellido,tipo_identificacion,numero_identificacion,tipo_persona,id_acudiente,contraseña, email)  VALUES( ?,?,?,?,?,?,?,?) ");
// $consulta=$pdo->prepare($sql);
$consulta->bindParam( 1,$nombre);
$consulta->bindParam( 2,$apellido);
$consulta->bindParam( 3 ,$tipo_identificacion  );
$consulta->bindParam( 4 ,$numero_identificacion) ;
$consulta->bindParam(5 ,$tipo);
$consulta->bindParam(6 ,$id_acudiente);
$consulta->bindParam( 7 ,$contraseña);
$consulta->bindParam( 8 ,$email);
$consulta->execute();

$consulta=$pdo->prepare(' SELECT  id from persona where numero_identificacion = '.$numero_identificacion );
 $consulta->execute();
 $json=array();
 
  $capturar=0;
 if($consulta){


    while($fila=$consulta->fetch(PDO::FETCH_OBJ)){
     // echo 'hecho' .$fila['nombre']  ;
     
    $json[]=$fila;
    // echo $fila->id;
     $capturar=$fila->id;
    }
    echo $capturar;

    $consulta=$pdo->prepare("INSERT INTO estudiantesalon (id_estudiante, id_gradogrupo)  VALUES(".$capturar.",".$grado.") ");
       
      
    $consulta->execute();   
    

}



}







    public function buscaracudiente($id){
        require_once("Conectar.php");
        $correcto=false;
    $consulta=$pdo->prepare('SELECT * from persona, tipopersona WHERE numero_identificacion= :numero_identificacion ' );
     $result=$consulta->execute(array(':numero_identificacion'=>$id));
   //  $rows=$consulta->fetchALL(\PDO::FETCH_OBJ);
     $json=array();
     
      
     if($consulta){
   

        while($fila=$consulta->fetch(PDO::FETCH_OBJ)){
         // echo 'hecho' .$fila['nombre']  ;
         
        $json[]=$fila;
         
        }
        echo json_encode($json);
      }else{
        echo 'no';
      }
    
 
    
    }

    public function GuardarEstudiante($nombreestudiante,$apellidoestudiante,$cedulaestudiante,$tipoeidstudiante,$contraseñaestudiante,$correoestudiante,$nombreacudiente,$apellidoacudiente,$tipoidacudiente,$cedulacudiente,$correacudiente,$contraseñaacudiente){
      echo 'hola';
        require_once("Conectar.php");
        $correcto=false;
    $consulta=$pdo->prepare('SELECT * from persona, tipopersona WHERE numero_identificacion= :numero_identificacion and tipopersona.id=2' );
     $result=$consulta->execute(array(':numero_identificacion'=>$cedulaacudiente));
   //  $rows=$consulta->fetchALL(\PDO::FETCH_OBJ);
     $json=array();
     
      
     if($consulta){
   
        echo 'si estoy';
        //$consulta=$pdo->prepare("INSERT INTO persona (nombre,apellido,tipo_identificacion,numero_identificacion,tipo_persona,id_acudiente,contraseña, email)  VALUES(:nombre,:apellido,:tipo_identificacion,:numero_identificacion,:tipo_persona,:id_acudiente,:contraseña, :email) ");
     //    echo $nombre;
    //$sql='INSERT INTO persona (nombre,apellido,tipo_identificacion,numero_identificacion,tipo_persona,id_acudiente,contraseña,email) VALUES (:nombre,:apellido,:tipo_identificacion,:numero_identificacion,:tipo_persona,:id_acudiente,:contraseña,:email)';
         $consulta=$pdo->prepare("INSERT INTO persona (nombre,apellido,tipo_identificacion,numero_identificacion,tipo_persona,contraseña, email,id_acudiente)  VALUES( ?,?,?,?,?,?,?) ");
      // $consulta=$pdo->prepare($sql);
     $consulta->bindParam( 1,$nombreestudiante);
     $consulta->bindParam( 2,$apellidoestudiante);
      $consulta->bindParam( 3 ,$tipoidestudiante  );
      $consulta->bindParam( 4 ,$cedulaestudiante) ;
    $consulta->bindParam(5 ,4);
     
      $consulta->bindParam( 6 ,$contraseñaestudiante);
     $consulta->bindParam( 7 ,$email);
     $consulta->bindParam( 8 ,$cedulaacudiente);

     $consulta->execute();
    
         
        
         
        }
       
      else{


echo 'no estoy';



    

        $consulta=$pdo->prepare("INSERT INTO persona (nombre,apellido,tipo_identificacion,numero_identificacion,tipo_persona,contraseña, email,id_acudiente)  VALUES( ?,?,?,?,?,?,?) ");
        // $consulta=$pdo->prepare($sql);
       $consulta->bindParam( 1,$nombreacudiente);
       $consulta->bindParam( 2,$apellidoacudiente);
        $consulta->bindParam( 3 ,$tipoacudiente  );
        $consulta->bindParam( 4 ,$cedulaacudiente) ;
      $consulta->bindParam(5 ,4);
       
        $consulta->bindParam( 6 ,$contraseñaacudiente);
       $consulta->bindParam( 7 ,$emailacudiente);
       $consulta->bindParam( 8 ,$cedulaacudiente);
  
       $consulta->execute();


       $consultaacudiente=$pdo->prepare("INSERT INTO persona (nombre,apellido,tipo_identificacion,numero_identificacion,tipo_persona,contraseña, email,id_acudiente)  VALUES( ?,?,?,?,?,?,?) ");
       // $consulta=$pdo->prepare($sql);
      $consultaacudiente->bindParam( 1,$nombreestudiante);
      $consultaacudiente->bindParam( 2,$apellidoestudiante);
       $consultaacudiente->bindParam( 3 ,$tipoidestudiante  );
       $consultaacudiente->bindParam( 4 ,$cedulaestudiante) ;
     $consultaacudiente->bindParam(5 ,2);
      
       $consultaacudiente->bindParam( 6 ,$contraseñaaestudiante);
      $consultaacudiente->bindParam( 7 ,$email);
      $consultaacudiente->bindParam( 8 ,$cedulaacudiente);
 
      $consultaacudiente->execute();


      }
    
 
    
    }



}






 




?>