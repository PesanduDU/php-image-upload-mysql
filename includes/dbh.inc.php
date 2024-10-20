<?php

$dsn = "mysql:host=localhost;dbname=upload_images";
$dbusername = "root";
$dbpassword = "Asusf15@123";

try {

    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (PDOException $e) {
    die ("Connection Failed!! : " . $e->getMessage());
}

// $con=mysqli_connect('localhost', 'root', 'Asusf15@123', 'upload_images');

// if ($con){
//     echo "Connection Successful!";
// } else {
//     die("Connection failed: " . mysqli_connect_error());
// }