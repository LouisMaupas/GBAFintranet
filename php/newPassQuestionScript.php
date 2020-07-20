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
//
$answerBdd = $result['answer'];
echo "form = " . $answerForm . " answer bdd = " . $answerBdd . " ! ";

// condition if answer_form = answer_bdd
if ($answerForm === $answerBdd ) {
    echo "ça match";
    // genere nvx mdp
    // recuperation du mail
    // envoi par mail du nvx mdp
    // redirection login page 
}
else {
    echo "mauvaise réponse voici un lien pour la page home";
}

?>