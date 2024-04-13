
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
  <!-- creer un formulaire d'iscription des influenceur' -->
  <!-- creer une div qui enveloppe le contenu du formulaire -->
  <div class="wrapper">
    <!-- cette section représente la section du formulaire de contact-->
    <section class="form signup">
      <!-- creer le titre du formulaire -->
      <header>Inscription Influenceur</header>
      <!--definir le mode de transmission des donnees du formulaire -->
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <!-- creer une div consacrer au msg d'erreur -->
        <div class="error-text"></div>
        <!-- creer des div qui contiennent dix champs de saisie des donnees -->
        <div class="name-details">
          <div class="field input">
            <label>Prenom</label>
            <input type="text" name="fname" placeholder="Entrez votre prenom" required>
          </div>
          <div class="field input">
            <label>Nom</label>
            <input type="text" name="lname" placeholder="Entrez votre nom" required>
          </div>
        </div>
        <div class="field input">
          <label>Email</label>
          <input type="text" name="email" placeholder="Entrez votre email" required>
        </div>
        <div class="field input">
          <label>Mot de passe</label>
          <input type="password" name="password" placeholder="Entrez un nouveau mot de passe" required>
          <i class="fas fa-eye" style="color: #000000;" ></i>
        </div>
        <div class="field input">
          <label>Age</label>
          <input type="text" name="age" placeholder="Entrez votre âge" required>
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
          <label>Votre Image</label>
          <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
        </div>
        <!-- creer une boutton pour envoyer le formulaire d'inscription -->
        <div class="field button">
          <input type="submit" name="submit" value="S'inscrir">
        </div>
       
      </form>
      <!-- creer un lien pour rediriger l'influenceur vers la page de connexion -->
      <div class="link">Déja inscrits? <a href="connexion.php">Connectez vous maintenant</a></div>
    </section>
  </div>
  <!-- ajouter le script js -->
  <script src="js/show_nd_hide_mdp.js"></script>
  <script src="js/inscription_influence.js"></script>

</body>
</html>