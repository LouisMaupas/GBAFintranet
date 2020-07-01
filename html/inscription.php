<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'inscription</title>
</head>
<body>
    <div>
    <h1>Formulaire d'inscription</h1>
    <form method="POST" action="inscription_post.php">
        <p>
            <label for="id_user">id_user</label>:<input type="text" name="id_user" id="id_user" /><br />
            <label for="fname">fname</label>:<input type="text" name="fname" id="fname" /><br />
            <label for="lname">lname</label>:<input type="text" name="lname" id="lname" /><br />
            <label for="username">username</label>:<input type="text" name="username" id="username" /><br />
            <label for="password">password</label>:<input type="password" name="password" id="password" /><br />
            <label for="question">question</label>:<input type="text" name="question" id="question" /><br />
            <label for="answer">answer</label>:<input type="text" name="answer" id="answer" /><br />
            <input type="submit" value="envoyer"/>
        </p>
    </form>  
    </div>
</body>
</html>
