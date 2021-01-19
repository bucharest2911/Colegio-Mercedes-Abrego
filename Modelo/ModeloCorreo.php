
<?php
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;
 require 'PHPMailer/PHPMailer.php';
 require 'PHPMailer/SMTP.php';
 require 'PHPMailer/exception.php';

class Correo {



    public function actualizar($codigo,$email){
      
        $sql="UPDATE cuenta set codigo=$codigo  where email=:email";
        $statement=$pdo->prepare(sql);
        $statement->execute(array('email'=>$email));
         if($statement->rowCount()){
             echo 'dato actualizado';
         } else{
             echo ' ningun dato actualizado';
         }

    }

    public function actualizarcontraseña($codigo,$contraseña){
        require_once("Conectar.php");
        
        $statement=$pdo->prepare("UPDATE cuenta set contraseña=$contraseña  where codigo=:codigo");
        $statement->execute(array('codigo'=>$codigo));
         if($statement->rowCount()){
             echo 'dato actualizado';
         } else{
             echo ' ningun dato actualizado';
         }
    }




public function IniciarSesion($usuario,$contraseña){
    $correcto=false;
   // echo $usuario;
    require_once("Conectar.php");
    $contador=0;
    $consulta=$pdo->prepare('SELECT * from cuenta WHERE email= :email ' );
     $consulta->execute(array(':email'=>$usuario));
     //$r//ows=$consulta->fetchALL(\PDO::FETCH_ASSOC);
    
      

     while( $rows=$consulta->fetch(\PDO::FETCH_ASSOC)){

  //      echo   $rows['email'];
         if(password_verify($contraseña,$rows['contraseña'])){
$contador++;
 
         }
     }
     
 
     if($contador>0){
         echo 'registrado';
         
       
     
 
     } else{
       echo ' no registrado';
     }
}



    public function EnviarMail($email,$enlace,$codigo){
    require_once("Conectar.php");
    $correcto=false;
$consulta=$pdo->prepare('SELECT * from cuenta WHERE email= :email ' );
 $result=$consulta->execute(array(':email'=>$email));
 $rows=$consulta->fetchALL(\PDO::FETCH_OBJ);
  
 if(count($rows)){
     echo "si existe";
    //// $destinatario=$email;
//$desde='De:Colegio ';   
//$asunto="correo de verificacion \n"  ;
$mensaje=" Para poder cambiar la contraseña debe: \n ";
$mensaje .="Entre al siguiente enlace:$enlace  \n";
$mensaje .="y coloque el siguiente  $codigo";
//mail($destinatario,$asunto,$mensaje);
$mail = new PHPMailer(true);

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
    $mail->setFrom('ignizero1995@gmail.com', 'Mailer');
    $mail->addAddress($email, 'Joe User');     // Add a recipient
   // $mail->addAddress('ellen@example.com');               // Name is optional
   // $mail->addReplyTo('info@example.com', 'Information');
   // $mail->addCC('cc@example.com');
   // $mail->addBCC('bcc@example.com');

    // Attachments
 //   $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
   // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Correo de verificacion';
    $mail->Body    =  $mensaje;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
   // $this->actualizar($codigo,$email);
      
 $dato='hola';
   $statement=$pdo->prepare("UPDATE cuenta set codigo='$codigo'  where email=:email");
   $statement->execute(array(':email'=>$email));
    if($statement->rowCount()){
        echo 'dato actualizado';
    } else{
        echo ' ningun dato actualizado'.$statement->rowCount();
    }
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
 echo json_encode("se envio correctamente");
 
 
 } else{
     echo "el usuario no existe en la base de datos";
 }

  
 
      }

     


}


?>