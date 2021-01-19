<?php
class MateriaDocente{



    public function Matriculardocente($idprofesor,$idmateria){
        require_once('conectar.php');
 
        $consulta=$pdo->prepare("INSERT INTO profesormateria (id_profesor,id_materia,fecha)  VALUES(".$idprofesor.",".$idmateria.",current_date) ");
         
        
        $consulta->execute();   
    }
}


?>