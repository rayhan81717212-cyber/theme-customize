<?php

class Users {
    public $id;
    public $name;
    public $email;
    public $password;
    public $role_id;
    public $phone;
    public $address;
    public $create_at;

    public function __construct($_id, $_name, $_email, $_password, $_role_id, $_phone, $_address, $_create_at) {
        $this->id = $_id;
        $this->name = $_name;
        $this->email = $_email;
        $this->password = $_password;
        $this->role_id = $_role_id;
        $this->phone = $_phone;
        $this->address = $_address;
        $this->create_at = $_create_at;
    }

    public function create() {
        global $db;
        $sql = "INSERT INTO users (id,name,email,password,role_id,phone,address,create_at) VALUES ('{$this->id}', '{$this->name}', '{$this->email}', '{$this->password}', '{$this->role_id}', '{$this->phone}', '{$this->address}', '{$this->create_at}')";
        if ($db->query($sql)) {
          return $db->insert_id;
        } else {
          return "Query failed: " . $db->error;
        }
    }

    public static function readAll() {
        global $db;
        $sql = "SELECT * FROM users";
        $res = $db->query($sql);
        if ($res) {
          return $res->fetch_all(MYSQLI_ASSOC);
        } else {
          return "Query failed: " . $db->error;
        }
    }

    public static function readById($id) {
        global $db;
        $id = (int)$id;
        $sql = "SELECT * FROM users WHERE id = $id";
        $res = $db->query($sql);
        if ($res) {
          return $res->fetch_assoc();
        } else {
          return "Query failed: " . $db->error;
        }
    }

    public function update($id) {
        global $db;
        $sql = "UPDATE users SET id='{$this->id}', name='{$this->name}', email='{$this->email}', password='{$this->password}', role_id='{$this->role_id}', phone='{$this->phone}', address='{$this->address}', create_at='{$this->create_at}' WHERE id = $id";
        if ($db->query($sql)) {
          if ($db->affected_rows > 0) {
            return "Update successful.";
          } else {
            return "No changes made or record not found.";
          }
        } else {
          return "Update failed: " . $db->error;
        }
    }

    public static function delete($id) {
        global $db;
        $sql = "DELETE FROM users WHERE id = $id";
        if ($db->query($sql)) {
          if ($db->affected_rows > 0) {
            return "Delete successful.";
          } else {
            return "No record found with ID $id.";
          }
        } else {
          return "Delete failed: " . $db->error;
        }
    }
}
