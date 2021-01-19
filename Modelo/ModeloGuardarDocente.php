<?php
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;
 require 'PHPMailer/PHPMailer.php';
 require 'PHPMailer/SMTP.php';
 require 'PHPMailer/exception.php';

Class Docente {



    public function Registrardocente($nombre,$apellido,$tipo_identificacion,$numero_identificacion,$tipo_persona ,$contraseña,$email){
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
$consulta->bindParam(5 ,$tipo_persona);
 
  $consulta->bindParam( 6 ,$contraseña);
 $consulta->bindParam( 7 ,$email);
 $consulta->execute();

 //$consulta->execute([     ':nombre'=>$nombre,':apellido'=>$apellido,':tipo_identificacion'=>$tipo_identificacion,':numero_identificacion'=>$numero_identificacion,':tipo_persona'=>$tipo_persona,':id_acudiente'=>$id_acudiente,':contraseña'=>$contraseña,':email'=>$email]);
 echo 'hecho';
 // $consulta->execute(array(
//'nombre'=>$nombre,
//'apellido'=>$apellido,
////'numero_identificacion'=>$n_id,
///'tipo_persona'=>$tipo_persona,
//'id_acudiente '=>$ida,
//'contraseña  '=>$contraseña,
//'email'=>$email,

 // ));
 

 // $sql="INSERT INTO persona (nombre,apellido,tipo_identificacion,numero_identificacion,tipo_persona,contraseña, email)  VALUES('$nombre','$apellido','$tipo_identificacion','$numero_identificacion','$tipo_persona',    '$contraseña', '$email') ";
//$con=pg_query($sql);

 // $consulta->bindParam( 8 ,$email);
 // $resultado=$consulta->fetchAll();
//echo json_encode($resultado);
  //$consulta->execute();
 
    }

    public function MostrarDocente(){
      require_once("Conectar.php");
      $consulta=$pdo->prepare(' select persona.nombre, persona.apellido, tipoidentificacion.tipo_identificacion, persona.numero_identificacion, persona.email from persona, tipopersona, tipoidentificacion where  3=tipopersona.id and tipopersona.id =persona.tipo_persona  and persona.tipo_identificacion = tipoidentificacion.id ' );
      $consulta->execute();
      $json=array();
if($consulta){
   

  while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
   // echo 'hecho' .$fila['nombre$fi']  ;
   
  $json[]=$fila;
   
  }
  echo json_encode($json);
}else{
  echo 'no';
}
      
 
    }


    public function IniciarSesion($usuario,$contraseña){
      $correcto=false;
     // echo $usuario;
      require_once("Conectar.php");
echo 'sesion';
    //  echo $usuario;
      $contador=0;
      $consulta=$pdo->prepare('SELECT * from persona  WHERE numero_identificacion= :numero_identificacion ' );
      $result=$consulta->execute(array(':numero_identificacion'=>$usuario));
    //  $rows=$consulta->fetchALL(\PDO::FETCH_OBJ);
      $json=array();
      
       
      if($consulta){
    
 
         while($fila=$consulta->fetch(PDO::FETCH_OBJ)){
          // echo 'hecho' .$fila['nombre']  ;
     echo   $fila->nombre;
     session_start();

     $_SESSION['id']=$fila->id;
          
         }
      //  echo json_encode($json);
       }else{
         echo 'no';
       }
      // $consulta->execute(array(':email'=>$usuario));
       //$/ows=$consulta->fetchALL(\PDO::FETCH_ASSOC);
       
  
       
       }
       
   



       public function buscarmateria(){
        require_once("Conectar.php");
        $correcto=false;
        session_start();
        $id=$_SESSION['id'];
        //echo $id;
    $consulta=$pdo->prepare('  select profesormateria.id, materia.nombre_materia from materia, profesormateria where
    '.$id.' = profesormateria.id_profesor
    and profesormateria.id_materia = materia.id' );
     $consulta->execute();
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


    public function buscargrado($grado){
      require_once("Conectar.php");
      $correcto=false;
     // session_start();
    //  $id=$_SESSION['id'];
      //echo $id;
  $consulta=$pdo->prepare('   select gradogrupo.id, grado.nombre_grado, grupo.nombre_grupo  from grado, grupo, gradogrupo, profesormateriagradogrupo where '.$grado.' = profesormateriagradogrupo.id_profesormateria and profesormateriagradogrupo.id_gradogrupo = gradogrupo.id and gradogrupo.id_grado = grado.id and gradogrupo.id_grupo = grupo.id' );
   $consulta->execute();
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



  public function  Buscarmateriagrupo($materia,$grupo,$nombre,$detalle){
    
    
    require_once("Conectar.php");
    $correcto=false;
    //session_start();
    //$id=$_SESSION['id'];
    //echo $id;
 
    
$consulta=$pdo->prepare(' SELECT  id from profesormateriagradogrupo
where profesormateriagradogrupo.id_gradogrupo ='   .$materia.'
and profesormateriagradogrupo.id_profesormateria = '.$grupo.'     ' );
 $consulta->execute();
//  $rows=$consulta->fetchALL(\PDO::FETCH_OBJ);
 $json=array();
 
  $capturar=0;
 if($consulta){


    while($fila=$consulta->fetch(PDO::FETCH_OBJ)){
     // echo 'hecho' .$fila['nombre']  ;
     
    $json[]=$fila;
    // echo $fila->id;
     $capturar=$fila->id;
    }
     


    $consulta=$pdo->prepare("INSERT INTO actividad (nombre_actividad, id_promagrugra, descripcion)  VALUES('".$nombre."',".$capturar.",'".$detalle."') ");
       
      
    $consulta->execute();   
    

  //  echo json_encode($json);
  }else{
    echo 'no';
  }

  //---------------------------------------------------------------------------------------
  $consulta=$pdo->prepare('SELECT  persona.nombre, persona.email from persona,  estudiantesalon,  gradogrupo,
	  profesormateriagradogrupo, tipopersona, profesormateria
where 4 = tipopersona.id
and persona.id = estudiantesalon.id_estudiante
and estudiantesalon.id_gradogrupo = gradogrupo.id
and gradogrupo.id = profesormateriagradogrupo.id_gradogrupo
and profesormateria.id = profesormateriagradogrupo.id_profesormateria
and profesormateriagradogrupo.id = '.$capturar );
  $consulta->execute();
  $vector=array();
  $mail = new PHPMailer(true);
  

  foreach($consulta as $row ){
echo $row['email'];




try {
  //Server settings
  $mail->SMTPDebug = 0;                                       // Enable verbose debug output
  $mail->isSMTP();                                            // Set mailer to use SMTP
  $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
  $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
  $mail->Username   = 'ignizero1995@gmail.com';                     // SMTP username
  $mail->Password   = 'noteimporta2911';                               // SMTP password
  $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
  $mail->Port       = 587;                                    // TCP port to connect to

  //Recipients
  $mail->setFrom('ignizero1995@gmail.com', 'Tarea');
  $mail->addAddress($row['email']  , $row['nombre']);     // Add a recipient
 // $mail->addAddress('ellen@example.com');               // Name is optional
 // $mail->addReplyTo('info@example.com', 'Information');
 // $mail->addCC('cc@example.com');
 // $mail->addBCC('bcc@example.com');

  // Attachments
//   $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
 // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

  // Content
  $mail->isHTML(true);                                  // Set email format to HTML
  $mail->Subject = $detalle;
  $mail->Body    =  $nombre ;
  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

  $mail->send();
 // $this->actualizar($codigo,$email);
    

  echo 'Message has been sent';
} catch (Exception $e) {
  echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}



  }

echo $capturar;
 
  $consulta=$pdo->prepare( '  SELECT persona.nombre , persona.email from persona where numero_identificacion =(SELECT  persona.id_acudiente from persona,  estudiantesalon,  gradogrupo,
  profesormateriagradogrupo, tipopersona, profesormateria
where 4 = tipopersona.id
and persona.id = estudiantesalon.id_estudiante
and estudiantesalon.id_gradogrupo = gradogrupo.id
and gradogrupo.id = profesormateriagradogrupo.id_gradogrupo
and profesormateria.id = profesormateriagradogrupo.id_profesormateria
and profesormateriagradogrupo.id ='.$capturar.')' );
$consulta->execute();
$vector=array();
$mail = new PHPMailer(true);


foreach($consulta as $row ){
echo $row['email'];




try {
//Server settings
$mail->SMTPDebug = 0;                                       // Enable verbose debug output
$mail->isSMTP();                                            // Set mailer to use SMTP
$mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
$mail->Username   = 'ignizero1995@gmail.com';                     // SMTP username
$mail->Password   = 'noteimporta2911';                               // SMTP password
$mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
$mail->Port       = 587;                                    // TCP port to connect to

//Recipients
$mail->setFrom('ignizero1995@gmail.com', 'Tarea');
$mail->addAddress($row['email']  , $row['nombre']);     // Add a recipient
// $mail->addAddress('ellen@example.com');               // Name is optional
// $mail->addReplyTo('info@example.com', 'Information');
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

// Attachments
//   $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

// Content
$mail->isHTML(true);                                  // Set email format to HTML
$mail->Subject = $detalle;
$mail->Body    =  $nombre ;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

$mail->send();
// $this->actualizar($codigo,$email);
  

echo 'Message has been sent';
} catch (Exception $e) {
echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}



}






  


 
    //$consulta=$pdo->prepare('  SELECT  id from profesormateriagradogrupo where profesormateriagradogrupo.id_gradogrupo =:profesormateriagradogrupo.id_gradogrupo and profesormateriagradogrupo.id_profesormateria =:profesormateriagradogrupo.id_profesormateria  ' );
    // $consulta->execute();
   //  $rows=$consulta->fetchALL(\PDO::FETCH_OBJ);
  
   //$bind = array('profesormateriagradogrupo.id_gradogrupo' => $materia, 'profesormateriagradogrupo.id_profesormateria  ' => $grupo);
    
   //$consulta->execute($bind);
    // $json=array();
     
    
   //  $result = $consulta->fetchAll(PDO::FETCH_ASSOC);

//echo $result['id'];





  }
    




  


public function EliminarDocente($id){
  require_once("Conectar.php");

  $arr = array();

  $consulta=$pdo->prepare("DELETE from persona where numero_identificacion =:numero_identificacion");
  $consulta->bindParam(':numero_identificacion', $id, PDO::PARAM_INT);
  $consulta->execute();
  $arr = array("hecho"=>"hecho");

  echo json_encode($arr);
}


        
  }


?>