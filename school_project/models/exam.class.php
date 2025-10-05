<?php

class Exam {
    public $id;
    public $exam_name;
    public $subject_id;
    public $class_id;
    public $start_time;
    public $end_time;
    public $date;

    public function __construct($_id, $_exam_name, $_subject_id, $_class_id, $_start_time, $_end_time, $_date) {
        $this->id = $_id;
        $this->exam_name = $_exam_name;
        $this->subject_id = $_subject_id;
        $this->class_id = $_class_id;
        $this->start_time = $_start_time;
        $this->end_time = $_end_time;
        $this->date = $_date;
    }

    public function create() {
        global $db;
        $sql = "INSERT INTO exam (id,exam_name,subject_id,class_id,start_time,end_time,date) VALUES ('{$this->id}', '{$this->exam_name}', '{$this->subject_id}', '{$this->class_id}', '{$this->start_time}', '{$this->end_time}', '{$this->date}')";
        if ($db->query($sql)) {
          return $db->insert_id;
        } else {
          return "Query failed: " . $db->error;
        }
    }

    public static function readAll() {
        global $db;
        $sql = "SELECT * FROM exam";
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
        $sql = "SELECT * FROM exam WHERE id = $id";
        $res = $db->query($sql);
        if ($res) {
          return $res->fetch_assoc();
        } else {
          return "Query failed: " . $db->error;
        }
    }

    public function update($id) {
        global $db;
        $sql = "UPDATE exam SET id='{$this->id}', exam_name='{$this->exam_name}', subject_id='{$this->subject_id}', class_id='{$this->class_id}', start_time='{$this->start_time}', end_time='{$this->end_time}', date='{$this->date}' WHERE id = $id";
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
        $sql = "DELETE FROM exam WHERE id = $id";
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
