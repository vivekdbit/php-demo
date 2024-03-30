<?php


$host ="mysql:host=localhost;dbname=roster_db";
$username="root";
$password="1234";

try{
    $pdo = new PDO($host, $username, $password);
    $pdo ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    echo "Connection failed: ". $e->getMessage();
}