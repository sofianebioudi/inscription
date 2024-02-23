<?php

	include ('function.php');
    session_start();
?>    

<html>
    <head>
        <title></title>
    </head>
        <body>

            <?php
                $connexion=getDBConnection();
                if (isset($_REQUEST["nom"]))
                    {
                    $result= insertion($_REQUEST["nom"],$_REQUEST["prenom"],$_REQUEST["login"],$_REQUEST["motDePasse"]);
                if ($result) {
                    $_SESSION["nom"]=$_REQUEST["nom"];
                    echo " <div>
                <h3>Client enregistré</h3>
                <br/><a href='formulaire.html'>Menu</a></div>";
                }
           
                } else {
                    
            ?>
             <form action="" method="post">

            <legend> Saisir les informations concernant la nouvelle personne </legend>


            <label for="nom">nom utilisateur </label>
            <input type="text" id="nom" name="nom" value="">  
            <br>      
            <label for="prenom">prénom utilisateur</label>
            <input type="text" id="prenom" name="prenom" value="">
            </br>
            <label for="login">Login utilisateur</label>
            <input type="text" id="login" name="login" value="">
            </br>
            <label for="password"> le mot de passe</label>
            <input type="text" id="password" name="motDePasse" value="">
            <br>
            <input type="submit" value="Valider">
            </form>
            <?php } ?>
        </body>    
</html>   