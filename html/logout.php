<?php 
session_start(); 
session_destroy(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="all and (max-width: 650px)" href="../css/stylePhone.css" />
    <link rel="stylesheet" media="all and (min-width: 651px) and (max-width: 1223px)" href="../css/stylePad.css" />
    <link rel="stylesheet" media="all and (min-width: 1224px)" type="text/css" href="../css/style.css">
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

