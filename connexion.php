<?php 
  session_start();
   if(isset($_SESSION['unique_id'])){//Si l'utilisateur est déja connecté on le redirige vers son profile
    header("location: users_page.php");
  }  
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="css/connexion.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
</head> 
<body>
  <!-- creer le  header -->
  <header class="header_connexion">
    <a href="index.php"><h1 class="logo">InfluencerConnect</h1></a>
    <input type="checkbox" id="nav-toggle" class="nav-toggle">
    <nav>
      <ul>
        <li><a aria-current="page" href="index.php" >Accueil</a></li>
        <li><a href="index.php #contact">Contact</a></li>
        <li><a href="index.php #a_propos" >A propos</a></li>
      </ul>
    </nav>
    <label for="nav-toggle" class="nav-toggle-label">
      <span></span>
    </label>
  </header>
  <!-- creer un formulaire de connexion de cote utilisateur -->
  <!-- creer une div qui enveloppe le contenu du formulaire de connexion -->
  <div class="wrapper">
    <!-- cette section représente la section du formulaire -->
    <section class="form login">
      <!-- creer le titre du formulaire -->
      <header >Connexion</header>
      <!-- creer un form ou les donnees du formulaire seront envoyees à l'URL "#" via la methode POST,et que le formulaire n'a pas d'auto-complétion activee-->
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <!-- creer une div consacrer au msg d'erreur-->
        <div class="error-text"></div>
        <!-- creer des div qui contiennent deux champs de saisie des donnees -->
        <div class="field input">
          <label>Email</label>
          <input type="text" name="email" placeholder="Entrez votre email" required>
        </div>
        <div class="field input">
          <label>Mot de passe</label>
          <input type="password" name="password" placeholder="Entrez votre mot de passe" required>
          <i class="fas fa-eye" style="color: #000000;"></i>
        </div>
        <!-- creer une boutton pour envoyer le formulaire -->
        <div class="field button">
          <input type="submit" name="submit" value="Se connecter">
        </div>
      </form>
      <!-- creer un lien pour rediriger vers la page de creation de compte -->
      <div class="link">Vous n'avez pas de compte? <a href="type.php">créer un compte</a></div>
    </section>
  </div>

  <!-- ajouter le script js -->
  <script src="js/show_nd_hide_mdp.js"></script>
  <script src="js/connexion.js"></script>

</body>
</html>