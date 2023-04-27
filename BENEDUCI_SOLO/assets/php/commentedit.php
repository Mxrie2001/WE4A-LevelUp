<?php
        require_once './connectDb.php';  // On inclut la connexion à la base de données
        $bdd = connectDb();

        //traitement de suppression de commentaire
        if (isset($_GET['comment'])){
            $query = $bdd-> prepare('DELETE FROM commentaires WHERE id=?');
            $query->execute(array($_GET['comment']));
            header('Location:../../index.php'); // Redirection vers la page d'accueil
        }

        // traitement de modification de commentaire
        if(isset($_GET['commentchange']) && isset($_GET['id']))
        {
            $update = $bdd->prepare('UPDATE `commentaires` SET `comment_content`= ? WHERE id = ?');
            $update->execute(array($_GET['commentchange'], $_GET['id']));
            header('Location:../../index.php'); // Redirection vers la page d'accueil
        }
?>