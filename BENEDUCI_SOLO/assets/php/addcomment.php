<?php
        require_once './connectDb.php';  // On inclut la connexion à la base de données
        $bdd = connectDb();

        // traitement d'ajout de commentaire à un post donné
        if (isset($_GET['comment']) && isset($_GET['user'])  && isset($_GET['post'])){
            $req = $bdd->prepare('SELECT `id` FROM `users` WHERE email = ?');
            $req->execute(array($_GET['user']));
            $data = $req->fetch();

            $user = $data['id'];

            $insert = $bdd->prepare('INSERT INTO commentaires(id_user, id_post, comment_content) VALUES(:user, :post, :content)');
            $insert->execute(array(
                'user' =>  $user,
                'post' => $_GET['post'],
                'content' => $_GET['comment']
        ));
        header('Location:../../index.php'); // Redirection vers la page d'accueil
    }
?>