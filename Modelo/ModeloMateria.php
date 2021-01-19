<?php

class Materia {





public function ListarMateria(){
    require_once('conectar.php');
    $consulta=$pdo->prepare("SELECT  * from materia  ");
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
    public function ListarDocente($seleccion,$seleccionado){
        require_once('conectar.php');
        $json=array();
        if($seleccion==2){
  //echo $seleccionado;
            $consulta=$pdo->prepare("SELECT  * from persona where  tipo_persona=3 and nombre=:nombre");
 // $consulta->execute();
            $result=$consulta->execute(array(':nombre'=>$seleccionado));
            $rows=$consulta->fetchALL(\PDO::FETCH_OBJ);
          // echo $seleccion;
            if(count($rows)){
                 foreach($rows as $docente){
                    
 $json[]=$rows;
                     echo json_encode($rows);
                 }
            } else {
                echo ' no existe';
            }

        }else {
            if($seleccion==3){

                $consulta=$pdo->prepare("SELECT  * from persona where  tipo_persona=3 and numero_identificacion=:numero_identificacion");
                //$consulta->execute();
                $result=$consulta->execute(array(':numero_identificacion'=>(int)$seleccionado));
             $rows=$consulta->fetchALL(\PDO::FETCH_OBJ); 
             if(count($rows)){
             
                foreach($rows as $docente){
                   

                    echo json_encode($docente);
                }
            } else {
                echo ' no existe la Cedula';
            }

            }else{
                if($seleccion==4){
                    $consulta=$pdo->prepare("SELECT  * from persona where  tipo_persona=3 and email=:email");
              //  $consulta->execute();
                $result=$consulta->execute(array(':email'=>$seleccionado));
 $rows=$consulta->fetchALL(\PDO::FETCH_OBJ);
 
 if(count($rows)){
    echo 'existe Correo';
    foreach($rows as $docente){
        echo "apellido".$docente->apellido ;

        echo json_encode($docente);
    }
   
} else {
    echo ' no existe Correo';
}

                }
                
            }
        }
        

    }




    public function MostrarMateriaDocente(){
        require_once("Conectar.php");
        $consulta=$pdo->prepare('  select profesormateria.id, persona.nombre, materia.nombre_materia
        from persona, materia, profesormateria, tipopersona
        where 3 = tipopersona.id 
        and tipopersona.id = persona.tipo_persona
        and persona.id = profesormateria.id_profesor
        and profesormateria.id_materia = materia.id' );
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






    public function guardarMateria($nombremateria){
        require_once('conectar.php');

        $consulta=$pdo->prepare("INSERT INTO materia (nombre_materia)  VALUES(?) ");
        $consulta->bindParam( 1,$nombremateria);
        $consulta->execute();
    }
    public function AsignarMateriaDocente($iddocente,$idmateria){
        require_once('conectar.php');
 
        $consulta=$pdo->prepare("INSERT INTO profesormateria (id_profesor,id_materia,fecha)  VALUES(?,?,current_date) ");
         
        $consulta->bindParam( 1,(int)$iddocente);
        $consulta->bindParam( 2,intval($idmateria));
        
        $consulta->execute();
    }



}

?>