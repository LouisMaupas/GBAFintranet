<?php 
session_start(); 
// connexion bdd
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=projettroisbdd;charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur lors de la connexion à la base de données');
}

//récvupération du answer du formalure
$answerForm = $_POST['answer'];

//récupeartion du answaire dans la bdd
$username = $_SESSION['username'];
$log = $bdd->prepare('SELECT * from account where username = :username');
$log->execute(array('username' => $username));
$result = $log->fetch();
$answerBdd = $result['answer'];

// condition if answer_form = answer_bdd
if ($answerForm === $answerBdd ) 
{
    echo "ça match";
        // formulaire pour nouveau mot de passe
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" type="text/css" href="../css/style.css">
            <title>page acteur</title>
        </head>
        <body>
            <div id="container">
                <?php require '../html/header.php'; ?>              
                <div>
                    <h1>Formulaire d'inscription</h1>
                    <form method="POST" action="newPassQuestionScript.php">
                        <p>
                            <label for="password">Mot de passe</label>:<input type="password" name="password" id="password" /><br />
                            <label for="password-confirm">Confirmer mot de passe</label>:<input type="password" name="password-confirm" id="password-confirm" /><br />
                            <input type="submit" value="envoyer"/>
                        </p>
                    </form>  
                </div>
                <?php require 'C:\wamp64\www\projet3\html\footer.php'; ?>
            </div>
        </body>
        </html>
            <?php
        // MAJ du mot de passe
        $password = $_POST['password']; 
        $newPassword = password_hash($password, PASSWORD_DEFAULT);

        // MAJ du mdp
        $insert = $bdd->prepare('UPDATE account SET
        password = :password,     
        WHERE username = :username');
        $insert->execute(array(
            'paswword' => $password,
            'username' => $username));
        // redirection login page 
} 
else
{
    echo "mauvaise réponse";
}

?>


