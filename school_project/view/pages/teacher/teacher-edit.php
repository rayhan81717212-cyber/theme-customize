
<?php
require_once("models/teacher.class.php");
$msg = "";
$res = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $subject_id = $_POST['subject_id'];
    $joining_date = $_POST['joining_date'];
    $education_qualification = $_POST['education_qualification'];
    $salary = $_POST['salary'];
    $photo = $_POST['photo'];
    $obj = new Teacher($id, $name, $subject_id, $joining_date, $education_qualification, $salary, $photo);
    $msg = $obj->update($id);
}
if (isset($_GET['id'])) {
    $res = Teacher::readById($_GET['id']);
}

?>
<div class='content-wrapper'>
  <div class='content-header'>
    <div class='container-fluid'>
      <div class='row mb-2'>
        <div class='col-sm-6'>
          <h1 class='m-0'>Edit Teacher</h1>
        </div>
      </div>
    </div>
  </div>
  <section class='content'>
    <div class='container-fluid'>
      <a href="teacher" class="btn btn-primary mb-3">Back to Manage</a>

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
        <label for="subject_id">Subject Id</label>
        <input type="text" class="form-control" name="subject_id" id="subject_id" value="<?php echo htmlspecialchars($res['subject_id']); ?>">
      </div>
      <div class="form-group mb-3">
        <label for="joining_date">Joining Date</label>
        <input type="text" class="form-control" name="joining_date" id="joining_date" value="<?php echo htmlspecialchars($res['joining_date']); ?>">
      </div>
      <div class="form-group mb-3">
        <label for="education_qualification">Education Qualification</label>
        <input type="text" class="form-control" name="education_qualification" id="education_qualification" value="<?php echo htmlspecialchars($res['education_qualification']); ?>">
      </div>
      <div class="form-group mb-3">
        <label for="salary">Salary</label>
        <input type="text" class="form-control" name="salary" id="salary" value="<?php echo htmlspecialchars($res['salary']); ?>">
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
