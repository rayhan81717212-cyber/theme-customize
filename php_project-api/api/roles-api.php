<?php
    function getRoles(){
        echo json_encode(Roles::readAll());
    }
    function getRolesById($id){
        echo json_encode(Roles::readById($id));
    }

    function createRoles($data){
        $roles = new Roles(null, $data["name"]);
        echo json_encode($roles->create());
    }

?>