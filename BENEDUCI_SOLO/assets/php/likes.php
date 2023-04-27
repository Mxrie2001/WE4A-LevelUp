<?php
        require_once './connectDb.php'; // On inclut la connexion à la base de données
        $bdd = connectDb();

        // si sont récuperé un id post et un id utilisateur avec un get "j'aime" 
        if(isset($_GET['jaime']) && isset($_GET['user']))
        {
            $req = $bdd->prepare('SELECT `id` FROM `users` WHERE email = ?');
            $req->execute(array($_GET['user']));
            $data = $req->fetch();

            $user = $data['id'];

            $req2 = $bdd->prepare('SELECT * FROM posts WHERE id = ?');
            $req2->execute(array($_GET['jaime']));
            $data2 = $req2->fetch();

            $new_nb_like = $data2['nb_likes'];
            $new_nb_like += 1; // incrémentation de 1 like pour le post


            //modification du nombre de like pour le post en question
            $update = $bdd->prepare('UPDATE `posts` SET `nb_likes`= ? WHERE id = ?');
            $update->execute(array($new_nb_like, $_GET['jaime']));

            // Ajout dans la table likes de l'id du post et l'id de l'utilisateur qui viens de liker le post pour une utilisation ultérieur
            $insert = $bdd->prepare('INSERT INTO likes(id_user, id_post) VALUES(:id_user, :id_post)');
            $insert->execute(array(
            'id_user' => $user,
            'id_post' => $_GET['jaime']
            ));

            header('Location:../../index.php');
        }
        
        // si sont récuperé un id post et un id utilisateur avec un get "j'aime pas" 
        if(isset($_GET['jaimepas']) && isset($_GET['user']))
        {
            $req3 = $bdd->prepare('SELECT `id` FROM `users` WHERE email = ?');
            $req3->execute(array($_GET['user']));
            $data3 = $req3->fetch();

            $user1 = $data3['id'];

            $req4 = $bdd->prepare('SELECT * FROM posts WHERE id = ?');
            $req4->execute(array($_GET['jaimepas']));
            $data4 = $req4->fetch();

            $new_nb_likes = $data4['nb_likes'];
            $new_nb_likes -= 1; // décrémentation de 1 like pour le post


            //modification du nombre de like pour le post en question
            $update = $bdd->prepare('UPDATE `posts` SET `nb_likes`= ? WHERE id = ?');
            $update->execute(array($new_nb_likes, $_GET['jaimepas']));
            
            // Suppression dans la table likes de l'id du post et l'id de l'utilisateur qui viens d'enlever son like
            $delete = $bdd-> prepare('DELETE FROM likes WHERE id_user=? and id_post=?');
            $delete->execute(array($user1, $_GET['jaimepas']));

            header('Location:../../index.php');
        }
?>