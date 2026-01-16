<?php
declare(strict_types=1);

$host = "localhost"; //hostname
$db = "week_2"; //database name
$user = "root"; //username
$password = ""; //password

//points to the database
$dsn = "mysql:host=$host;dbname=$db";

try{
    $pdo = new PDO($dsn, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<p> CONNECTED!? </p>";
}
//what if there is an error
catch(PDOException $e){
    die("Database connection failed: " . $e->getMessage());
}