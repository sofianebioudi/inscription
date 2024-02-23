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
                if(isset($_REQUEST["nom"])) {
                    $nom = $_REQUEST["nom"];
                    $result = suppression($nom);
                    echo $result;
                    
                } else {
            ?>

             <form action="" method="post">

            <legend> Saisir le nom de l'utilisateur à supprimer </legend>


            <label for="nom">nom utilisateur </label>
            <input type="text" id="nom" name="nom" value="">  
            <br>      
            <input type="submit" value="Valider">
            </form>
            <?php } ?>
        </body>    
</html>   