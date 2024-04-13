<?php
session_start();
include_once 'php\dbconfig.php';
if(!$_SESSION['password']){//Si l'admin est déja connecté on le redirige vers son profile
    header('Location: admin.php');
}
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InfluencerConnect</title>
    <link rel="stylesheet" href="css/show_collab.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
</head> 
<body>
  <!-- creer le titre du formulaire -->
  <h1>Les marques inscrites sur le site web</h1>
  <?php //On récupère tous les marques à partir de la base de données
    $sql2 = "SELECT * FROM users WHERE type = 'marque'";
    $getBrand = mysqli_query($conn, $sql2);
    while($row2 = mysqli_fetch_assoc($getBrand)){
     ?>
     <!-- creer chaque div pour afficher chaque influenceur -->
     <div class="row">
        <!-- creer le titre du division -->
        <header><div class="field input"><label class="label1"><?= $row2['fname'] . " " . $row2['lname'] . " "  ; ?></label></div></header>
        <br>
        <!-- afficher l'image -->   
        <img src="php/images/<?= $row2['img']; ?>" alt="">
      </div>
      <?php
    }
  ?>
  </div>
</body>
</html>
