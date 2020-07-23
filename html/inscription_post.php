<?php 
    // connexion à la bdd
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=projettroisbdd;charset=utf8', 'root', '');
    }
    catch (Exception $e)
    {
            die('Erreur : ' . $e->getMessage());
    }
        
    // recuperation des infos
    $id_user = $_POST['id_user'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mail = $_POST['mail'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    //hachage du mdp
    $password = password_hash($password, PASSWORD_DEFAULT);
    $question = $_POST['question'];
    $answer = $_POST['answer'];

    echo "$id_user + $fname + $lname + $username + $password + $question + $answer";

    // Insertion
    /*
    $req = $bdd->prepare('INSERT INTO account(id_user, fname, lname, username, password, question, answer  ) VALUES (:id_user, :fname, :lname, :username, :password, :question, :answer)');
    $req->execute(array(
        'id_user' => $id_user,
        'fname' => $fname,
        'lname' => $lname,
        'username' => $username,
        'password' => $password,
        'question' => $question,
        'answer' => $answer));*/
    echo ' ça marche';

    $req = $bdd->prepare('INSERT INTO account (id_user, fname, lname, mail, username, password, question, answer ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
    $req->bindValue(1, $id_user, PDO::PARAM_INT);
    $req->bindValue(2, $fname, PDO::PARAM_STR);
    $req->bindValue(3, $lname, PDO::PARAM_STR);  
    $req->bindValue(4, $mail, PDO::PARAM_STR);
    $req->bindValue(5, $username, PDO::PARAM_STR);
    $req->bindValue(6, $password, PDO::PARAM_STR);
    $req->bindValue(7, $question, PDO::PARAM_STR); 
    $req->bindValue(8, $answer, PDO::PARAM_STR);   
    $req->execute();

  ?>
<br/><a href="inscription.php">Revenir à l'inscription</a>
