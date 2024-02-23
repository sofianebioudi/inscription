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
                if (isset($_REQUEST["oldlogin"]))
                    {
                    $result= modification($_REQUEST["oldlogin"], $_REQUEST["newlogin"]);
                if ($result) {
                    $_SESSION["login"]=$_REQUEST["newlogin"];
                    echo " <div>
                <h3>Modification enregistrée</h3>
                <br/><a href='formulaire.html'>Menu</a></div>";
                }
           
                } else {
                    
            ?>
             <form action="" method="post">

            <legend> Modification de l'email de l'utilisateur </legend>


            <label for="oldlogin">Ancien Login </label>
            <input type="text" id="oldlogin" name="oldlogin" value="">  
            <br>      
            <label for="newlogin">Nouveau Login</label>
            <input type="text" id="newlogin" name="newlogin" value="">
            </br>
            <input type="submit" value="Valider">
            </form>
            <?php } ?>
        </body>    
</html>   
