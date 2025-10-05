<?php
    function getClass(){
        echo json_encode(StudentClass::readAll());
    }

?>
