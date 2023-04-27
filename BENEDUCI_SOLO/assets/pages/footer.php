<!-- Affichage du footer avec des liens fonctionnel en fonction de la page sur laquelle est l'utilisateur -->
<footer>
    <?php if ($page=='accueil'){ ?>
        <a href="./index.php" class="nomsite">Level UP!</a>
    <?php
        }else{
    ?>
    <a href="../../index.php" class="nomsite">Level UP!</a>
    <?php
        }
    ?>
    <p>© Copyright Marie BENEDUCI</p>
</footer>