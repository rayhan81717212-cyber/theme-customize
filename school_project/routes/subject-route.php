<?php
if ($page == "subject") {
    include_once('view/pages/subject/subject-manage.php');
} elseif ($page == "subject-create") {
    include_once('view/pages/subject/subject-create.php');
} elseif ($page == "subject-edit") {
    include_once('view/pages/subject/subject-edit.php');
} elseif ($page == "subject-details") {
    include_once('view/pages/subject/subject-details.php');
}
?>