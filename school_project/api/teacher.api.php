<?php

    function getTeacherData(){
        echo json_encode(Teacher::readAll());
    }
    function getDetailsTeacher($id){
       echo json_encode(Teacher::readById($id)); 
    }

?>