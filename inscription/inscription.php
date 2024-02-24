<?php

	include ('function.php');
    session_start();
     include ('header.php');
?>    


   
        <body>

            <?php
                $connexion=getDBConnection();
                 
                if (isset($_REQUEST["nom"]))
                    {
                    $result= insertion($_REQUEST["nom"],$_REQUEST["prenom"],$_REQUEST["login"],$_REQUEST["motDePasse"]);
                if ($result) {
                    $_SESSION["nom"]=$_REQUEST["nom"];
                    header("Location: connexion.php");
                }
           
                } else {
                    
            ?>
            <section class="connect">
            <div class="formulaire">
             <form action="" method="post">

            <legend> Saisir les informations concernant votre inscription </legend>


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
            </div>
            </section>
            <?php include('footer.php'); } ?>