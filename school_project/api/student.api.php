<?php

    function getDataStudent(){
        echo json_encode(Student::readAll());
    }
    function getDataStudentById($id){
        echo json_encode(Student::readById($id));
    }
    function createStudent($data){
    $photo ="";

    $filesUpload = isset($_FILES["photo"]) ? $_FILES["photo"] : [];

        $uploadsFile = imgUpload($filesUpload, "../uploads/photo");
        if(isset($uploadsFile["success"])){
            $photo = $uploadsFile["success"]; 
        }
        // echo json_encode($photo);

    $student = new Student(
        null,
        $data['name'] ?? null,
        $data['father_name'] ?? null,
        $data['mother_name'] ?? null,
        $data['roll'] ?? null,
        $data['class_id'] ?? null,
        $data['dob'] ?? null,
        $data['gender'] ?? null,
        $data['religion'] ?? null,
        $data['email'] ?? null,
        $data['phone'] ?? null,
        $data['admission_date'] ?? null,
        $data['address'] ?? null,
        $photo
    );

    echo json_encode($student->create());
}

   function updateStudent($data){
    $photo = "";
    $oldPhoto = isset($data['photo']) ? $data['photo'] : "";
    $filesUpload = isset($_FILES["photo"]) ? $_FILES["photo"] : [];

    if (!empty($filesUpload) && $filesUpload['error'] == 0) {
        $uploadsFile = imgUpload($filesUpload, "../uploads/photo");
        if(isset($uploadsFile["success"])){
            $photo = $uploadsFile["success"]; 
        }
    } else {
        $photo = $oldPhoto;
    }

    $student = new Student(
        $data['id'],  
        $data['name'],
        $data['father_name'],
        $data['mother_name'],
        $data['roll'],
        $data['class_id'],
        $data['dob'],
        $data['gender'],
        $data['religion'],
        $data['email'],
        $data['phone'],
        $data['admission_date'],
        $data['address'],
        $photo
    );

    echo json_encode($student->update($data));
    }

    function deleteStudent($id){
        echo json_encode(Student::delete($id));
    }   


?>
