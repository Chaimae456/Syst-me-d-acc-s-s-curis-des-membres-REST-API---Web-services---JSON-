<?php
require_once 'includes/config.php';
require_once 'classes/jwt.php';

 
// cree payload 

$payload = [
    'user_id' => 123,
    'roles' => [
        'ROLE_ADMIN',
        'ROLE_USER'
    ]
];

$jwt = new JWT();

$token = $jwt->generate($payload,SECRET , 60);

echo $token;  