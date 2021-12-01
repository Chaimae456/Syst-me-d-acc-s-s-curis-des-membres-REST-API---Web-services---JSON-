<?php 
header("Access-Control-Allow-Origin:*");



require_once 'includes/config.php';
require_once 'classes/jwt.php';
include_once "./db.php";

$json =file_get_contents('php://input');
$obj = json_decode($json,true);
$crud_req=$obj['crud_req'];

if($_SERVER['REQUEST_METHOD'] == "POST" && $crud_req=="Register")
register($conn,$obj);

if($_SERVER['REQUEST_METHOD'] == "GET")
autorization();

if($_SERVER['REQUEST_METHOD'] == "POST" && $crud_req=="Login")
login($conn,$obj);




function register($conn,$obj){
$name = $obj['name'];
$mail =$obj['email'];
$password=$obj['password'];
if(empty($name) || empty($mail) || empty($password)){
    http_response_code(400);
    echo "all fields are requirde";
    exit();
}
if(! filter_var($mail, FILTER_VALIDATE_EMAIL)){
    http_response_code(400);
    echo "invalide Email Adress";
    exit();
}
if(strlen($password) < 8){
    http_response_code(400);
    echo "Your password must be at least 8 characters long!";
    exit();
}
$psw = password_hash($password, PASSWORD_DEFAULT);
$sql= " Insert into users (name, email, password) values (?,?,?);";
$stmt = $conn->stmt_init();
if(!$stmt->prepare($sql)){
    http_response_code(400);
    echo "something went wrong pls try later !";
    exit();
}

$stmt -> bind_param("sss", $name , $mail , $psw);
$stmt->execute();
if($stmt->affected_rows > 0){
    http_response_code(200);
    echo 'Registered successfully';
    exit();
}else{
    http_response_code(400);
    echo "something went wrong";
     exit();
}

}

function login($conn,$obj){
    $mail =$obj['email'];
    $password=$obj['password'];
    if(empty($mail) || empty($password)){
        http_response_code(400);
        echo "all fields are requirde";
        exit();
    }
    $sql= " select * from users where email = ?;";
    $stmt = $conn->stmt_init();
    if(!$stmt->prepare($sql)){
    http_response_code(400);
    echo "something went wrong pls try later !";
    exit();
    }
    $stmt -> bind_param("s", $mail);
    $stmt->execute();
    $result = $stmt->get_result();
    if(mysqli_num_rows($result) > 0){
        //..........something
        $data = $result->fetch_assoc();
       $isValid = password_verify($password,$data['password']);
       if(!$isValid){
        http_response_code(404);
        echo "your Password is incorrect";
        exit();
       }
       // http response 

        http_response_code(200);
        // creation de token 
        
        $jwt = new JWT();
        $payload = [
    'user_id' =>$data['id'] ,
    'roles' => [
        'ROLE_ADMIN',
        'ROLE_USER'
    ],
    'email' => $data['email']
        ];
        $token = $jwt->generate($payload,SECRET , 60);
        echo $token;

    }else{
        http_response_code(404);
        echo "your Email is incorrect";
    }

}

function autorization(){}