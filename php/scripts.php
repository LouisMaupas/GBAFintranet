<?php
session_start(); 
echo 'Session : ' . $_SESSION['username'];
    // Connexion à la base de données
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=projettroisbdd;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }


//requête préparée
//$req = $bdd->prepare('INSERT INTO post(id_user, id_actor, date_add, post) VALUES(?, ?, ?, ?)');
// insertion message
//$req->execute(array($_SESSION['username'], $_POST['radio'], $_SESSION['date'], $_POST[''], $_POST['post']));

echo $_SESSION['username'] . $_POST['post'];

// Redirection du visiteur vers la page home
//header('Location: ./html/home.php');
?>