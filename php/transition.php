<?php
if ((isset($_POST['id'])) AND $_POST['id'] == "un") {
    header('Location: C:\wamp64\www\projet3\html\home.php');
    exit;
} elseif ((isset($_POST['id'])) AND $_POST['id'] == "deux") {
    header('Location: C:\wamp64\www\projet3\html\formFirstCo.php');
    exit;
} else {
    header('Location: C:\wamp64\www\projet3\html\accessDenied.php');
    exit;
}
?>