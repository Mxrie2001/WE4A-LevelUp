<header>

<!-- Affichage version ordinateur -->
<div class="ordi">
<?php 
    
    if(!isset($_SESSION['user'])){
?>
    <!-- Gestion d'affichage si l'utilisateur est connecté ou non -->
    <?php if ($page=='accueil'){ ?>
        <div class="headerRegisterLogin">
            <div>
                <a href="./assets/pages/search.php" class="search">
                    <i class="fas fa-2x fa-search"></i>
                    Search...
                </a>
            </div>
            <div>
                <a class="log" href="./assets/pages/login.php">Login</a>
                <a class="reg" href="./assets/pages/register.php">Register</a>
            </div>
            
        </div>
    <?php
        }else{
    ?>
        <div class="headerRegisterLogin">
            <div>
                <a href="./search.php" class="search">
                    <i class="fas fa-2x fa-search"></i>
                    Search...
                </a>
            </div>
            <div>
                <a class="log" href="./login.php">Login</a>
                <a class="reg" href="./register.php">Register</a>
            </div>
        </div>
    <?php
        }
    ?>


   
    <?php 
        }else{
        $user = $_SESSION['user'];
    ?>

    <?php if ($page=='accueil'){ ?>
        <div class="headerRegisterLogin connected">
            <div>
                <a href="./assets/pages/search.php" class="search">
                    <i class="fas fa-2x fa-search"></i>
                    Search...
                </a>
            </div> 
            <div class="logoutPseudo">
                <a class="account" href="<?php echo './index.php?id='. $data['id']; ?>">
                    <img src="<?php echo './assets/img/perso/'. $data['perso']; ?>" alt="pp">
                    <?php echo $data['pseudo']; ?>
                </a>    
                <a class="logout" href="./assets/php/logout.php">
                    Déconnexion 
                    <p><i class="fas fa-2x fa-sign-out-alt"></i></p>
                </a>
            </div>   
        </div>
    <?php
        }else{
    ?>
        <div class="headerRegisterLogin connected">
            <div>
                <a href="./search.php" class="search">
                    <i class="fas fa-2x fa-search"></i>
                    Search...
                </a>
            </div>
            <div class="logoutPseudo">
                <a class="account" href="<?php echo '../../index.php?id='. $data['id']; ?>">
                    <img src="<?php echo '../img/perso/'.  $data['perso']; ?>" alt="pp">
                    <?php echo $data['pseudo']; ?>
                </a>    
                <a class="logout" href="../php/logout.php">
                    Déconnexion 
                    <p><i class="fas fa-2x fa-sign-out-alt"></i></p>
                </a>
            </div>
            
        </div>
    <?php
        }
    ?>
    
   

    <?php 
        }
    ?>

    <?php if ($page=='accueil'){ ?>
        <a class="logoContainer" href="./index.php">
            <img class="logo" src="assets/img/logo.png" alt="logo">
            <h1 class="title">Level Up !</h1> 
        </a>
    <?php
        }else{
    ?>
        <a class="logoContainer" href="../../index.php">
            <img class="logo" src="../img/logo.png" alt="logo">
            <h1 class="title">Level Up !</h1> 
        </a>
    <?php
        }
    ?>

    
        
    
    
<!-- Affichage du header avec des liens et un menu fonctionnels en fonction de la page sur laquelle est l'utilisateur -->
    <div class="headerBottom">
        <ul>
        <?php if ($page=='accueil'){ ?>
            <li><a href="./index.php"> <img src="./assets/img/menu/bigChampi.png" alt="">Accueil</a></li>
            <li><a href="./index.php?page=histoire"> <img src="./assets/img/menu/feuille.png" alt="">Histoire</a></li>
            <li><a href="./index.php?page=perso"> <img src="./assets/img/menu/coquille.png" alt="">Personnages</a></li>
            <li><a href="./index.php?page=jeux"> <img src="./assets/img/menu/champiV.png" alt="">Jeux</a></li>
            <li><a href="./index.php?page=tips"> <img src="./assets/img/menu/fleur.png" alt=""> Tips</a></li>
            <li><a href="./index.php?page=film"> <img src="./assets/img/menu/champiR.png" alt="">Film</a></li>
            <li><a href="./index.php?page=forum"> <img src="./assets/img/menu/oeuf.png" alt=""> Forum</a></li>
            <li><a href="./index.php?page=news"> <img src="./assets/img/menu/etoile.png" alt=""> Nouveautés</a></li>
        <?php
            }else{
        ?>
            <li><a href="../../index.php"> <img src="../img/menu/bigChampi.png" alt="">Accueil</a></li>
            <li><a href="../../index.php?page=histoire"> <img src="../img/menu/feuille.png" alt="">Histoire</a></li>
            <li><a href="../../index.php?page=perso"> <img src="../img/menu/coquille.png" alt="">Personnages</a></li>
            <li><a href="../../index.php?page=jeux"> <img src="../img/menu/champiV.png" alt="">Jeux</a></li>
            <li><a href="../../index.php?page=tips"> <img src="../img/menu/fleur.png" alt=""> Tips</a></li>
            <li><a href="../../index.php?page=film"> <img src="../img/menu/champiR.png" alt="">Film</a></li>
            <li><a href="../../index.php?page=forum"> <img src="../img/menu/oeuf.png" alt=""> Forum</a></li>
            <li><a href="../../index.php?page=news"> <img src="../img/menu/etoile.png" alt=""> Nouveautés</a></li>
        <?php
            }
        ?>
           
        </ul>
    </div>
