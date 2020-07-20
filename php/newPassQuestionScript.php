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
            // chaine de caractères
            $password = "abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
            // on mélange
            $password = str_shuffle($password);
            // on coupe à 10 caracteres
            $password = substr($password,0,10);
            // on retourne:
            return $password;
        }
        $pass = password(); 
        // hachage du nouveau pass
        $newPassword = password_hash($pass, PASSWORD_DEFAULT);
        // insertion de celui-ci dans la bdd
        // sinon récupérer tout le profil et tout le réinser entierement sauf rempalcer le nouveau mdp
        $del = $bdd->prepare('ALTER TABLE account DROP COLUMN password WHERE username = :username');
        $del->bindValue(2, $_SESSION['username'], PDO::PARAM_STR);
        $del->execute();
        $insert = $bdd->prepare('INSERT INTO account(password) VALUES (:password) WHERE username = :username');
        $insert->bindValue(1, $newPassword, PDO::PARAM_STR);
        $insert->bindValue(2, $_SESSION['username'], PDO::PARAM_STR);
        $insert->execute();
    // recuperation du mail
    // envoi par mail du nvx mdp
    // redirection login page 
}
else {
    echo "mauvaise réponse voici un lien pour la page home";
}

?>