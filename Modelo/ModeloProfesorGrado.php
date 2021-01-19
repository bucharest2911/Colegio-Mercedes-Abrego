<?php

class ProfesorGrado {




    public function  Obtenerdocentes($idmateria){
        require_once('conectar.php');
         
        $consulta=$pdo->prepare(" select profesormateria.id, persona.nombre, persona.apellido from persona, profesormateria
        where ".$idmateria." = profesormateria.id_materia
        and profesormateria.id_profesor = persona.id  ");

         
        $consulta->execute();
        $json=array();
        $rows=$consulta->fetchALL(\PDO::FETCH_OBJ);
        // echo $seleccion;
          if(count($rows)){
               foreach($rows as $docente){
                  
$json[]=$rows;
                  // echo json_encode($rows);
               }
               echo json_encode($rows);
          } else {
              echo ' no existe';
          }
    }


    public function Asignardocentegrado($idprofesor,$idgrupo){

    require_once('conectar.php');
       // $consulta=$pdo->prepare("INSERT INTO profesormateriagradogrupo (id_profesormateria,id_gradogrupo)  VALUES( ?,? ) ");
         
    $consulta=$pdo->prepare("INSERT INTO profesormateriagradogrupo (id_profesormateria, id_gradogrupo)  VALUES(".$idprofesor." , ".$idgrupo.") ");
       
      
    $consulta->execute();   
        
      //  $consulta->execute();   
    }

    public function Listargradoprofesor(){


        require_once('conectar.php');
         
        $consulta=$pdo->prepare(" select profesormateriagradogrupo.id, persona.nombre, materia.nombre_materia, grado.nombre_grado, grupo.nombre_grupo
        from persona, materia, profesormateria, tipopersona, profesormateriagradogrupo, gradogrupo, grado,grupo
        where 3 = tipopersona.id 
        and tipopersona.id = persona.tipo_persona
        and persona.id = profesormateria.id_profesor
        and profesormateria.id_materia = materia.id
        and profesormateria.id = profesormateriagradogrupo.id_profesormateria
        and profesormateriagradogrupo.id_gradogrupo = gradogrupo.id
        and gradogrupo.id_grupo = grupo.id
        and gradogrupo.id_grado = grado.id ");

         
        $consulta->execute();
        $json=array();
        $rows=$consulta->fetchALL(\PDO::FETCH_OBJ);
        // echo $seleccion;
          if(count($rows)){
               foreach($rows as $docente){
                  
$json[]=$rows;
                  // echo json_encode($rows);
               }
               echo json_encode($rows);
          } else {
              echo ' no existe';
          }

         
    }

}


 



?>