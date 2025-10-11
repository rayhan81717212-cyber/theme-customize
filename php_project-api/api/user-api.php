<?php
    function getUser(){
        echo json_encode (Users::readAll());
    }

    
    //     function createUsers($data) {
    //     $name = $data["name"] ?? "";
    //     $email = $data["email"] ?? "";
    //     $role_id = $data["role_id"] ?? "";
    //     $address = $data["address"] ?? "";

    //     $users = new Users(
    //         null,
    //         $name,
    //         $email,
    //         $role_id,
    //         $address,
    //         null
    //     );

    //     echo json_encode($users->create());
    // }

    function createUsers($data, $file){
        $image = imgUpload($file["photo"]);
        if(isset($image["success"])){
            $photo = $image["success"];
        }else{
            $photo = "";
            echo json_encode([
                    "success" => false,
                    "message" => $image["message"]
                ]);
                exit;

            exit;
        }

        $users = new Users (null, $data["name"], $data["email"], "", $data["role_id"],$data["address"], $photo);
        echo json_encode($users->create());
    }

    function deleteUser($_id) {
        echo json_encode(Users::delete($_id));
    }

    function login($data){
       echo json_encode(Users::login($data["email"], $data["password"]));
        
    }


?>