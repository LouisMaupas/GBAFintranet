<?php
$id = $_POST['id'];
echo $id;
if (!isset($id) == "un") {
    header('Location: html\home.php');
    exit;
} elseif (!isset($id) == "deux") {
    header('Location: formFirstCo.php');
    exit;
} else {
    header('Location: accessDenied.php');
    exit;
}
?>