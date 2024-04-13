<?php 
  session_start();
  include_once "php/dbconfig.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: connexion.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users_page</title>
    <link rel="stylesheet" href="css/users_page.css">
    <script src="https://kit.fontawesome.com/1e94604817.js" crossorigin="anonymous"></script>
</head>
<body>
    <!-- creer le header -->
    <header>
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
    <!-- creer une section d'utilisateur -->
    <section class="user_sec">
      <!-- creer le titre de la page -->
       <main>
          <h2 class="title_user">Bienvenue dans l'espace d'utilisateur</h2>
        </main>
        <!-- creer une affiche pour presenter l'utilisateur -->
          <div  class="wrapper ">
            <section class="form contact_us">
              <?php 
               $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
                if(mysqli_num_rows($sql) > 0){
                $row = mysqli_fetch_assoc($sql);
                }
                ?>
                <!-- creer le titre de cette affiche -->
                <h1 class="user_h1">Mon Profile</h1>
                <!-- afficher les donnees de cet utilisateur-->
                <div class="field input">
                  <img src="php/images/<?php echo $row['img']; ?>" alt="">
                </div>
                <div class="field input">
                  <p class="users_p" ><b>Nom :</b> <?php echo $row['fname']. " " . $row['lname'] ?></p>
                </div>
                <div class="field input">
                  <?php
                   if($row['type'] == "influenceur"){
                  ?>
                  <p class="users_p" ><b>Age :</b> <?php echo $row['age_chiffre']; ?></p>
                  <?php 
                   }else{
                  ?>
                  <p class="users_p" ><b>Chiffre d'affaire :</b> <?php echo $row['age_chiffre']; ?></p>
                  <?php
                    }
                  ?>
                </div>
                <div class="field input">
                  <p class="users_p" ><b>Email :</b> <?php echo $row['email']; ?></p>
                </div>
                <div class="field input">
                  <p class="users_p" ><b>Site web :</b> <?php echo $row['website']; ?></p>
                </div>
                <div class="field input">
                  <p class="users_p" ><b>Compte Instagram :</b> <?php echo $row['ig_acc']; ?></p>
                </div>
                <div class="field input">
                  <p class="users_p" ><b>Compte Facebook :</b> <?php echo $row['fb_acc']; ?></p>
                </div>
                <div class="field input">
                  <p class="users_p" ><b>Compte Tiktok :</b> <?php echo $row['tiktok_acc']; ?></p>
                </div>
                <!-- ajouter une boutton pour aller au tableau de bord -->
                <div class="field input">
                  <a href="#nav_admin"><p class="users_p" ><button class="btnx"><b>Tableau de bord</b></button></p></a>
                </div>
              </section>    
            </div>
          </div>
          <hr>
         <!-- creer une autre section de tableau de bord -->
         <section id="nav_admin">
              <!-- creer une listes contenant les elements du tableau de bord -->
              <ul class="nav_admin-nav">
                <li class="nav_admin-item">
                  <a href="users.php" class="nav_admin-link">
                    <span class="link-text">Chat</span>
                  </a></li>
                <li class="nav_admin-item">
                  <?php if($row['type'] == "influenceur"){ ?>
                  <a href="show_partenariat_marques.php" class="nav_admin-link">Afficher mes partenariats</a>
                  <?php 
                  }else{
                  ?>
                 <a href="show_partenariat_influence.php" class="nav_admin-link">Afficher mes partenariats</a>
                 <?php   
                 }
                 ?>
                </li>
                <li class="nav_admin-item">
                  <?php if($row['type'] == "influenceur"){ ?>
                  <a href="show_marques.php" class="nav_admin-link">Afficher les autres marques</a>
                  <?php 
                  }else{
                  ?>
                 <a href="show_influence.php" class="nav_admin-link">Afficher les autres influenceurs</a>
                 <?php   
                 }
                 ?>
                </li>
                <li class="nav_admin-item">
                  <?php if($row['type'] == "influenceur"){ ?>
                  <a href="modifier_influence.php" class="nav_admin-link">Modifier mes informations</a>
                  <?php 
                  }else{
                  ?>
                 <a href="modifier_marque.php" class="nav_admin-link">Modifier mes informations</a>
                 <?php   
                 }
                 ?>
                </li>
                <li class="nav_admin-item">
                  <a href="php/deconnexion.php?logout_id=<?php echo $row['unique_id']; ?>"  class="nav_admin-link">
                    <span class="link-text">Se déconnecter</span>
                  </a></li>
                <li class="nav_admin-item">
                  <a href="demande_suppr2.php" class="nav_admin-link">
                    <span class="link-text">Supprimer mon compte</span>
                  </a></li>
              </ul>
            </nav>
          </div>
        </div>
      </section>
    
    <!-- ajouter une boutton pour aller en haut de la page -->
    <a href="#" class="btni">
      <i class="fa-solid fa-arrow-up" style="color: #050505;" class="iconei"></i>
    </a>
   <!-- the footer -->
   <?php include 'footer.php'; ?> 
  </body>
</html>