<?php
   function connectDb(){ // fonction de connection a une base de données MySQL
    // Prise en compte des parametres:
    $host = 'localhost'; // Nom d'hôte de la base de données
    $user = 'root'; // Nom d'utilisateur
    $pwd = ''; // Mot de passe
    $db = 'beneduci'; // Nom de la base de données
try {
    // Si la connexion réussit, un objet PDO est retourné. 
     $bdd = new PDO('mysql:host='.$host.';dbname='.$db.
                    ';charset=utf8', $user, $pwd,
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
     return $bdd;
    } catch (Exception $e) {
     exit('Erreur : '.$e->getMessage()); // Si la connexion échoue, une exception est levée et le programme s'arrête en affichant un message d'erreur.
}
}
?>