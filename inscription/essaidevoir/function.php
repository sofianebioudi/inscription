<?php

    // Database configuration
    $host = 'localhost';
    $user = 'root'; // sio
    $password = ''; // slam
    $database = 'gestionbdd'; // gestionbdd
    
    // Function to get a database connection
    function getDBConnection() {
        global $host, $user, $password, $database;
        static $connection = null;
    
        if ($connection === null) {
            // Create connection
            $connection = mysqli_connect($host, $user, $password, $database);
    
            // Check connection
            if (!$connection) {
                die("Connection failed: " . mysqli_connect_error());
            }
        }
    
        return $connection;
    }

    function insertion($nom, $prenom, $login, $motDePasse) {
        $connexion = getDBConnection();
        
        if (!$connexion) {
            echo "Erreur de connexion à la base de données.";
            return;
        }
    
        $query = mysqli_prepare($connexion, "INSERT INTO clients (nom, prenom, login, motDePasse) VALUES (?, ?, ?, ?)");
    
        if (!$query) {
            echo "Erreur de préparation de la requête : " . mysqli_error($connexion);
            return;
        }
    
        mysqli_stmt_bind_param($query, "ssss", $nom, $prenom, $login, $motDePasse);
        $success = mysqli_stmt_execute($query);
    
        if ($success && mysqli_affected_rows($connexion) > 0) {
            echo "Nouveau client enregistré";
        } else {
            echo "L'enregistrement du client a échoué : " . mysqli_error($connexion);
        }
    
        mysqli_stmt_close($query);
        mysqli_close($connexion);
    }

    function modification($ancienLogin, $nouveauLogin) {
        $connexion = getDBConnection();
        
        if (!$connexion) {
            echo "Erreur de connexion à la base de données.";
            return;
        }
    
        $query = mysqli_prepare($connexion, "UPDATE clients SET login=? WHERE login=?");
        if (!$query) {
            echo "Erreur de préparation de la requête : " . mysqli_error($connexion);
            return;
        }
    
        mysqli_stmt_bind_param($query, "ss", $nouveauLogin, $ancienLogin);
        $success = mysqli_stmt_execute($query);
    
        if ($success && mysqli_affected_rows($connexion) > 0) {
            echo "Client modifié";
        } else {
            echo "La modification du client a échoué : " . mysqli_error($connexion);
        }
    
        mysqli_stmt_close($query);
        mysqli_close($connexion);
    }

function suppression($nom) {
    $connexion = getDBConnection(); // Obtenez d'abord une connexion à la base de données

    if (!$connexion) {
        echo "Erreur de connexion à la base de données.";
        return;
    }

    $query = mysqli_prepare($connexion, "DELETE FROM clients WHERE nom=?");
    
    if (!$query) {
        echo "Erreur de préparation de la requête : " . mysqli_error($connexion);
        return;
    }

    mysqli_stmt_bind_param($query, "s", $nom); // Liez les paramètres à la requête préparée
    $success = mysqli_stmt_execute($query);
    if ($success && mysqli_affected_rows($connexion) > 0) {
        echo "Client supprimé";
    } else {
        echo "La suppression a échoué";
    };

    mysqli_stmt_close($query);
    mysqli_close($connexion); // Fermez la connexion MySQLi
}

?>