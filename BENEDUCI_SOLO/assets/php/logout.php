<?php
    session_start(); // démarage d'une session php
    session_destroy(); // on détruit toutes les données associées à la session actuelle
    header('Location: ../../index.php'); // Redirection vers la page d'accueil
    die(); // interruption de l'exécution du script immédiatement après l'appel du header() pour empêcher toute autre exécution du script après la redirection.
?>