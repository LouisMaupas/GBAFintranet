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
if ($answerForm === $answerBdd ) {
    echo "ça match";
        // genere nvx mdp aléatoire
        function password() { 
            // chaine de caractères qui sera mis dans le désordre:
            $string = "abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"; // 62 caractères au total
            // on mélange la chaine avec la fonction str_shuffle(), propre à PHP
            $string = str_shuffle($string);
            // ensuite on coupe à la longueur voulue avec la fonction substr(), propre à PHP aussi
            $string = substr($string,0,10);
            // ensuite on retourne notre chaine aléatoire de "longueur" caractères:
            return $string;
        }
        // hachage du nouveau pass
        $newPassword = password_hash($password, PASSWORD_DEFAULT);
        // insertion de celui-ci dans la bdd
    // recuperation du mail
    // envoi par mail du nvx mdp
    // redirection login page 
}
else {
    echo "mauvaise réponse voici un lien pour la page home";
}

?>