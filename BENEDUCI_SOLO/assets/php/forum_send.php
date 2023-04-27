<?php

if (isset($_POST['inputText'])) {
  $inputText = $_POST['inputText'];

  // Connexion à la base de données
  require_once './connectDb.php';  // On inclut la connexion à la base de données
  $bdd = connectDb();

  session_start();
  // Requête d'insertion des données
    if(isset($_SESSION['user'])){
        // On récupere les données de l'utilisateur
        $bdd = connectDb();
        $req = $bdd->prepare('SELECT * FROM users WHERE email = ?');
        $req->execute(array($_SESSION['user']));
        $data = $req->fetch();
        $user = $data['pseudo'];

    }else{
        $user = 'Anonymous'; // Si l'utilisateur n'est pas connecté
    }

  // envoie du message de l'utilisateur dans la bdd
  $insert = $bdd->prepare('INSERT INTO forum(pseudo, content) VALUES(:user, :content)');
  $insert->execute(array(
      'user' =>  $user,
      'content' => $inputText
  ));

}
