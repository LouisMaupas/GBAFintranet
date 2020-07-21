<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <title>page acteur</title>
</head>
<body>

    <header id="header">

        <div id="header-home-logo">
            <p>
                <img src="../ressources/logo-gbaf-reduit.png" alt="Logo de GBAF"/>
                <a href="home.php">
                    Accueil
                </a>
            </p>
        </div>
        <div id="header-profil">
            <div id="user-name">
                <div id="user-name-logo">
                    <p>
                        <img src="../ressources/logo-profil.png" alt="logo accès au profil"/> 
                    </p>
                </div>
                <div id="user-name-text">  
                    <a href="profil.php">
                        Mon profil : 
                        <?php echo "php nom prenom" ?>
                    </a>
                </div>
                <div id="header-logout">
                    <a href="logout.php">Se déconnecter</a>
                </div>
            </div>    
        </div>          

    </header>







</body>
</html>