<?php
if ($page == "class") {
    include_once('view/pages/class/class-manage.php');
} elseif ($page == "class-create") {
    include_once('view/pages/class/class-create.php');
} elseif ($page == "class-edit") {
    include_once('view/pages/class/class-edit.php');
} elseif ($page == "class-details") {
    include_once('view/pages/class/class-details.php');
}
?>