<?php
if ((isset($_POST['id'])) AND $_POST['id'] == "un") {
    header('Location: ../html/home.php');
    exit;
} elseif ((isset($_POST['id'])) AND $_POST['id'] == "deux") {
    header('Location: ../html/formFirstCo.php');
    exit;
} else {
    header('Location: ../html/accessDenied.php');
    exit;
}
?>