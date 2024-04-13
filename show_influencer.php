<?php
session_start();
include_once 'php\dbconfig.php';
if(!$_SESSION['password']){
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
  <h1>Les influenceurs inscrits sur le site web</h1>
  <?php
    $sql1 = "SELECT * FROM users WHERE type = 'influenceur'";
    $getInfluencer = mysqli_query($conn, $sql1);
    if(mysqli_num_rows($getInfluencer) > 0){

      while($row1 = mysqli_fetch_assoc($getInfluencer)){
        ?>
        <!-- creer chaque div pour afficher chaque influenceur -->
        <div class="row">
          <!-- creer le titre du division -->
            <header><div class="field input"><label class="label1"><?= $row1['fname'] . " " . $row1['lname'] . "        "  ; ?></label></div></header>
            <br>
            <!-- afficher l'image -->
            <img src="php/images/<?= $row1['img']; ?>" alt="">
        </div>
        <?php
      }
    }else{
      echo "Aucun influenceur trouvé!!";
  }
  ?>        
</body>
</html>