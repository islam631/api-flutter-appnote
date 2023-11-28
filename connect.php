<?php 
$dsn = "mysql:host=localhost;dbname=noteapp";
$user =  "root";
$pass = "";
$option =array(
    PDO::MYSQL_ATTR_INIT_COMMAND=> "SET NAMES UTF8"  // for arabic
);

try {

    $conn = new PDO($dsn,$user,$pass,$option);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With, Access-Control-Allow-Origin");
    header("Access-Control-Allow-Methods: POST, OPTIONS , GET");



    include "auth/functions.php";
    checkAuthenticate();


} catch (PDOException $e) {
    echo $e -> getMessage();
}

?> 