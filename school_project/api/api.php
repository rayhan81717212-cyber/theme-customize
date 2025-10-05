<?php
// Data Base Connected
require_once('../config/db.php');

// img helper Connected
require_once("../helper/img-upload-helper.php");

// Access-Control-Allow-Origin to php
header("Access-Control-Allow-Origin: http://localhost:5173");
header("Access-Control-Allow-Methods: GET, POST, PUT, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");


// All Class Added
foreach(glob("../models/*.class.php") as $fileName){
    include_once($fileName);
}

// All Api Connected
foreach(glob("*.api.php") as $fileName){
    include_once($fileName);
}

$requestMethod = $_SERVER["REQUEST_METHOD"];
if(isset($_GET['method'])) {
    $method = $_GET['method'];
   
    // student api
    if($method == "student" && $requestMethod == 'GET'){
        getDataStudent();
    }else if($method == "details-student" && $requestMethod == 'GET'){
        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
        getDataStudentById($id);
    }else if($method == "create-student" && $requestMethod == 'POST'){
        createStudent($_POST); 
    }else if($method == "update-student" && ($requestMethod == 'POST' || $requestMethod == 'PUT')){
        $data = $_POST; 
        if (isset($_GET['id'])) {
            $data['id'] = intval($_GET['id']);   
            updateStudent($data);
        } else {
            echo json_encode(["error" => "Student ID missing"]);
        }
    }else if($method == "delete-student" && $requestMethod == 'DELETE'){
    $data = json_decode(file_get_contents("php://input"), true);
    deleteStudent($data);
    }
    
    // Teacher Api
    else if($method == "teacher" && $requestMethod == 'GET'){
        getTeacherData();
    }else if($method == "details-teacher" && $requestMethod == 'GET'){
        $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
        getDetailsTeacher($id);
    }
    
    // Class Api
    else if($method == "class" && $requestMethod == 'GET'){
        getClass();
    }
}

?>