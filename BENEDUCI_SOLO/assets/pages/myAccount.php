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
    <link rel="stylesheet" href="../style/compte.css">
    <link href="../img/logo.png" rel="icon">
    <title>Level Up! - Mon compte</title>
</head>
<body>
    
<?php
    $page='mon compte';
    include './header.php';
?>

    <main>
        <h1 class="homecatname">Mon compte</h1>
        <h2>Mes Informations</h2>
        <?php

    if(!isset($_GET['modif'])){
        ?>
        

        <!-- Affichage des information personnelle de l'utilisateur -->
        <div class="compteContainer">
            <div class="comptePP">
                <img src="<?php echo '../img/perso/' . $data['perso']; ?>" alt="">
            </div>
            <div class="compteInfo">
                <p class="info">Pseudo : <?php echo $data['pseudo']; ?></p>
                <p>Email : <?php echo $data['email']; ?></p>
                <div class="container">
                    <p>Mot de Passe : ********</p> 
                    <a class="mdp" href="./myAccount.php?modif=mdp"><i class="far fa-edit"></i></a>
                </div>
                
                <div class="container">
                    <p>Couleur : </p> 
                    <div class="color" style="background-color: <?php echo $data['color']; ?>;"></div>
                </div>

                <div class="btn">
                    <a href="./myAccount.php?modif=ok">Modifier <i class="far fa-edit"></i></a>
                </div>
                
            </div>
        </div>

    <?php
    }else{ 
        $modif = $_GET['modif'];
        switch($modif){
            case 'ok':
        ?>
            <form action="../php/edit.php" method="POST">
                <!-- Formulaire de modification des informations personnelles de l'utilisateur -->
                    <div class="formInput PS">
                        <label for="name">Pseudo :</label>
                        <input type="text" id="name" name="user_name" value= "<?php echo $data['pseudo']; ?>">
                    </div>
                    <div class="formInput">
                        <label for="mail">Email :</label>
                        <input type="email" id="mail" name="user_mail" value= "<?php echo $data['email']; ?> " disabled>
                    </div>

                    <div class="formInput">
                        <p>Personnage :</p>

                        <div>
                            <input type="radio" id="fB" name="user_perso" value="fantomeB.png" <?php if ($data['perso'] === 'fantomeB.png'){ ?> checked <?php } ?>  >
                            <label for="fB">Fantome Bleu</label>
                        </div>

                        <div>
                            <input type="radio" id="fR" name="user_perso" value="fantomeR.png" <?php if ($data['perso'] == 'fantomeR.png'){ ?> checked <?php } ?>>
                            <label for="fR">Fantome Rouge</label>
                        </div>

                        <div>
                            <input type="radio" id="L" name="user_perso" value="luigi.png" <?php if ($data['perso'] == 'luigi.png'){ ?> checked <?php } ?>>
                            <label for="L">Luigi</label>
                        </div>

                        <div>
                            <input type="radio" id="M" name="user_perso" value="mario.png" <?php if ($data['perso'] == 'mario.png'){ ?> checked <?php } ?>>
                            <label for="M">Mario</label>
                        </div>

                        <div>
                            <input type="radio" id="RB" name="user_perso" value="roi-boo.png" <?php if ($data['perso'] == 'roi-boo.png') { ?> checked <?php } ?>>
                            <label for="RB">Roi Boo</label>
                        </div>

                        <div>
                            <input type="radio" id="P" name="user_perso" value="peach.png" <?php if ($data['perso'] == 'peach.png') { ?> checked <?php } ?>>
                            <label for="P">Peach</label>
                        </div>
                        <div>
                            <input type="radio" id="S" name="user_perso" value="skelerex.png" <?php if ($data['perso'] == 'skelerex.png') { ?> checked <?php } ?>>
                            <label for="S">Skelerex</label>
                        </div>
                        <div>
                            <input type="radio" id="Y" name="user_perso" value="yoshi.png" <?php if ($data['perso'] == 'yoshi.png') { ?> checked <?php } ?>>
                            <label for="Y">Yoshi</label>
                        </div>

                    </div>

                    <div class="formInput">
                        <p>Couleur :</p>

                        <div>
                            <input type="radio" id="Rouge" name="user_color" value="red" <?php if ($data['color'] == 'red') { ?> checked <?php } ?>>
                            <label for="Rouge">Rouge</label>
                        </div>

                        <div>
                            <input type="radio" id="Bleu" name="user_color" value="blue" <?php if ($data['color'] == 'blue') { ?> checked <?php } ?>>
                            <label for="Bleu">Bleu</label>
                        </div>

                        <div>
                            <input type="radio" id="Jaune" name="user_color" value="yellow" <?php if ($data['color'] == 'yellow') { ?> checked <?php } ?>>
                            <label for="Jaune">Jaune</label>
                        </div>

                        <div>
                            <input type="radio" id="Violet" name="user_color" value="purple" <?php if ($data['color'] == 'purple') { ?> checked <?php } ?>>
                            <label for="Violet">Violet</label>
                        </div>

                        <div>
                            <input type="radio" id="Green" name="user_color" value="green" <?php if ($data['color'] == 'green') { ?> checked <?php } ?>>
                            <label for="Green">Vert</label>
                        </div>

                        <div class="transparent">
                            <input type="texte"  id="mailOrigine" readonly="readonly" name="user_mail" value= "<?php echo $data['email']; ?>">
                        </div>

                    </div>

                    <div class="btn">
                        <button type="submit">Modifier</button>
                    </div>

                </form>


        <?php
            break;

            case 'mdp':
        ?>
            <!-- Formulaire de modification de mot de passe -->
            <form action="../php/edit.php" method="POST">
                <div class="formInput">
                    <label for="password">Nouveau Mot de Passe :</label>
                    <input type="password" id="password" name="user_password" required>
                </div>

                <div class="formInput">
                    <label for="password2">Retaper le Mot de Passe :</label>
                    <input type="password" id="password2" name="user_password2" required>
                </div>


                <div class="transparent">
                    <input type="texte"  id="mailOrigine" readonly="readonly" name="user_mail" value= "<?php echo $data['email']; ?>">
                </div>

                </div>

                <div class="btn">
                    <button type="submit">Modifier</button>
                </div>

            </form>
        
        <?php
            break;

            case 'erreur':
        ?>
            <!-- Gestion d'erreur en cas de 2 mot de passe differents retapés-->
             <div class="alert">
                <strong>Erreur</strong> mots de passe differents
            </div>
            <form action="../php/edit.php" method="POST">
                <div class="formInput">
                    <label for="password">Mot de Passe :</label>
                    <input type="password" id="password" name="user_password" required>
                </div>

                <div class="formInput">
                    <label for="password2">Retaper le Mot de Passe :</label>
                    <input type="password" id="password2" name="user_password2" required>
                </div>


                <div class="transparent">
                    <input type="texte"  id="mailOrigine" readonly="readonly" name="user_mail" value= "<?php echo $data['email']; ?>">
                </div>

                </div>

                <div class="btn">
                    <button type="submit">Modifier</button>
                </div>

            </form>
        
        <?php
            break;
            }
        ?>
    
        
    

    <?php
    }?>
        
        
        

    
    </main>

<?php
    include './footer.php';
?>   
    
    
    <script src="https://kit.fontawesome.com/f5d01d2599.js" crossorigin="anonymous"></script>
</body>


</html>