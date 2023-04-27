<?php
    require_once('../php/connectDb.php');  // On inclut la connexion à la base de données
    $sessionId = $_GET['PHPSESSID']; // On recupere la session à cause du ajax asynchrone qui la perd
    session_id($sessionId);
    session_start(); // On relance la session
    
    // selection des 5 derniers post affiché dans l'ordre descendent
    $bdd=connectDb();
    $p = $bdd->prepare('SELECT count(*) as total FROM posts');
    $p->execute();
    $okpost = $p->fetch();
    if($okpost['total'] != 0){ // si il y a des posts 

        $postNumber = $_GET["firstPost"];
        $query = $bdd->prepare("SELECT * FROM posts order by id desc limit 5 OFFSET ".$postNumber);
        $query->execute();

        foreach ($query as $posts) {
            // Pour chaque post je l'affiche grace à la page générique "post.php" avec les infos récupérées plus haut
            include './posts.php';
            $postNumber++;
        }

          
  
          //While terminé. On crée un bouton "charger plus de posts"
            $pencore = $bdd->prepare('SELECT count(*) as total FROM posts');
            $pencore->execute();
            $morebutton = $pencore->fetch();

            if($postNumber < $morebutton['total']){
                echo '<div id="morePosts" class="morePostButton">
                    <button type="button" onclick="loadMorePosts('.$postNumber.')">Charger plus de Posts</button>
                </div>';
            }
          
      
    }else{
        //Si aucun post n'est présent dans cette catégorie, j'affiche ce message
        echo 'rien a voir ici (⊙.☉)7';
    } 
?>