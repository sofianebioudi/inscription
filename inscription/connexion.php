<?php

	include ('function.php');
    session_start();   
     include ('header.php');
?>    


        <body>

            <?php
                $connexion=getDBConnection();
            if(isset($_SESSION['error']) && $_SESSION['error']!="" ) { 
                echo "<h3 class='error'>";
                echo $_SESSION['error'];
                echo "</h3>";
            };
                if (isset($_REQUEST["login"]))
                    {
                        $_SESSION['error']="";
                    $result= signIn($_REQUEST["login"],$_REQUEST["motDePasse"]);     
                
                
           
                } else {
            $_SESSION["error"]="";        
            ?>
            <section class="connect">
            <div class="formulaire">
             <form action="" method="post">

            <legend> Saisir vos identifiants </legend>


            
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