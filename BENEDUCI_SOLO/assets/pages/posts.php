
<div class="posts">
    <?php
        $query2 = $bdd->prepare("SELECT distinct * FROM users where id = ?");
        $query2->execute(array($posts['id_user'])); // récuperation des données de la personne ayant posté le post
        $user = $query2->fetch();
    ?>

<!-- Affichage du post -->
    <a class="linkAccount" href="<?php echo './index.php?id='. $user['id']; ?>">
        <div class="posts_header" style="background-color: <?php echo $user['color']; ?>;">
            
            <img src="<?php echo './assets/img/perso/'. $user['perso']; ?>" alt="img_post">
            <div class="headerTheme">
                <h2><?php echo $user['pseudo']; ?></h2>

                <?php
                    $query3 = $bdd->prepare("SELECT distinct * FROM catégories where id = ?");
                    $query3->execute(array($posts['id_cat']));
                    $cat = $query3->fetch();
                ?>

                <p class="theme"><?php echo $cat['nom_theme']; ?></p>
            </div>
            <?php

                if(isset($_SESSION['user']) && $_SESSION['user'] == $user['email']){   
            ?>
                <div> <!-- gestion d'affichage s'il s'agit de l'utilisateur connecté -->
                    <a class="modif" href='<?php echo './index.php?modifier='. $posts['id']; ?>'><i class="fas fa-edit"></i></a>
                    <a class="supp" href='<?php echo './assets/php/posts.php?supprimer='. $posts['id']; ?>' onclick='return sure();' ><i class="fas fa-trash-alt"></i></a>
                </div>
                
            <?php 
                }
            ?>
        </div>
        
    </a>

        <div class="posts_content"> <!-- Contenue du post -->
            <h2><?php echo $posts['title']; ?></h2>
            <?php
                if($posts['img'] != './assets/img/posts/'){
            ?>
                <img src="<?php echo $posts['img']; ?>" alt="img_post">
            <?php
                }
            ?>
            
            <p><?php echo $posts['content']; ?></p>
            
        </div> <!-- Affichage des j'aime -->
        <div class="bottom_post">
            <div class="jaime">
            <?php
                
                

                if(isset($_SESSION['user'])){
                    $u = $bdd->prepare('SELECT * FROM `users` WHERE email = ?');
                    $u->execute(array($_SESSION['user']));
                    $userlike = $u->fetch();

                    $like = $bdd->prepare('SELECT COUNT(*) FROM likes WHERE id_user = ? and id_post = ?');
                    $like->execute(array($userlike['id'], $posts['id']));
                    $likes = $like->fetch();

                    if($likes['COUNT(*)'] != 0){
                    
            ?>
                <button class="coeur" id="<?php echo 'coeurfull' . $posts['id']; ?>" onclick="jaimepas(<?php echo $posts['id']; ?>)"><i class="fas fa-2x fa-heart"></i></i></button>                            
            <?php 
                    }else{
                    ?>
                <button  id="<?php echo 'coeur' . $posts['id']; ?>" onclick="jaime(<?php echo $posts['id']; ?>)"><i class="far fa-2x fa-heart"></i></button>

                    
                <?php 
                    }
                }else{
                    ?>
            
                <a class="coeurnonCo" id="<?php echo 'coeur' . $posts['id']; ?>" href="./assets/pages/login.php"><i class="far fa-2x fa-heart"></i></a>
            <?php  
                }
            ?>
                <p><?php echo $posts['nb_likes']; ?> J'aime</p>
            </div>
            <?php
                if(isset($_SESSION['user'])){
            ?>
                    <button class="addComment" onclick="addCommentDialog('<?php echo $posts['id']; ?>')"><i class="far fa-2x fa-comment"></i></button>
                </div>
                    <button  class="commentButton see"  onclick="voircomments(<?php echo $posts['id']; ?>)" id="<?php echo 'voir' . $posts['id']; ?>">Afficher les commentaires</button>
                    <button class="commentButton nosee" onclick="pasvoircomments(<?php echo $posts['id']; ?>)" id="<?php echo 'pasVoir' . $posts['id']; ?>">Cacher les commentaires</button>
            
        <?php
            $query333 = $bdd->prepare("SELECT count(*) as tot FROM commentaires where id_post = ?");
            $query333->execute(array($posts['id']));
            $comNumb = $query333->fetch();
            if($comNumb['tot'] == 0){ ?>
                <p class="nocomm" id="<?php echo 'comment' . $posts['id']; ?>">Aucun commentaire pour ce post</p>
            <?php
            }
        ?> <!-- Affichage des commentaires -->
        <div class="post_comments" id="<?php echo 'comment' . $posts['id']; ?>">
       
            <?php
                $query3 = $bdd->prepare("SELECT * FROM commentaires where id_post = ?");
                $query3->execute(array($posts['id']));
                foreach ($query3 as $comments){
                    
            ?>
            <div class="comm_unit">
            
                    
                        
                
                <a class="linkAccount" href="<?php echo './index.php?id='. $comments['id_user']; ?>">
                    <?php
                        $query2 = $bdd->prepare("SELECT distinct * FROM users where id = ?");
                        $query2->execute(array($comments['id_user']));
                        $usercomment = $query2->fetch();
                    ?>
                    <div class="comment_header">
                        <div class="usercomment" style="background-color: <?php echo $usercomment['color']; ?>;">
                            <img src="<?php echo './assets/img/perso/'. $usercomment['perso']; ?>" alt="img_post">
                            <h2><?php echo $usercomment['pseudo']; ?></h2>
                        </div>
                        <p class="comment"><?php echo $comments['comment_content']; ?></p>
                    </div>
                </a>
                <?php
                    if(isset($_SESSION['user']) && $_SESSION['user'] == $usercomment['email']){
                ?>
                    <div class="modifComment">
                        <button onclick="modifCommentDialog('<?php echo $comments['id']; ?>', '<?php echo $comments['comment_content']; ?>')"> <i class="fas fa-edit"></i></button>
                        <button onclick="surecomment('<?php echo $comments['id']; ?>')" ><i class="fas fa-trash-alt"></i></button>
                    </div>
                    
                <?php  
                    }
                ?>
            </div>
            
            
            
                <?php
                }
                }
            ?>
    </div>
                
</div>