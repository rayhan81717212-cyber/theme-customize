<?php
if ($page == "exam") {
    include_once('view/pages/exam/exam-manage.php');
} elseif ($page == "exam-create") {
    include_once('view/pages/exam/exam-create.php');
} elseif ($page == "exam-edit") {
    include_once('view/pages/exam/exam-edit.php');
} elseif ($page == "exam-details") {
    include_once('view/pages/exam/exam-details.php');
}
?>