<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/registerLogin.css">
    <link href="../img/logo.png" rel="icon">
    <title>Level Up! - Login</title>
</head>
<body>
<?php
    $page='login';
    include './header.php';
?>

    <main>
        <h1 class="homecatname">Login</h1>
        <h2>Connecte toi!</h2>
        <?php  // gestion des messages d'erreurs
                if(isset($_GET['login_err']))
                {
                    $err = htmlspecialchars($_GET['login_err']);

                    switch($err)
                    {
                        case 'password':
                        ?>
                            <div class="alert">
                                <strong>Erreur</strong> mot de passe incorrect
                            </div>
                        <?php
                        break;

                        case 'email':
                        ?>
                            <div class="alert">
                                <strong>Erreur</strong> email incorrect
                            </div>
                        <?php
                        break;

                        case 'already':
                        ?>
                            <div class="alert">
                                <strong>Erreur</strong> compte non existant
                            </div>
                        <?php
                        break;
                    }
                }
                ?> 
        <div class="formulaire LoginForm">
            <!-- formulaire de login en post -->
            <form action="../php/login.php" method="post">
                <div class="formInput">
                    <label for="mail">Email :</label>
                    <input type="email" id="mail" name="user_mail" required>
                </div>

                <div class="formInput">
                    <label for="password">Mot de Passe :</label>
                    <input type="password" id="password" name="user_password" required>
                </div>

                <div class="btn">
                    <button class="btnCo" type="submit">Se connecter</button>
                </div>

                <div class="help"> 
                    <a href="./register.php"><img src="../img/help.png" alt="help"> Pas encore de compte?</a>
                </div>

                

            </form>
            <div class="imgconnect imgcon"></div>
        </div>
        
    </main>

    

    <?php
    $page='login';
    include './footer.php';
    ?>  
    <script src="https://kit.fontawesome.com/f5d01d2599.js" crossorigin="anonymous"></script>

</body>
</html>