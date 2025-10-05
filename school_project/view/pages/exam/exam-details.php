
<?php
require_once("models/exam.class.php");
$item = [];
if (isset($_GET["id"])) {
    $item = Exam::readById($_GET["id"]);
}

?>
<div class='content-wrapper'>
  <div class='content-header'>
    <div class='container-fluid'>
      <div class='row mb-2'>
        <div class='col-sm-6'>
          <h1 class='m-0'>Details of Exam</h1>
        </div>
      </div>
    </div>
  </div>
  <section class='content'>
    <div class='container-fluid'>
      <a href="exam" class="btn btn-primary mb-3">Back to Manage</a>

<?php if (!empty($item)) { ?>
<table class="table table-striped">
  <tr>
    <th>Id</th>
    <td><?php echo htmlspecialchars($item['id']); ?></td>
  </tr>
  <tr>
    <th>Exam Name</th>
    <td><?php echo htmlspecialchars($item['exam_name']); ?></td>
  </tr>
  <tr>
    <th>Subject Id</th>
    <td><?php echo htmlspecialchars($item['subject_id']); ?></td>
  </tr>
  <tr>
    <th>Class Id</th>
    <td><?php echo htmlspecialchars($item['class_id']); ?></td>
  </tr>
  <tr>
    <th>Start Time</th>
    <td><?php echo htmlspecialchars($item['start_time']); ?></td>
  </tr>
  <tr>
    <th>End Time</th>
    <td><?php echo htmlspecialchars($item['end_time']); ?></td>
  </tr>
  <tr>
    <th>Date</th>
    <td><?php echo htmlspecialchars($item['date']); ?></td>
  </tr>
</table>
<?php } else { echo "<p>No data found.</p>"; } ?>

    </div>
  </section>
</div>
