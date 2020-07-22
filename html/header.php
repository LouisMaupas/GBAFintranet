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
                        <?php echo $_SESSION['lname'] . " " . $_SESSION['fname'] ?>                   
                    </a>
                    <br/>
                    <a href="logout.php">
                        Se déconnecter
                    </a>
                </div>
            </div>
        </div>          
    </header>