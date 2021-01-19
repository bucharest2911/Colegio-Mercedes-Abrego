
 <?php
 class conexion {
     
 
   
  private $dbi;
  private $n;
  public function Conectar(){
    $host        = "host=127.0.0.1";
    $port        = "port=5432";
    $dbname      = " Colegio";
    $credentials = "user = postgres password=noteimporta2911";

    $dsn = "pgsql:host=127.0.0.1;port=5432;dbname=$dbname;user=postgres;password=noteimporta2911";
 
    try{
     // create a PostgreSQL database connection
     $conn = new PDO($dsn);
     
     // display a message if connected to the PostgreSQL successfully
     if($conn){
     echo "Connected to the <strong>$dbname</strong> database successfully!";
     }
      
   }catch (PDOException $e){
     // report error message
     echo  $e->getMessage();
    }
    return $conn;
 }

 public function  Conecta(){
   $pdo=new PDO('pgsql:host=127.0.0.1;port=5432;dbname=usuario',"postgres","noteimporta2911");
 return $dbi;
 }
 
}
  
 
?>
 
 