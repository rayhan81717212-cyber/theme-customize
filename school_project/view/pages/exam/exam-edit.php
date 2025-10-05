
<?php
require_once("models/exam.class.php");
$msg = "";
$res = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $exam_name = $_POST['exam_name'];
    $subject_id = $_POST['subject_id'];
    $class_id = $_POST['class_id'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $date = $_POST['date'];
    $obj = new Exam($id, $exam_name, $subject_id, $class_id, $start_time, $end_time, $date);
    $msg = $obj->update($id);
}
if (isset($_GET['id'])) {
    $res = Exam::readById($_GET['id']);
}

?>
<div class='content-wrapper'>
  <div class='content-header'>
    <div class='container-fluid'>
      <div class='row mb-2'>
        <div class='col-sm-6'>
          <h1 class='m-0'>Edit Exam</h1>
        </div>
      </div>
    </div>
  </div>
  <section class='content'>
    <div class='container-fluid'>
      <a href="exam" class="btn btn-primary mb-3">Back to Manage</a>

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
        <label for="exam_name">Exam Name</label>
        <input type="text" class="form-control" name="exam_name" id="exam_name" value="<?php echo htmlspecialchars($res['exam_name']); ?>">
      </div>
      <div class="form-group mb-3">
        <label for="subject_id">Subject Id</label>
        <input type="text" class="form-control" name="subject_id" id="subject_id" value="<?php echo htmlspecialchars($res['subject_id']); ?>">
      </div>
      <div class="form-group mb-3">
        <label for="class_id">Class Id</label>
        <input type="text" class="form-control" name="class_id" id="class_id" value="<?php echo htmlspecialchars($res['class_id']); ?>">
      </div>
      <div class="form-group mb-3">
        <label for="start_time">Start Time</label>
        <input type="text" class="form-control" name="start_time" id="start_time" value="<?php echo htmlspecialchars($res['start_time']); ?>">
      </div>
      <div class="form-group mb-3">
        <label for="end_time">End Time</label>
        <input type="text" class="form-control" name="end_time" id="end_time" value="<?php echo htmlspecialchars($res['end_time']); ?>">
      </div>
      <div class="form-group mb-3">
        <label for="date">Date</label>
        <input type="text" class="form-control" name="date" id="date" value="<?php echo htmlspecialchars($res['date']); ?>">
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
