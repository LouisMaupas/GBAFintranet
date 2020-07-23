<?php 
session_start(); 
session_destroy(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>Déconnexion</title>
</head>
<body>

<div id="container">
    <?php require 'C:\wamp64\www\projet3\html\headerUnlock.php'; ?>
    <div id="logout-confirm">
        <p>
        Vous êtes bien déconnecté
        <?php header('refresh: 5; url=login.php') ?>
        </p>
    </div>
        <?php require 'C:\wamp64\www\projet3\html\footer.php'; ?>
</div>
    
</body>
</html>

