<?php 
   
   // si la session existe pas soit si l'on est pas connecté on redirige
    if(isset($_SESSION['user'])){
        // On récupere les données de l'utilisateur
        $bdd = connectDb();
        $req = $bdd->prepare('SELECT * FROM posts WHERE id = ?');
        $req->execute(array($_GET['modifier']));
        $data = $req->fetch();

        $req212 = $bdd->prepare('SELECT * FROM users WHERE email = ?');
        $req212->execute(array($_SESSION['user']));
        $data212 = $req212->fetch();

        if($data212['id'] != $data['id_user']){ // gestion d'erreur, si l'utilisateur n'est pas celui qui a créé le post alors il n'a pas acces à la page
          echo '<script>alert("Vous n avez pas acces à cette page");
          window.location.href = "./index.php";
          </script>';
        }
    }else{
      echo '<script>alert("Vous n avez pas acces à cette page");
      window.location.href = "./index.php";
      </script>';
    }
?>

<div class="modifyPost">
  <h1 class="homecatname">Modifier mon post</h1>
          <!-- formulaire de modification de post en post -->
          <form class="formnewpost" action="./assets/php/posts.php" enctype="multipart/form-data" method="POST">   
            <div>
              <label>Catégorie :</label>
              <select name="cat">
                <?php
                  $query= $bdd -> prepare('SELECT * FROM catégories WHERE id=?');
                  $query -> execute(array($data['id_cat']));
                  $data2 = $query -> fetch();
                ?>
                <option value="<?php echo $data['id_cat']; ?>"> <?php echo $data2['nom_theme']; ?> </option>
                <?php 
                    $bdd = connectDb();
                    $query = $bdd->prepare('SELECT * FROM catégories where id != ?');
                    $query->execute(array($data['id_cat']));
                    foreach ($query as $cat_post){
                      $id_post= $cat_post['id'];
                      $denomination = $cat_post['nom_theme'];
                      echo "<option value= '$id_post' > $denomination </option>";
                    }
                ?>
            </select>
            </div> 
          <div>
              <label>Titre :</label>
              <input class="input" type="text" name="titleM"   value="<?php echo $data['title']; ?>" required>
            </div>
            <div>
              <label>Contenu :</label>
              <input class="input" type="text" name="contentM" value="<?php echo $data['content']; ?>"  required>
            </div><br>
            <div>
              <label>Image :</label>
              <img src="<?php echo $data['img']; ?>" alt="image">
                <input type="file" name="imgM" value="<?php echo $data['img']; ?>">
            </div>
            <div class="transparent">
              <input class="input" type="text" name="idP" readonly  value="<?php echo $_GET['modifier'] ?>" required>
            </div>
            <div>
            <button class="button" type="submit" value="Modifier">Modifier</button>
          </div>
          </form>
</div>