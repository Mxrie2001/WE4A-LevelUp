<?php
    require_once 'connectDb.php'; // On inclu la connexion à la bdd
    
    $bdd = connectDb();
    // Si on get "supprimer dans l'url avec un id, le post est supprimé de la bdd
    if (isset($_GET['supprimer'])){
        
        $req = $bdd->prepare('SELECT * FROM posts WHERE id = ?');
        $req->execute(array($_GET['supprimer']));
        $data = $req->fetch();

        $query = $bdd-> prepare('DELETE FROM posts WHERE id=?');
        $query->execute(array($_GET['supprimer']));

        //on recupere le chemin de l'image
        $imgPostSupp = $data['img'];
        if($imgPostSupp != '../img/posts/'){
            $prefix = './assets/img/posts/';
            $str = $imgPostSupp;
        //on modifie ce dernier en fonction de là on on se trouve
        if (substr($str, 0, strlen($prefix)) == $prefix) {
            $str = substr($str, strlen($prefix));
        }
        //on supprime l'image du post supprimé dans les fichiers
        unlink("../img/posts/" . $str);
    }
        echo '<meta http-equiv="Refresh" content="0;URL=../../index.php?id=' .$data['id_user'].'">'; // Redirection vers la page d'accueil
    }
?>


<?php

// Si on peut recuperer les infos d'un post d'un formulaire, on insere le nouveau post à la bdd
if(isset($_POST['id_user']) && isset($_POST['cat']) && isset($_POST['title']) && isset($_FILES['img']) && isset($_POST['content']))
    {
        
        $file_name = $_FILES['img']['name'];
        $name = './assets/img/posts/'. $file_name; 
        $file_tmp = $_FILES['img']['tmp_name'];
        $file_destination = "../img/posts/" . $file_name; // le dossier de destination

        move_uploaded_file($file_tmp, $file_destination);  // enregistrement du fichier de l'utilisateur dans le dossier source stockage des image de post de l'application


        $insert = $bdd->prepare('INSERT INTO posts(id_user, id_cat, title, img, content, publication_date) VALUES(:id_user, :id_cat, :title, :img, :content, :publication_date)');
        $insert->execute(array(
            'id_user' => $_POST['id_user'],
            'id_cat' => $_POST['cat'],
            'title' => $_POST['title'],
            'img' => $name,
            'content' => $_POST['content'],
            'publication_date' => date("Y/m/d h:i:sa")
        ));


        echo '<meta http-equiv="Refresh" content="0;URL=../../index.php?id=' .$_POST['id_user'].'">'; // Redirection vers la page d'accueil
    }


    


?>


<?php

// Si on peut recuperer les infos d'un post à modifier d'un formulaire, on modifie le post dans la bdd
if(isset($_POST['idP']) && isset($_POST['cat']) && isset($_POST['titleM']) && isset($_FILES['imgM']) && isset($_POST['contentM']))
    {

        $file_name = $_FILES['imgM']['name'];
        $name = './assets/img/posts/'. $file_name; 

        if($name == './assets/img/posts/'){
            $req = $bdd->prepare('SELECT * FROM posts WHERE id = ?');
            $req->execute(array($_POST['idP']));
            $data = $req->fetch();
            $file_name = $data['img'];
            $name  = $data['img'];
        }else{
            $file_tmp = $_FILES['imgM']['tmp_name'];
            $file_destination = "../img/posts/" . $file_name; // le dossier de destination
            move_uploaded_file($file_tmp, $file_destination);
        }

        $insert = $bdd->prepare('UPDATE posts set id_cat= ?, title = ?,  img = ?,  content=? where id=?');
        $insert->execute(array($_POST['cat'], $_POST['titleM'], $name, $_POST['contentM'], $_POST['idP']));
        
        $req = $bdd->prepare('SELECT * FROM posts WHERE id = ?');
        $req->execute(array($_POST['idP']));
        $data = $req->fetch();

        echo '<meta http-equiv="Refresh" content="0;URL=../../index.php?id=' . $data['id_user'] .'">'; // Redirection vers la page d'accueil
    }


    


?>