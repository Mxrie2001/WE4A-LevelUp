<?php 
    session_start(); // lancement de session
    require_once './assets/php/connectDb.php'; // ajout connexion bdd 
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
    <!-- ajout des differentes feuilles de styles -->
    <link rel="stylesheet" href="assets/style/style.css">
    <link rel="stylesheet" href="assets/style/posts.css">
    <link rel="stylesheet" href="assets/style/blog.css">
    <link rel="stylesheet" href="assets/style/forum.css">
    <!-- ajout d'une icone à la fenetre, ici le logo -->
    <link href="./assets/img/logo.png" rel="icon">
    <title>Level Up!</title>
</head>
<body>
    
<?php
    $page='accueil'; //permet de savoir sur quelle page on se situe
    include './assets/pages/header.php'; //Inclusion du header à la page d'accueil
?>

    
    <main>


    <?php
    // affichage du contenu des pages en fonction de ce qui est GET dans l'url
    if(!isset($_GET['page']) && !isset($_GET['id']) && !isset($_GET['modifier'])){
        include './assets/pages/last_posts.php';
    }elseif(isset($_GET['id'])){
        $id = $_GET['id'];
        include './assets/pages/myBlog.php';
        
    }elseif(isset($_GET['modifier'])){
            $id = $_GET['modifier'];
            include './assets/pages/modifyPost.php';
    }else{
        $page = $_GET['page'];
        switch($page){
            case 'newPost':
                include './assets/pages/newPost.php';
            break;

            case 'histoire':
                include './assets/pages/histoire.php';
            break;

            case 'perso':
                include './assets/pages/perso.php';
            break;

            case 'jeux':
                include './assets/pages/jeux.php';
            break;

            case 'tips':
                include './assets/pages/tips.php';
            break;

            case 'film':
                include './assets/pages/film.php';
            break;

            case 'forum':
                include './assets/pages/forum.php';
            break;

            case 'news':
                include './assets/pages/news.php';
            break;
        }
        
    }

    ?>


    </main>
    

<?php
    include './assets/pages/footer.php'; // inclusion du footer
?>   
    
    <script>
        //fonction de verification à la suppresion d'un post
        function sure()
        {
            return(confirm('Etes-vous sûr de vouloir supprimer ce post?'));
        }

        //fonction de verification à la suppresion d'un commentaire
        function surecomment(id)
        {

            if (window.confirm('Etes-vous sûr de vouloir supprimer ce commentaire?'))
            {
                window.location.href = "./assets/php/commentedit.php?comment="+id;
            }
            
        }

        //fonction permettant l'ajout d'un commentaire
        function addCommentDialog(post)  {

            var result = prompt("Votre commentaire", "");
            var user = "<?php echo $_SESSION['user']; ?>";

            if(result != null)  {
                window.location.href = "./assets/php/addcomment.php?comment=" + result + "&user=" + user + "&post=" + post;

            }
        }

        //fonction permettant de modifier un commentaire
        function modifCommentDialog(commentaire, comm)  {

        var result = prompt("Votre commentaire", comm);

        if(result != null)  {
            window.location.href = "./assets/php/commentedit.php?commentchange=" + result + "&id=" + commentaire;

        }
        }

       
        //fonction permettant de voir les commentaires d'un post
        function voircomments(p) {  
            console.log(p);
            
            var on = document.getElementById("voir"+p);
            var off = document.getElementById("pasVoir"+p);
            var comm = document.getElementById("comment"+p);

            console.log(comm);
            comm.style.display = 'block';
            off.style.display = 'block';
            on.style.display = 'none';

        }

        //fonction permettant de cacher les commentaires d'un post
        function pasvoircomments(p) {  
            console.log(p);
            var on = document.getElementById("voir"+p);
            var off = document.getElementById("pasVoir"+p);
            var comm = document.getElementById("comment"+p);

            console.log(comm);
            comm.style.display = 'none';
            off.style.display = 'none';
            on.style.display = 'block';
        }

        //fonction permettant de liker un post
        function jaime(p) {  
            
            var coeur = document.getElementById("coeur"+p);
            var coeurfull = document.getElementById("coeurfull"+p);
            var user = "<?php echo $_SESSION['user']; ?>";

            window.location.href = "./assets/php/likes.php?jaime=" + p + "&user=" + user;


        }

        //fonction permettant de dé-liker un post
        function jaimepas(p) {  
            
            var coeur = document.getElementById("coeur"+p);
            var coeurfull = document.getElementById("coeurfull"+p);
            var user = "<?php echo $_SESSION['user']; ?>";

            window.location.href = "./assets/php/likes.php?jaimepas=" + p + "&user=" + user;


        }

    </script>

    

    <script src="https://kit.fontawesome.com/f5d01d2599.js" crossorigin="anonymous"></script>
</body>


</html>