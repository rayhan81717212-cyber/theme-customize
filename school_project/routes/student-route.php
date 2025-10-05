<?php
if ($page == "student") {
    include_once('view/pages/student/student-manage.php');
} elseif ($page == "student-create") {
    include_once('view/pages/student/student-create.php');
} elseif ($page == "student-edit") {
    include_once('view/pages/student/student-edit.php');
} elseif ($page == "student-details") {
    include_once('view/pages/student/student-details.php');
}
?>