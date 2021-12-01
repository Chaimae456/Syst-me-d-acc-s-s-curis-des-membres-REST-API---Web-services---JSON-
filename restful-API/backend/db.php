<?php 

$host = "localhost";
$db = "php_auth_api";
$user = "root";
$password = "";
  
$conn = new mysqli($host,$user,$password,$db);

if($conn->connect_errno){
    http_response_code(400);
    header('Content_type: text/plain');
    echo $conn->connect_error;
    exit();
}