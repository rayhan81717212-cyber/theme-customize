
<?php
require_once("models/student.class.php");
$msg = "";
if(isset($_POST['delete_id'])) {
  $id = $_POST['delete_id'];
  $msg = Student::delete($id);
}

?>
<div class='content-wrapper'>
  <div class='content-header'>
    <div class='container-fluid'>
      <div class='row mb-2'>
        <div class='col-sm-6'>
          <h1 class='m-0'>Manage Student</h1>
        </div>
      </div>
    </div>
  </div>
  <section class='content'>
    <div class='container-fluid'>
      <a href="student-create" class="btn btn-primary mb-3">Add New</a>

<?php if($msg) { ?>
<div class="alert alert-info alert-dismissible fade show" role="alert">
  <?php echo $msg; ?>
  <button type="button" class="btn-close close" data-dismiss="alert" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php } ?>

<table class="table table-striped">
  <thead>
  <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Father Name</th>
    <th>Mother Name</th>
    <th>Roll</th>
    <th>Class Id</th>
    <th>Dob</th>
    <th>Gender</th>
    <th>Religion</th>
    <th>Email</th>
    <th>Phone</th>
    <th>Admission Date</th>
    <th>Address</th>
    <th>Photo</th>
    <th>Actions</th>
  </tr>
  </thead>
  <tbody>
  <?php
    $items = Student::readAll();
    foreach($items as $item){
      echo "<tr>";
      echo "<td>".$item['id']."</td>";
      echo "<td>".$item['name']."</td>";
      echo "<td>".$item['father_name']."</td>";
      echo "<td>".$item['mother_name']."</td>";
      echo "<td>".$item['roll']."</td>";
      echo "<td>".$item['class_id']."</td>";
      echo "<td>".$item['dob']."</td>";
      echo "<td>".$item['gender']."</td>";
      echo "<td>".$item['religion']."</td>";
      echo "<td>".$item['email']."</td>";
      echo "<td>".$item['phone']."</td>";
      echo "<td>".$item['admission_date']."</td>";
      echo "<td>".$item['address']."</td>";
      echo "<td>".$item['photo']."</td>";
  ?>
    <td>
      <form action="student-details" method="get">
        <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
        <input type="submit" class="btn btn-info" value="Details">
      </form>
      <form action="student-edit" method="get">
        <input type="hidden" name="id" value="<?php echo $item['id']; ?>">
        <input type="submit" class="btn btn-primary" value="Edit">
      </form>
      <form method="post">
        <input type="hidden" name="delete_id" value="<?php echo $item['id']; ?>">
        <input type="submit" class="btn btn-danger" value="Delete">
      </form>
    </td>
  <?php
      echo "</tr>";
    }
  ?>
  </tbody>
</table>

    </div>
  </section>
</div>
