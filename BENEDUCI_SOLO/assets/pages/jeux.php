<?php
require_once('./assets/php/connectDb.php');  // On inclut la connexion à la base de données
?>

<h1 class="homecatname">Jeux</h1>

    <div class="postdivContent">
        <?php
        // selection des post de la catégorie "jeux"
            $bdd=connectDb();
            $p = $bdd->prepare('SELECT count(*) as total FROM posts where id_cat = 3');
            $p->execute();
            $okpost = $p->fetch();
            if($okpost['total'] != 0){ // si il y a des posts dans cette catégorie
                $query = $bdd->prepare('SELECT * FROM posts where id_cat = 3');
                $query->execute();
               foreach ($query as $posts) {
                    // Pour chaque post je l'affiche grace à la page générique "post.php" avec les infos récupérées plus haut
                       include './assets/pages/posts.php';
           }
            }else{
                //Si aucun post n'est présent dans cette catégorie, j'affiche ce message
                echo 'rien a voir ici (⊙.☉)7';
            }
        ?>      
      
    </div>