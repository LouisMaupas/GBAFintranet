<?php session_start(); 
if (!(isset($_SESSION['question']) && $_SESSION['question'] != '')) 
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
    <?php require 'C:\wamp64\www\projet3\html\header.html'; ?>
                
        <div id="hidden" >
            <form action="../php/scripts.php" method="post">
                <p>
                    <p>
                        Quel est l'acteur concerné par votre commentaire ? ?<br />
                        <input type="radio" name="actor" value="radio-one" id="radio-one" required value="1"/> <label for="radio-one">Formation&co</label> 
                        <input type="radio" name="actor" value="radio-two" id="radio-two" /> <label for="radio-two">Protectpeople</label> 
                        <input type="radio" name="actor" value="radio-three" id="radio-three" /> <label for="radio-three">Dsa France</label> 
                        <input type="radio" name="actor" value="radio-four" id="radio-four" /> <label for="radio-four">CDE</label> 
                    </p>    
                    <label for="post">Ecrivez votre commentaire ci-dessous</label> :<br/><textarea name="post" id="post" rows="10" cols="100" ></textarea>
                    <input type="submit" value="Envoyer" />
                </p>
            </form>
        </div>

    <?php require 'C:\wamp64\www\projet3\html\footer.php'; ?>
    </div>
</body>
</html>