<?php
$host = 'localhost';
$db_name = 'biblioteca';
$username = 'root';
$password = '';

try{
   $pdo = new PDO('mysql:host=' . $host . ';dbname=' .$db_name . ';charset=utf8', $username, $password);
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   //echo("Conectado com sucesso ao '$db_name'");
   
} catch (PDOException $e){
   die("Erro ao conectar com o banco de dados: " .$e->getMessage());
}
?>