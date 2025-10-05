
<?php
require_once("models/student.class.php");
$msg = "";
$res = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $father_name = $_POST['father_name'];
    $mother_name = $_POST['mother_name'];
    $roll = $_POST['roll'];
    $class_id = $_POST['class_id'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $religion = $_POST['religion'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $admission_date = $_POST['admission_date'];
    $address = $_POST['address'];
    $photo = $_POST['photo'];
    $obj = new Student($id, $name, $father_name, $mother_name, $roll, $class_id, $dob, $gender, $religion, $email, $phone, $admission_date, $address, $photo);
    $msg = $obj->update($id);
}
if (isset($_GET['id'])) {
    $res = Student::readById($_GET['id']);
}

?>
<div class='content-wrapper'>
  <div class='content-header'>
    <div class='container-fluid'>
      <div class='row mb-2'>
        <div class='col-sm-6'>
          <h1 class='m-0'>Edit Student</h1>
        </div>
      </div>
    </div>
  </div>
  <section class='content'>
    <div class='container-fluid'>
      <a href="student" class="btn btn-primary mb-3">Back to Manage</a>

<?php if($msg) { ?>
<div class="alert alert-info alert-dismissible fade show" role="alert">
  <?php echo $msg; ?>
  <button type="button" class="btn-close close" data-dismiss="alert" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>
<?php if(!empty($res)) { ?>
<div class="card">
  <form method="post">
    <div class="card-body">
      <input type="hidden" name="id" value="<?php echo $res['id']; ?>">
      <div class="form-group mb-3">
        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name" value="<?php echo htmlspecialchars($res['name']); ?>">
      </div>
      <div class="form-group mb-3">
        <label for="father_name">Father Name</label>
        <input type="text" class="form-control" name="father_name" id="father_name" value="<?php echo htmlspecialchars($res['father_name']); ?>">
      </div>
      <div class="form-group mb-3">
        <label for="mother_name">Mother Name</label>
        <input type="text" class="form-control" name="mother_name" id="mother_name" value="<?php echo htmlspecialchars($res['mother_name']); ?>">
      </div>
      <div class="form-group mb-3">
        <label for="roll">Roll</label>
        <input type="text" class="form-control" name="roll" id="roll" value="<?php echo htmlspecialchars($res['roll']); ?>">
      </div>
      <div class="form-group mb-3">
        <label for="class_id">Class Id</label>
        <input type="text" class="form-control" name="class_id" id="class_id" value="<?php echo htmlspecialchars($res['class_id']); ?>">
      </div>
      <div class="form-group mb-3">
        <label for="dob">Dob</label>
        <input type="text" class="form-control" name="dob" id="dob" value="<?php echo htmlspecialchars($res['dob']); ?>">
      </div>
      <div class="form-group mb-3">
        <label for="gender">Gender</label>
        <input type="text" class="form-control" name="gender" id="gender" value="<?php echo htmlspecialchars($res['gender']); ?>">
      </div>
      <div class="form-group mb-3">
        <label for="religion">Religion</label>
        <input type="text" class="form-control" name="religion" id="religion" value="<?php echo htmlspecialchars($res['religion']); ?>">
      </div>
      <div class="form-group mb-3">
        <label for="email">Email</label>
        <input type="text" class="form-control" name="email" id="email" value="<?php echo htmlspecialchars($res['email']); ?>">
      </div>
      <div class="form-group mb-3">
        <label for="phone">Phone</label>
        <input type="text" class="form-control" name="phone" id="phone" value="<?php echo htmlspecialchars($res['phone']); ?>">
      </div>
      <div class="form-group mb-3">
        <label for="admission_date">Admission Date</label>
        <input type="text" class="form-control" name="admission_date" id="admission_date" value="<?php echo htmlspecialchars($res['admission_date']); ?>">
      </div>
      <div class="form-group mb-3">
        <label for="address">Address</label>
        <input type="text" class="form-control" name="address" id="address" value="<?php echo htmlspecialchars($res['address']); ?>">
      </div>
      <div class="form-group mb-3">
        <label for="photo">Photo</label>
        <input type="text" class="form-control" name="photo" id="photo" value="<?php echo htmlspecialchars($res['photo']); ?>">
      </div>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-success">Update</button>
    </div>
  </form>
</div>
<?php } ?>

    </div>
  </section>
</div>
