<?php

class Subject {
    public $id;
    public $name;
    public $class_id;
    public $subject_code;

    public function __construct($_id, $_name, $_class_id, $_subject_code) {
        $this->id = $_id;
        $this->name = $_name;
        $this->class_id = $_class_id;
        $this->subject_code = $_subject_code;
    }

    public function create() {
        global $db;
        $sql = "INSERT INTO subject (id,name,class_id,subject_code) VALUES ('{$this->id}', '{$this->name}', '{$this->class_id}', '{$this->subject_code}')";
        if ($db->query($sql)) {
          return $db->insert_id;
        } else {
          return "Query failed: " . $db->error;
        }
    }

    public static function readAll() {
        global $db;
        $sql = "SELECT * FROM subject";
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
        $sql = "SELECT * FROM subject WHERE id = $id";
        $res = $db->query($sql);
        if ($res) {
          return $res->fetch_assoc();
        } else {
          return "Query failed: " . $db->error;
        }
    }

    public function update($id) {
        global $db;
        $sql = "UPDATE subject SET id='{$this->id}', name='{$this->name}', class_id='{$this->class_id}', subject_code='{$this->subject_code}' WHERE id = $id";
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
        $sql = "DELETE FROM subject WHERE id = $id";
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
