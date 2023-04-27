<div class="newPost">
  <!-- formulaire de création d'un nouveau post en post -->
  <h1 class="homecatname">Nouveau post</h1>
  <form class="formnewpost" action="./assets/php/posts.php" enctype="multipart/form-data" method="POST">  
      <div>
        <label>Catégorie :</label>
              <select name="cat">
                <?php
                  $query= $bdd -> prepare('SELECT * FROM catégories WHERE id=?');
                  $query -> execute(array($data['id_cat']));
                  $data2 = $query -> fetch();
                ?>
                <?php 
                    $bdd = connectDb();
                    $query = $bdd->prepare('SELECT * FROM catégories');
                    $query->execute();
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
        <input class="input" type="text" name="title"  placeholder="titre" required>
      </div>
      <div>
        <label>Contenu :</label>
        <textarea class="input" type="text" name="content"  placeholder="contenu" required rows="5" cols="33"> </textarea>
      </div><br>
      <div>
        <label>Image :</label>
          <input type="file" name="img">
      </div>
      <div class="transparent">
        <input class="input" type="text" name="id_user" readonly  value="<?php echo $data['id'] ?>" required>
      </div>
      <div>
      <button class="btn" type="submit" value="Ajouter">Ajouter</button>
    </div>
  </form>
</div>