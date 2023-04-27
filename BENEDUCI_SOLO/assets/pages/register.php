<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/registerLogin.css">
    <link href="../img/logo.png" rel="icon">
    <title>Level Up! - Register</title>
</head>
<body><?php
    $page='register';
    include './header.php';
?>

    <main>
        <h1 class="homecatname">Register</h1>
        <h2>Inscris toi!</h2>
        <div class="formulaire">
            <!-- Formulaire d'inscription en post -->
            <div class="imgconnect imgreg"></div>
            <form action="../php/register.php" method="post">
                <div class="formInput PS">
                    <label for="name">Pseudo :</label>
                    <input type="text" id="name" name="user_name" required>
                </div>
                <div class="formInput">
                    <label for="mail">Email :</label>
                    <input type="email" id="mail" name="user_mail" required>
                </div>

                <div class="formInput">
                    <label for="password">Mot de Passe :</label>
                    <input type="password" id="password" name="user_password" required>
                </div>

                <div class="formInput">
                    <label for="password2">Retaper le Mot de Passe :</label>
                    <input type="password" id="password2" name="user_password2" required>
                </div>

                <div class="formInput">
                    <p>Personnage :</p>

                    <div>
                        <input type="radio" id="fB" name="user_perso" value="fantomeB.png" checked>
                        <label for="fB">Fantome Bleu</label>
                    </div>

                    <div>
                        <input type="radio" id="fR" name="user_perso" value="fantomeR.png">
                        <label for="fR">Fantome Rouge</label>
                    </div>

                    <div>
                        <input type="radio" id="L" name="user_perso" value="luigi.png">
                        <label for="L">Luigi</label>
                    </div>

                    <div>
                        <input type="radio" id="M" name="user_perso" value="mario.png">
                        <label for="M">Mario</label>
                    </div>

                    <div>
                        <input type="radio" id="RB" name="user_perso" value="roi-boo.png">
                        <label for="RB">Roi Boo</label>
                    </div>

                    <div>
                        <input type="radio" id="P" name="user_perso" value="peach.png">
                        <label for="P">Peach</label>
                    </div>
                    <div>
                        <input type="radio" id="S" name="user_perso" value="skelerex.png">
                        <label for="S">Skelerex</label>
                    </div>
                    <div>
                        <input type="radio" id="Y" name="user_perso" value="yoshi.png">
                        <label for="Y">Yoshi</label>
                    </div>

                </div>

                <div class="formInput">
                    <p>Couleur :</p>

                    <div>
                        <input type="radio" id="Rouge" name="user_color" value="red" checked>
                        <label for="Rouge">Rouge</label>
                    </div>

                    <div>
                        <input type="radio" id="Bleu" name="user_color" value="blue">
                        <label for="Bleu">Bleu</label>
                    </div>

                    <div>
                        <input type="radio" id="Jaune" name="user_color" value="yellow">
                        <label for="Jaune">Jaune</label>
                    </div>

                    <div>
                        <input type="radio" id="Violet" name="user_color" value="purple">
                        <label for="Violet">Violet</label>
                    </div>

                    <div>
                        <input type="radio" id="Green" name="user_color" value="green">
                        <label for="Green">Vert</label>
                    </div>

                    

                </div>

                <div class="btn">
                    <button class="btnRe" type="submit">S'inscrire</button>
                </div>

                <div class="help"> 
                    <a href="./login.php"><img src="../img/help.png" alt="help"> Déjà un compte?</a>
                </div>

            </form>
        </div>
        
    </main>

    

    <?php
    $page='register';
    include './footer.php';
    ?>  
    <script src="https://kit.fontawesome.com/f5d01d2599.js" crossorigin="anonymous"></script>

</body>
</html>