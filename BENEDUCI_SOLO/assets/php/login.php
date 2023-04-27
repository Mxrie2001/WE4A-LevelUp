<?php 
    session_start(); // Démarrage de la session
    require_once 'connectDb.php'; // On inclut la connexion à la base de données

    if(!empty($_POST['user_mail']) && !empty($_POST['user_password'])) // Si il existe les champs pseudo, password et qu'il sont pas vident
    {
        // Patch XSS
        $email = htmlspecialchars($_POST['user_mail']); 
        $password = htmlspecialchars($_POST['user_password']);
        
        
        // On regarde si l'utilisateur est inscrit dans la table utilisateurs
        $bdd = connectDb();
        $check = $bdd->prepare('SELECT id, pseudo, email, password FROM users WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();
        

        // Si > à 0 alors l'utilisateur existe
        if($row > 0)
        {

                // Si le mot de passe est le bon
                if(password_verify($password, $data['password']))
                {
                    // On créer la session et on redirige sur l'accueil
                    $_SESSION['user'] = $data['email'];
                    $id=$data['id'];
                    header('Location: ../../index.php?id=' . $id);
                    die();
                }else{ header('Location: ../pages/login.php?login_err=password'); die(); }
        }else{ header('Location: ../pages/login.php?login_err=already'); die(); }
    }else{ header('Location: ../pages/login.php'); die();} // si le formulaire est envoyé sans aucune données
