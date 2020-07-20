<?php session_start(); 
if (!(isset($_SESSION['answer']) && $_SESSION['answer'] != '')) 
{
    header ("Location: login.php");
}
echo 'Session : ' . $_SESSION['username'] . $_SESSION['id_user'];

// Connexion à la BDD
try
{
$bdd = new PDO('mysql:host=localhost;dbname=projettroisbdd;charset=utf8', 'root', '');
}
catch (Exception $e)
{
die('Erreur lors de la connexion à la base de données');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>Ecrivez votre commentaire</title>
</head>
<body>
    <div id="container">
    <?php require 'C:\wamp64\www\projet3\html\header.php'; ?>
                
        <div>
            <form action="../php/newComScript.php?actoris=<?= $_GET['actoris'] ?>" method="POST">
                <p>
                    <label for="post">Ecrivez votre commentaire ci-dessous</label> :<br/>
                    <textarea name="post" id="post" rows="10" cols="100" ></textarea><br/>
                    <input type="submit" value="Envoyer"/>
                </p>
            </form>
        </div>

    <?php require 'C:\wamp64\www\projet3\html\footer.php'; ?>
    </div>
</body>
</html>