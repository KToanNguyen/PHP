<?php 
declare(strict_types=1); 

$host = "127.0.0.1:3308"; 
$db = "resume"; 
$user = "root"; 
$password = ""; 

$dsn = "mysql:host=$host;dbname=$db";

try {
   $pdo = new PDO ($dsn, $user, $password); 
   $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
   echo "<p> You have been connected! </p>"; 
}
 
catch(PDOException $e) {
    die("Database connection failed: " . $e->getMessage()); 
}
//Connection to database
