<?php
require_once('./connectDb.php');  // On inclut la connexion à la base de données

$bdd=connectDb(); // récuperation de tout les messages du forum
$p = $bdd->prepare('SELECT * FROM forum');
$p->execute();
foreach ($p as $row){
    // affichage des resultat de la requette
    echo "<div class='forumUnit'><p class='forumU'>" . $row['pseudo'] . "</p><p class='forumM'>" . $row['content'] . "</p></div>";
}