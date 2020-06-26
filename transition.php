<?php function redirect_to($url){
     header("Location:".$url);
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <title>connexion</title>
</head>
<body>
    <header></header>
    <div id="container">
            <?php 
            $id = $_POST['id'];
            echo $id;
            if (!isset($id) == "de")
            {
                redirect_to('C:\wamp64\www\projet3\html\home.php');
            } 
            else
            { 
                redirect_to('C:\wamp64\www\projet3\formFirstCo.php');       
            }
            ?>     
    </div>    
    <footer></footer>
</body>
</html>