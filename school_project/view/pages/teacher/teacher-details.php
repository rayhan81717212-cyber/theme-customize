
<?php
require_once("models/teacher.class.php");
$item = [];
if (isset($_GET["id"])) {
    $item = Teacher::readById($_GET["id"]);
}

?>
<div class='content-wrapper'>
  <div class='content-header'>
    <div class='container-fluid'>
      <div class='row mb-2'>
        <div class='col-sm-6'>
          <h1 class='m-0'>Details of Teacher</h1>
        </div>
      </div>
    </div>
  </div>
  <section class='content'>
    <div class='container-fluid'>
      <a href="teacher" class="btn btn-primary mb-3">Back to Manage</a>

<?php if (!empty($item)) { ?>
<table class="table table-striped">
  <tr>
    <th>Id</th>
    <td><?php echo htmlspecialchars($item['id']); ?></td>
  </tr>
  <tr>
    <th>Name</th>
    <td><?php echo htmlspecialchars($item['name']); ?></td>
  </tr>
  <tr>
    <th>Subject Id</th>
    <td><?php echo htmlspecialchars($item['subject_id']); ?></td>
  </tr>
  <tr>
    <th>Joining Date</th>
    <td><?php echo htmlspecialchars($item['joining_date']); ?></td>
  </tr>
  <tr>
    <th>Education Qualification</th>
    <td><?php echo htmlspecialchars($item['education_qualification']); ?></td>
  </tr>
  <tr>
    <th>Salary</th>
    <td><?php echo htmlspecialchars($item['salary']); ?></td>
  </tr>
  <tr>
    <th>Photo</th>
    <td><?php echo htmlspecialchars($item['photo']); ?></td>
  </tr>
</table>
<?php } else { echo "<p>No data found.</p>"; } ?>

    </div>
  </section>
</div>
