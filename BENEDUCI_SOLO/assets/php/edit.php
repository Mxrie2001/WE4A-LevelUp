<?php
    require_once 'connectDb.php';  // On inclut la connexion à la base de données
    $bdd = connectDb();
    
    // Traitement des infos personnelles de l'utilisateur
    if (isset($_POST['user_name']) && isset($_POST['user_perso']) && isset($_POST['user_color']) && isset($_POST['user_mail'])){
        // Modification dans la bdd
        $query= $bdd -> prepare('UPDATE `users` set `pseudo`=?, `perso`=?, `color`=? where `email`=?');
        $query -> execute(array($_POST['user_name'], $_POST['user_perso'], $_POST['user_color'],$_POST['user_mail']));
        header('Location: ../pages/myAccount.php'); // Redirection vers la page d'accueil
    }

    // Traitement modification de mot de passe (avec vérification)
    if (isset($_POST['user_password']) && isset($_POST['user_password2']) && isset($_POST['user_mail'])){
        $password = $_POST['user_password'];
        $password_retype = $_POST['user_password2'];

        if($password === $password_retype){ // si les deux mdp saisis sont bon

            // On hash le mot de passe avec Bcrypt, via un coût de 10
            $cost = ['cost' => 10];
            $password = password_hash($password, PASSWORD_BCRYPT, $cost);

            // Modification dans la bdd
            $query= $bdd -> prepare('UPDATE `users` set `password`=? where `email`=?');
            $query -> execute(array($password, $_POST['user_mail']));
            header('Location: ../pages/myAccount.php');  // Redirection vers la page d'accueil
        }else{ header('Location: ../pages/myAccount.php?modif=erreur'); echo 'erreur'; die();}  // Gestion d'erreur
    }
?>