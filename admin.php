<?php
session_start();
if(isset($_POST['login']) ){
    if(!empty($_POST['login']) AND !empty($_POST['password'])){
        $default_login = 'admin';
        $default_password = 'admin';
        $login = htmlspecialchars($_POST['login']);
        $password = htmlspecialchars($_POST['password']);
        if($login == 'admin' AND $password == 'admin'){
            $_SESSION['password'] = $password;
            header('Location: show_members.php');
        }else{
            echo "Login ou mot de passe incorrect";
        }
    }else{
        echo "Veuillez remplir tous les champs";}
    
}
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InfluencerConnect</title>
    <link rel="stylesheet" href="css/connexion.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
</head> 
<body>
  <!-- creer un header -->
  <header class="header_connexion">
    <!-- creer un titre qui va jouer le role du logo du site web -->
    <a href="index.php"><h1 class="logo">InfluencerConnect</h1></a>
    <!-- creer la bare de navigation -->
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
  <!-- creer un formulaire de connexion de cote admin -->
  <div class="wrapper">
    <section class="form login">
      <header>Connexion_Admin</header>
      <form action="" method="POST" >
      <div class="error-text"></div>
        <!-- creer une div ou l'admin doit tapper son login -->
        <div class="field input">
          <label>Login</label>
          <input type="text" name="login" placeholder="Entrez votre login" autocomplete="off">
        </div>
        <!-- creer une autre div ou l'admin doit tapper son mot de passe -->
        <div class="field input">
          <label>Mot de passe</label>
          <input type="password" name="password" placeholder="Entrez votre mot de passe" required>
          <i class="fas fa-eye" style="color: #000000;"></i> <!-- ajouter une icone -->
        </div>
        <!-- creer le boutton "se connecter" -->
        <div class="field button">
          <input type="submit" name="submit" value="Se connecter">
        </div>
      </form>
    </section>
  </div>
  <!-- ajouter le script js -->
  <script src="js/show_nd_hide_mdp.js"></script>
</body>
</html>