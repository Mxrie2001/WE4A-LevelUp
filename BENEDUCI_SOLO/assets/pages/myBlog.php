<?php
    $bdd = connectDb(); // connection avec la base de données
    $req = $bdd->prepare('SELECT * FROM users WHERE id = ?'); // récuperation des données de l'utilisateur 
    $req->execute(array($_GET['id']));
    $dataBlog = $req->fetch();
?>

<!-- Affichage du compte utilisateur -->
<div class="comptecatname" style="background-color: <?php echo $dataBlog['color']; ?>;">
    <div>
    <?php //gestion, si il s'agit de la personne actuellement connectée
        if(isset($_SESSION['user']) && $_SESSION['user'] == $dataBlog['email']){
    ?>
        <h1><?php echo $dataBlog['pseudo']; ?></h1>
        <a href="./assets/pages/myAccount.php" class="modif"><i class="fas fa-4x fa-fingerprint"></i></a>
    <?php  
        }else{
    ?>
        <h1 class="nomuser"><?php echo $dataBlog['pseudo']; ?></h1>
    <?php
        }
    ?>
    </div>
    
</div>

<div class="blog_header" style="background-color: <?php echo $dataBlog['color']; ?>;">
    <div>
        <img src="<?php echo './assets/img/perso/'. $dataBlog['perso']; ?>" alt="img_blog">
        <h1><?php echo $dataBlog['pseudo']; ?></h1>
    </div>
    
    <?php
        if(isset($_SESSION['user']) && $_SESSION['user'] == $dataBlog['email']){
    ?>
        <a href="./assets/pages/myAccount.php" class="modif"><i class="fas fa-4x fa-fingerprint"></i></a>
    <?php  
        }
    ?>
</div>

    <div class="Blogtitleheader">
        <div class="titleBlog">
            
            <?php
                if(isset($_SESSION['user']) && $_SESSION['user'] == $dataBlog['email']){
            ?>
                <h2>Mes Posts</h2>
                <a href="./index.php?page=newPost"><i class="fas fa-4x fa-plus-circle"></i></a>
                <!-- Affichage des post de l'utilisateur en question-->
            <?php  
                }else{
                $id_user = $dataBlog['id'];
                $p = $bdd->prepare('SELECT count(*) as total FROM posts where id_user=?');
                $p->execute(array($id_user));
                $okpost = $p->fetch();
                if($okpost['total'] != 0){
                    
            ?>
                <h2>Posts</h2>
            <?php
                    }  
                }
            ?>
            
        </div>
        <div class="Blogposts postdivContent">
            <?php
                $bdd=connectDb();
                $id_user = $dataBlog['id'];
                $p = $bdd->prepare('SELECT count(*) as total FROM posts where id_user=?');
                $p->execute(array($id_user));
                $okpost = $p->fetch();
                if($okpost['total'] != 0){
                    $query = $bdd->prepare('SELECT * FROM posts where id_user=?');
                    $query->execute(array($id_user));
                    foreach ($query as $posts) {
                        include './assets/pages/posts.php';
                    }
                }else{
                    echo 'Aucun post pour le moment (ಥ⌣ಥ)';
                }
            ?>
        </div>
        
               
    </div>