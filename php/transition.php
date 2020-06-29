<?php
$id = $_POST['id'];
if ((isset($id)) AND $id == "un") {
    header('Location: C:\wamp64\www\projet3\html\home.php');
    exit;
} elseif ((isset($id)) AND $id == "deux") {
    header('Location: C:\wamp64\www\projet3\html\formFirstCo.php');
    exit;
} else {
    header('Location: C:\wamp64\www\projet3\html\accessDenied.php');
    exit;
}
?>