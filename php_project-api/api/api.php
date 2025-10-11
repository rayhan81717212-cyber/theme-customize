<?php
// echo "API Working <br>";
require_once('../config/db.php');

// header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// require_once('../models/products.class.php');
foreach(glob("../models/*.class.php") as $fileName){
    include_once($fileName);
}

// helpers function
include_once("../helper/img-upload-helper.php");
include_once("../helper/jwt.php");

// include_once('product-api.php');
// include_once("order-api.php");
foreach(glob("*-api.php") as $filename){
    include_once($filename);
}

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit();
}
$request = $_SERVER["REQUEST_METHOD"] ?? null;
 $method = $_GET['method'] ?? null;

 if(!$method){
    echo json_encode(["error"=> "No endpoint specified"]);
    exit;
 }

 if(($method == "login" && $request == "POST")){
    $data = json_decode(file_get_contents("php://input"), true);
    login($data);
 }else if ($method == "token" && $request == "POST"){
        $data = [
            "name" => "Rayhan",
            "email" => "rayhan@gmail.com",
            "role" => "admin"
        ];
        echo json_encode(generateJWT($data, 60*60*24*7));
    }else{

    $headers = getallheaders();
        $autho_headers = $headers["Authorization"] ?? '';
        if(!$autho_headers){
            http_response_code(401);
            echo json_encode(["error" => "No token provided"]);
            exit;
        }
        
        $bearer_token = explode(" ", $autho_headers);
        $token = $bearer_token[1];
        try{
            $decoded = validateJWT($token);
        }
        catch(Exception $e){
            http_response_code(401);
            echo json_encode(["error"=> "Invalid or expair token"]);
            exit;
        }

        if($method == 'roles' && $request == "GET") {
            getRoles();
        }else if($method == "create-role" && $request == "POST"){
            // echo "Creat role api is working ";
            $data = json_decode(file_get_contents("php://input"), true);
            // echo json_encode($data);
            createRoles($data);
        }else if($method == "update-role" && $request == "GET"){
            getRolesById($_GET["id"]);
        }else if ($method == "users"){
            getUser();
            
        }else if ($method == "create-users" && $request == "POST"){
            createUsers($_POST, $_FILES);
        }else if ($method == "delete-user" && $request == "DELETE"){
            // echo json_encode($_GET["id"]);
            deleteUser($_GET["id"]);
        }else if($method == "token-check"){
            $headers = getallheaders();
            $autho_headers = $headers["Authorization"] ?? '';
            $jwt = explode(" ", $autho_headers);
            echo json_encode(validateJWT($jwt[1]));
        }
        else{
            echo "This url $method not found";
        }

        

    }


?>