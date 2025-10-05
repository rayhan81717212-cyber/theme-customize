
<?php
require_once("models/student.class.php");
$item = [];
if (isset($_GET["id"])) {
    $item = Student::readById($_GET["id"]);
}

?>
<div class='content-wrapper'>
  <div class='content-header'>
    <div class='container-fluid'>
      <div class='row mb-2'>
        <div class='col-sm-6'>
          <h1 class='m-0'>Details of Student</h1>
        </div>
      </div>
    </div>
  </div>
  <section class='content'>
    <div class='container-fluid'>
      <a href="student" class="btn btn-primary mb-3">Back to Manage</a>

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
    <th>Father Name</th>
    <td><?php echo htmlspecialchars($item['father_name']); ?></td>
  </tr>
  <tr>
    <th>Mother Name</th>
    <td><?php echo htmlspecialchars($item['mother_name']); ?></td>
  </tr>
  <tr>
    <th>Roll</th>
    <td><?php echo htmlspecialchars($item['roll']); ?></td>
  </tr>
  <tr>
    <th>Class Id</th>
    <td><?php echo htmlspecialchars($item['class_id']); ?></td>
  </tr>
  <tr>
    <th>Dob</th>
    <td><?php echo htmlspecialchars($item['dob']); ?></td>
  </tr>
  <tr>
    <th>Gender</th>
    <td><?php echo htmlspecialchars($item['gender']); ?></td>
  </tr>
  <tr>
    <th>Religion</th>
    <td><?php echo htmlspecialchars($item['religion']); ?></td>
  </tr>
  <tr>
    <th>Email</th>
    <td><?php echo htmlspecialchars($item['email']); ?></td>
  </tr>
  <tr>
    <th>Phone</th>
    <td><?php echo htmlspecialchars($item['phone']); ?></td>
  </tr>
  <tr>
    <th>Admission Date</th>
    <td><?php echo htmlspecialchars($item['admission_date']); ?></td>
  </tr>
  <tr>
    <th>Address</th>
    <td><?php echo htmlspecialchars($item['address']); ?></td>
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
