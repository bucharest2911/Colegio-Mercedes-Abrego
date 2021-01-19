<?php


Class Grado {

    
    public function MostrarGrado(){
        require_once("Conectar.php");
        $consulta=$pdo->prepare(' SELECT * from grado' );
        $consulta->execute();
        $json=array();
  if($consulta){
     
  
    while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
     // echo 'hecho' .$fila['nombre']  ;
     
    $json[]=$fila;
     
    }
    echo json_encode($json);
  }else{
    echo 'no';
  }
        
   
      }

   


public function MostrarSalon(){
    require_once("Conectar.php");
    $consulta=$pdo->prepare('       select gradogrupo.id, grado.nombre_grado, grupo.nombre_grupo
    from grado, grupo, gradogrupo
    where grado.id = gradogrupo.id_grado
    and gradogrupo.id_grupo = grupo.id' );
    $consulta->execute();
    $json=array();
if($consulta){
 

while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
 // echo 'hecho' .$fila['nombre']  ;
 
$json[]=$fila;
 
}
echo json_encode($json);
}else{
echo 'no';
}
    

  }
     
        public function MostrarGrupo(){
            require_once("Conectar.php");
            $consulta=$pdo->prepare(' SELECT * from grupo' );
            $consulta->execute();
            $json=array();
      if($consulta){
         
      
        while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
         // echo 'hecho' .$fila['nombre']  ;
         
        $json[]=$fila;
         
        }
        echo json_encode($json);
      }else{
        echo 'no';
      }
            
       
          }

          public function ListarSalon(){
            require_once("Conectar.php");
            $consulta=$pdo->prepare(' select persona.nombre, persona.apellido, tipoidentificacion.tipo_identificacion, persona.numero_identificacion, persona.email from persona, tipopersona, tipoidentificacion where  3=tipopersona.id and tipopersona.id =persona.tipo_persona  and persona.tipo_identificacion = tipoidentificacion.id ' );
            $consulta->execute();
            $json=array();
      if($consulta){
         
      
        while($fila=$consulta->fetch(PDO::FETCH_ASSOC)){
         // echo 'hecho' .$fila['nombre']  ;
         
        $json[]=$fila;
         
        }
        echo json_encode($json);
      }else{
        echo 'no';
      }
          }
     
}




?>