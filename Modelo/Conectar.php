 <?php
  $host        = "host=127.0.0.1";
  $port        = "port=5432";
  $dbname      = " colegio";
$pdo=new PDO( "pgsql:host=127.0.0.1;port=5432;dbname=$dbname;user=postgres;password=noteimporta2911");
$pdo-> setAttribute (PDO :: ATTR_ERRMODE, PDO :: ERRMODE_EXCEPTION);
//$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
//$con=pg_connect("host=127.0.0.1 port=5432 dbname=$dbname user=postgres password=noteimporta2911");
?>