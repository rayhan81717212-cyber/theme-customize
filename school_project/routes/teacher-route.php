<?php
if ($page == "teacher") {
    include_once('view/pages/teacher/teacher-manage.php');
} elseif ($page == "teacher-create") {
    include_once('view/pages/teacher/teacher-create.php');
} elseif ($page == "teacher-edit") {
    include_once('view/pages/teacher/teacher-edit.php');
} elseif ($page == "teacher-details") {
    include_once('view/pages/teacher/teacher-details.php');
}
?>