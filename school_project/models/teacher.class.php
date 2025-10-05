<?php

class Teacher {
    public $id;
    public $name;
    public $subject_id;
    public $joining_date;
    public $education_qualification;
    public $salary;
    public $photo;

    public function __construct($_id, $_name, $_subject_id, $_joining_date, $_education_qualification, $_salary, $_photo) {
        $this->id = $_id;
        $this->name = $_name;
        $this->subject_id = $_subject_id;
        $this->joining_date = $_joining_date;
        $this->education_qualification = $_education_qualification;
        $this->salary = $_salary;
        $this->photo = $_photo;
    }

    public function create() {
        global $db;
        $sql = "INSERT INTO teacher (id,name,subject_id,joining_date,education_qualification,salary,photo) VALUES ('{$this->id}', '{$this->name}', '{$this->subject_id}', '{$this->joining_date}', '{$this->education_qualification}', '{$this->salary}', '{$this->photo}')";
        if ($db->query($sql)) {
          return $db->insert_id;
        } else {
          return "Query failed: " . $db->error;
        }
    }

    public static function readAll() {
        global $db;
        $sql = "SELECT t.*, s.name AS subject
                FROM teacher t, subject s
                where t.id = s.id;";
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
        $sql = "SELECT t.*, s.name AS subject
                FROM teacher t, subject s
                where t.id = s.id
                and t.id = $id";
        $res = $db->query($sql);
        if ($res) {
          return $res->fetch_assoc();
        } else {
          return "Query failed: " . $db->error;
        }
    }

    public function update($id) {
        global $db;
        $sql = "UPDATE teacher SET id='{$this->id}', name='{$this->name}', subject_id='{$this->subject_id}', joining_date='{$this->joining_date}', education_qualification='{$this->education_qualification}', salary='{$this->salary}', photo='{$this->photo}' WHERE id = $id";
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
        $sql = "DELETE FROM teacher WHERE id = $id";
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
