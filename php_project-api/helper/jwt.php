<?php
require_once "../vendor/autoload.php";
use Firebase\JWT\JWT;
use Firebase\JWT\key;

$config = include('../config/secret.php');

function generateJWT($payload, $expiry = 3600) {
    global $config;
    $issuedAt = time();
    $expire = $issuedAt + $expiry; // Token valid for 1 hour
    $tokenPayload = array_merge($payload, [
        'iat' => $issuedAt,
        'exp' => $expire
    ]);
    return JWT::encode($tokenPayload, $config['secret_key_jwt'], 'HS256');
}

function validateJWT($jwt) {
    global $config;
    return JWT::decode($jwt, new Key($config['secret_key_jwt'], 'HS256'));
}

?>