</div>

<!-- Affichage version telephone sous forme d'un menu toogle -->
<div class="tel">

<nav role="navigation">
  <div id="menuToggle">
    
    <input type="checkbox" />

    <span></span>
    <span></span>
    <span></span>
    
    
    <ul id="menu">
        <div>
            <?php if ($page=='accueil'){ ?>
                <a class="logoContainer" href="./index.php">
                    <img class="logo" src="assets/img/logo.png" alt="logo">
                    <h1 class="title">Level Up !</h1> 
                </a>
            <?php
                }else{
            ?>
                <a class="logoContainer" href="../../index.php">
                    <img class="logo" src="../img/logo.png" alt="logo">
                    <h1 class="title">Level Up !</h1> 
                </a>
            <?php
                }
            ?>

            <!-- Affichage du header avec des liens et un menu fonctionnels en fonction de la page sur laquelle est l'utilisateur -->
            <?php if ($page=='accueil'){ ?>
            <li><a href="./index.php"> <img src="./assets/img/menu/bigChampi.png" alt="">Accueil</a></li>
            <li><a href="./index.php?page=histoire"> <img src="./assets/img/menu/feuille.png" alt="">Histoire</a></li>
            <li><a href="./index.php?page=perso"> <img src="./assets/img/menu/coquille.png" alt="">Personnages</a></li>
            <li><a href="./index.php?page=jeux"> <img src="./assets/img/menu/champiV.png" alt="">Jeux</a></li>
            <li><a href="./index.php?page=tips"> <img src="./assets/img/menu/fleur.png" alt=""> Tips</a></li>
            <li><a href="./index.php?page=film"> <img src="./assets/img/menu/champiR.png" alt="">Film</a></li>
            <li><a href="./index.php?page=forum"> <img src="./assets/img/menu/oeuf.png" alt=""> Forum</a></li>
            <li><a href="./index.php?page=news"> <img src="./assets/img/menu/etoile.png" alt=""> Nouveautés</a></li>
            <li><a href="./assets/pages/search.php"><i class="fas fa-search"class="loupe"></i>Search...</a></li>
        <?php
            }else{
        ?>
            <li><a href="../../index.php"> <img src="../img/menu/bigChampi.png" alt="">Accueil</a></li>
            <li><a href="../../index.php?page=histoire"> <img src="../img/menu/feuille.png" alt="">Histoire</a></li>
            <li><a href="../../index.php?page=perso"> <img src="../img/menu/coquille.png" alt="">Personnages</a></li>
            <li><a href="../../index.php?page=jeux"> <img src="../img/menu/champiV.png" alt="">Jeux</a></li>
            <li><a href="../../index.php?page=tips"> <img src="../img/menu/fleur.png" alt=""> Tips</a></li>
            <li><a href="../../index.php?page=film"> <img src="../img/menu/champiR.png" alt="">Film</a></li>
            <li><a href="../../index.php?page=forum"> <img src="../img/menu/oeuf.png" alt=""> Forum</a></li>
            <li><a href="../../index.php?page=news"> <img src="../img/menu/etoile.png" alt=""> Nouveautés</a></li>
            <li><a href="./search.php"><i class="fas fa-search" class="loupe"></i>Search...</a></li>
        <?php
            }
        ?>
        </div>
        <div>
        <!-- Gestion d'affichage si l'utilisateur est connecté ou non -->

        <?php 
            
            if(!isset($_SESSION['user'])){
        ?>

            <?php if ($page=='accueil'){ ?>
                <div class="headerRegisterLogin">
                    <a class="log" href="./assets/pages/login.php">Login</a>
                    <a class="reg" href="./assets/pages/register.php">Register</a>
                </div>
            <?php
                }else{
            ?>
                <div class="headerRegisterLogin">
                    <a class="log" href="./login.php">Login</a>
                    <a class="reg" href="./register.php">Register</a>
                </div>
            <?php
                }
            ?>


        
            <?php 
                }else{
                $user = $_SESSION['user'];
            ?>

            <?php if ($page=='accueil'){ ?>
                <div class="headerRegisterLogin connected">
                    <a class="account" href="<?php echo './index.php?id='. $data['id']; ?>">
                        <img src="<?php echo './assets/img/perso/'. $data['perso']; ?>" alt="pp">
                        <?php echo $data['pseudo']; ?>
                    </a>    
                    <a class="logout" href="./assets/php/logout.php">
                        
                        <p><i class="fas fa-2x fa-sign-out-alt"></i></p>
                    </a>
                </div>
            <?php
                }else{
            ?>
                <div class="headerRegisterLogin connected">
                    <a class="account" href="<?php echo '../../index.php?id='. $data['id']; ?>">
                        <img src="<?php echo '../img/perso/'.  $data['perso']; ?>" alt="pp">
                        <?php echo $data['pseudo']; ?>
                    </a>    
                    <a class="logout" href="../php/logout.php">
                        
                        <p><i class="fas fa-2x fa-sign-out-alt"></i></p>
                    </a>
                </div>
            <?php
                }
            ?>
            
        

            <?php 
                }
            ?>
        </div>

        
    </ul>

    
  </div>
</nav>
</div>

</header>