<?php 
  session_start();//Si l'utilisateur est déja connecté on le redirige vers son profile
  if(isset($_SESSION['unique_id'])){
    header("location: users_page.php");
  }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InfluencerConnect</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
</head> 
<body>
  <!-- creer un formulaire d'iscription des marques -->
  <div class="wrapper">
    <!-- cette section représente la section du formulaire -->
    <section class="form signup">
      <!-- creer le titre du formulaire -->
      <header>Inscription Marque</header>
      <!--definir le mode de transmission des donnees du formulaire -->
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <!-- creer une div consacrer au msg d'erreur-->
        <div class="error-text"></div>
        <!-- creer des div qui contiennent neuf champs de saisie des donnees -->
        <div class="field input">
          <label>Nom de la marque</label>
          <input type="text" name="fname" placeholder="Nom de la marque" required>
        </div>
        <div class="field input">
          <label>Email</label>
          <input type="text" name="email" placeholder="Entrez votre email" required>
        </div>
        <div class="field input">
          <label>Password</label>
          <input type="password" name="password" placeholder="Entrez un nouveau mot de passe" required>
          <i class="fas fa-eye" style="color: #000000;"></i>
        </div>
        <div class="field input">
          <label>Chiffre d'affaire</label>
          <input type="text" name="chiffre" placeholder="Entrez votre chiffre d'affaire" required>
        </div>
        <div class="field input">
          <label>Site web</label>
          <input type="text" name="website" placeholder="Entrez le lien de votre site web" >
        </div>
        <div class="field input">
          <label>Profile Instagram</label>
          <input type="text" name="ig" placeholder="Entrez le lien de votre compte Instagram" >
        </div>
        <div class="field input">
          <label>Profile Facebook</label>
          <input type="text" name="fb" placeholder="Entrez le lien de votre compte Facebook" >
        </div>
        <div class="field input">
          <label>Profile Tiktok</label>
          <input type="text" name="tiktok" placeholder="Entrez le lien de votre compte Tiktok" >
        </div>
        <div class="field image">
          <label>Votre logo</label>
          <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
        </div>
        <div class="field button">
          <input type="submit" name="submit" value="S'inscrir">
        </div>
      </form>
      <!-- creer un lien pour rediriger vers la page de connexion -->
      <div class="link">Déja inscrits? <a href="connexion.php">Connectez vous maintenant</a></div>
    </section>
  </div>
  <!-- ajouter le script js -->
  <script src="js/show_nd_hide_mdp.js"></script>
  <script src="js/inscription_marque.js"></script>

</body>
</html>