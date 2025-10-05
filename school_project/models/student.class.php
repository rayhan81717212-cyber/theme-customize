<?php

class Student {
    public $id;
    public $name;
    public $father_name;
    public $mother_name;
    public $roll;
    public $class_id;
    public $dob;
    public $gender;
    public $religion;
    public $email;
    public $phone;
    public $admission_date;
    public $address;
    public $photo;

    public function __construct($_id, $_name, $_father_name, $_mother_name, $_roll, $_class_id, $_dob, $_gender, $_religion, $_email, $_phone, $_admission_date, $_address, $_photo) {
        $this->id = $_id;
        $this->name = $_name;
        $this->father_name = $_father_name;
        $this->mother_name = $_mother_name;
        $this->roll = $_roll;
        $this->class_id = $_class_id;
        $this->dob = $_dob;
        $this->gender = $_gender;
        $this->religion = $_religion;
        $this->email = $_email;
        $this->phone = $_phone;
        $this->admission_date = $_admission_date;
        $this->address = $_address;
        $this->photo = $_photo;
    }

    public function create() {
        global $db;
        $sql = "INSERT INTO student (id,name,father_name,mother_name,roll,class_id,dob,gender,religion,email,phone,admission_date,address,photo) VALUES ('{$this->id}', '{$this->name}', '{$this->father_name}', '{$this->mother_name}', '{$this->roll}', '{$this->class_id}', '{$this->dob}', '{$this->gender}', '{$this->religion}', '{$this->email}', '{$this->phone}', '{$this->admission_date}', '{$this->address}', '{$this->photo}')";
        if ($db->query($sql)) {
          return $db->insert_id;
        } else {
          return "Query failed: " . $db->error;
        }
    }

      public static function readAll() {
      global $db;

      $sql = "SELECT s.*, c.name AS class_name, c.department AS department
              FROM student s
              JOIN class c ON s.class_id = c.id
              ORDER BY 
                FIELD(c.name, 'XI', 'XII'),
                FIELD(c.department, 'Business Studies', 'Arts', 'Science')";

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
        $sql = "SELECT s.*, c.name AS class_name, c.department as department
                FROM student s, class c
                where s.class_id = c.id
                and s.id = $id";
        $res = $db->query($sql);
        if ($res) {
          return $res->fetch_assoc();
        } else {
          return "Query failed: " . $db->error;
        }
    }

    public function update($id) {
        global $db;
        $sql = "UPDATE student SET id='{$this->id}', name='{$this->name}', father_name='{$this->father_name}', mother_name='{$this->mother_name}', roll='{$this->roll}', class_id='{$this->class_id}', dob='{$this->dob}', gender='{$this->gender}', religion='{$this->religion}', email='{$this->email}', phone='{$this->phone}', admission_date='{$this->admission_date}', address='{$this->address}', photo='{$this->photo}' WHERE id = $id";
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
        $sql = "DELETE FROM student WHERE id = $id";
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
