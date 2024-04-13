
<?php 
  session_start();
?>

<?php include_once "myheader.php"; ?>
<body>
  <!-- creer un formulaire de modification du profil des marques -->
  <div class="wrapper">
    <!-- cette section représente la section du formulaire -->
    <section class="form signup">
      <!-- creer le titre du formulaire -->
      <header>Modifier votre Profile</header>
      <!--definir le mode de transmission des donnees du formulaire -->
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <!-- creer une div consacrer au msg d'erreur-->
        <div class="error-text"></div>
        <!-- creer des div qui contiennent neuf champs de saisie des donnees -->
        <div class="field input">
           <label>Nom de la marque</label>
           <input type="text" name="fname" placeholder="Nouveau Nom de la marque" required>
        </div>
        
        <div class="field input">
          <label>Email</label>
          <input type="text" name="email" placeholder="Entrer le nouveau email" required>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Nouveau mot de passe" required>
          <i class="fas fa-eye"></i>
        </div>
        <div class="field input">
          <label>Chiffre d'affaire</label>
          <input type="text" name="age_chiffre" placeholder="Nouveau chiffre d'affaire" required>
        </div>
        
        <div class="field input">
          <label>Site web</label>
          <input type="text" name="website" placeholder="Nouveau lien de votre site web" >
        </div>
        <div class="field input">
          <label>Profile Instagram</label>
          <input type="text" name="ig" placeholder="Nouveau lien de votre compte Instagram" >
        </div>
        <div class="field input">
          <label>Profile Facebook</label>
          <input type="text" name="fb" placeholder="Nouveau lien de votre compte Facebook" >
        </div>
        <div class="field input">
          <label>Profile Tiktok</label>
          <input type="text" name="tiktok" placeholder="Nouveau lien de votre compte Tiktok" >
        </div>
        <div class="field image">
          <label>Votre Nouvelle Image</label>
          <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
        </div>
        <!-- creer une boutton pour envoyer le formulaire de modification du profil -->
        <div class="field button">
          <input type="submit" name="submit" value="Modifier">
        </div>
       
      </form>
    </section>
  </div>
  
  <!-- ajouter le script js -->
  <script src="js/show_nd_hide_mdp.js"></script>
  <script src="js/modifier.js"></script>

</body>
</html>