<?php 
    require_once 'connectDb.php'; // On inclu la connexion à la bdd

    // Si les variables existent et qu'elles ne sont pas vides
    if(!empty($_POST['user_name']) && !empty($_POST['user_mail']) && !empty($_POST['user_password']) && !empty($_POST['user_password2']) && !empty($_POST['user_perso']) && !empty($_POST['user_color']))
    {
        // Patch XSS
        $pseudo = htmlspecialchars($_POST['user_name']);
        $email = htmlspecialchars($_POST['user_mail']);
        $password = htmlspecialchars($_POST['user_password']);
        $password_retype = htmlspecialchars($_POST['user_password2']);
        $perso = htmlspecialchars($_POST['user_perso']);
        $color = htmlspecialchars($_POST['user_color']);

        // On vérifie si l'utilisateur existe
        $bdd = connectDb();
        $check = $bdd->prepare('SELECT pseudo, email password FROM users WHERE email = ?');
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();

        $email = strtolower($email); // on transforme toute les lettres majuscule en minuscule pour éviter que Foo@gmail.com et foo@gmail.com soient deux compte différents ..
        
        // Si la requete renvoie un 0 alors l'utilisateur n'existe pas 
        if($row == 0){ 
            if(strlen($pseudo) <= 200){ // On verifie que la longueur du pseudo <= 200
                if(strlen($email) <= 200){ // On verifie que la longueur du mail <= 200
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){ // Si l'email est de la bonne forme
                        if($password === $password_retype){ // si les deux mdp saisis sont bon

                            // On hash le mot de passe avec Bcrypt, via un coût de 10
                            $cost = ['cost' => 10];
                            $password = password_hash($password, PASSWORD_BCRYPT, $cost);
                            

                            // On insère dans la base de données
                            $bdd = connectDb();
                            $insert = $bdd->prepare('INSERT INTO users(pseudo, perso, color, email, password) VALUES(:pseudo, :perso, :color, :email, :password)');
                            $insert->execute(array(
                                'pseudo' => $pseudo,
                                'perso' => $perso,
                                'color' => $color,
                                'email' => $email,
                                'password' => $password
                            ));
                            // On redirige si succes avec la création de session, le compte est crée, l'utilisateur est connecté
                            session_start();
                            $_SESSION['user'] = $email;
                            $bdd = connectDb();
                            $req = $bdd->prepare('SELECT * FROM users WHERE email = ?');
                            $req->execute(array($_SESSION['user']));
                            $data = $req->fetch();
                            $id=$data['id'];
                            header('Location: ../../index.php?id=' . $id);
                            die();
                        }else{ header('Location: ../pages/register.php?reg_err=password'); die();}
                    }else{ header('Location: ../pages/register.php?reg_err=email'); die();}
                }else{ header('Location: ../pages/register.php?reg_err=email_length'); die();}
            }else{ header('Location: ../pages/register.php?reg_err=pseudo_length'); die();}
        }else{ header('Location: ../pages/register.php?reg_err=already'); die();}
    }
