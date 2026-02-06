<?php
declare(strict_types=1);

$host = "localhost"; //hostname
$db = "lab-1"; //database name
$user = "root"; //username
$password = "1234"; //password

//Database
$dsn = "mysql:host=$host;dbname=$db";
//Error checking

//CONNECTED
try{
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<p> Welldone! You got connected </p>";
}
//ERROR
catch(PDOException $e){
    die("Database connection failed: " . $e->getMessage());
}