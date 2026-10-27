<?php
//Conexion a la base de datos

$host = getenv('DB_HOST');
$dbname   = getenv('DB_NAME');
$user = getenv('DB_USER');
$pass = getenv('DB_PASS');
$dsn  = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

try{
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch(PDOException $e){
    $error = $e->getCode();
    $mensaje=$e->getMessage();
}
?>