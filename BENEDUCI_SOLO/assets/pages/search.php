<?php 
    session_start();
    require_once '../php/connectDb.php'; // ajout connexion bdd 
   // si la session existe pas soit si l'on est pas connecté on redirige
    if(isset($_SESSION['user'])){
        // On récupere les données de l'utilisateur
        $bdd = connectDb();
        $req = $bdd->prepare('SELECT * FROM users WHERE email = ?');
        $req->execute(array($_SESSION['user']));
        $data = $req->fetch();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/search.css">
    <link rel="stylesheet" href="../style/posts.css">
    <link href="../img/logo.png" rel="icon">
    <title>Level Up! - Search</title>
</head>
<body>
    <?php
        $page='search';
        include './header.php';
    ?>

    <main>
        <h1 class="homecatname">Search...</h1>

        <h2>Recherchez par mots clefs</h2>
        <!-- Formulaire de recherche en post -->
        <form method="POST" action=""> 
            <input type="text" name="recherche">
            <button type="SUBMIT">Go! </button>
        </form>


     <?php
        require_once('../php/connectDb.php');  // On inclut la connexion à la base de données

        $bdd=connectDb();

        // Récupère la recherche
        $recherche = isset($_POST['recherche']) ? $_POST['recherche'] : '';

        $q = $bdd->prepare("SELECT * FROM users WHERE pseudo LIKE '%$recherche%'");
        $q->execute(); // on recupere tout les utilisateur ayant cette recherche dans leur pseudo
        ?>
        <?php
        $req = $bdd->prepare("SELECT count(*) as total FROM users WHERE pseudo LIKE '%$recherche%'");
        $req->execute();
        $data22 = $req->fetch();
        if(isset($_POST['recherche'])){ // affichage résultat utilisateurs correspondant a la recherche
            if($data22['total'] == 0){
                echo "<h2>Utilisateurs :</h2>";
                echo "<p>Aucun utilisateur ne correspond à votre recherche.</p>";
            }else{
                echo "<h2>Utilisateurs :</h2>";
            foreach ($q as $r) {
                
                    ?>
                    <a class="linkAccountPerso" href="<?php echo '../../index.php?id=' . $r['id'] ?>">
                        <div class="search_unit">
                            <div class="usersearchprofil" style="background-color: <?php echo $r['color']; ?>;">
                                <img src="<?php echo '../img/perso/'. $r['perso']; ?>" alt="img_post">
                                <h2 class="pseudoR"><?php echo $r['pseudo']; ?></h2>
                            </div>
                        </div>
                    </a>
                    
                <?php
            }
        }
        }
        $q2 = $bdd->prepare("SELECT * FROM posts WHERE title LIKE '%$recherche%'"); // on recupere tout les posts ayant cette recherche dans leur titre ou contenu
        $q2->execute();
        ?>
        <?php
        $req = $bdd->prepare("SELECT count(*) as total FROM posts WHERE title LIKE '%$recherche%'");
        $req->execute();
        $data = $req->fetch();
        if(isset($_POST['recherche'])){ // affichage résultat utilisateurs correspondant a la recherche
            if($data['total'] == 0){
                echo "<h2>Posts :</h2>";
                echo "<p>Aucun post ne correspond à votre recherche.</p>";
            }else{
                echo "<h2>Posts :</h2>";
            
            foreach ($q2 as $posts) {
                
                ?>

                
<div class="posts">
    <?php
        $query2 = $bdd->prepare("SELECT distinct * FROM users where id = ?");
        $query2->execute(array($posts['id_user']));
        $user = $query2->fetch();
    ?>

    <a class="linkAccount" href="<?php echo '../../index.php?id='. $user['id']; ?>">
        <div class="posts_header" style="background-color: <?php echo $user['color']; ?>;">
            
            <img src="<?php echo '../img/perso/'. $user['perso']; ?>" alt="img_post">
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
                <div>
                    <a class="modif" href='<?php echo '../../index.php?modifier='. $posts['id']; ?>'><i class="fas fa-edit"></i></a>
                    <a class="supp" href='<?php echo '../php/posts.php?supprimer='. $posts['id']; ?>' onclick='return sure();' ><i class="fas fa-trash-alt"></i></a>
                </div>
                
            <?php 
                }
            ?>
        </div>
        
    </a>

        <div class="posts_content">
            <h2><?php echo $posts['title']; ?></h2>
            <?php
                if($posts['img'] != '../img/posts/'){
                    $prefix = './assets/img';
                $str = $posts['img'];;

                if (substr($str, 0, strlen($prefix)) == $prefix) {
                    $str = substr($str, strlen($prefix));
                } 
            ?>

                <img src="<?php echo '../img' . $str; ?>" alt="img_post">
            <?php
                }
            ?>
            
            <p><?php echo $posts['content']; ?></p>
            
        </div>
    </div>
                
</div>
            <?php
            }
            }
        }
    ?>


    </main>

    

    <?php
        include './footer.php';
    ?>   
    
    <script src="../js/fonctions.js"></script>
    <script src="https://kit.fontawesome.com/f5d01d2599.js" crossorigin="anonymous"></script>

</body>
</html>