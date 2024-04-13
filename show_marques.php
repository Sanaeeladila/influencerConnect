<?php
session_start();
include_once 'php\dbconfig.php';
if(!isset($_SESSION['unique_id'])){
    header("location: connexion.php");
  }
?>
<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher tous les partenariats</title>
    <link rel="stylesheet" href="css/show_collab.css">
</head>
<body>
    <!-- creer le titre de la page -->
    <h1>Voici la liste des marques sans partenariats</h1>
<?php
    $getid = $_SESSION['unique_id'];
    $req2 = "SELECT * FROM users WHERE type = 'marque' AND fname NOT IN (SELECT marque FROM partenariat WHERE influenceur = (SELECT fname FROM users WHERE unique_id = {$getid}))";
    $getmarque2 = mysqli_query($conn, $req2);
    if(mysqli_num_rows($getmarque2) > 0){
        while($mrow = mysqli_fetch_assoc($getmarque2)){
            ?>
            <!-- creer chaque div pour afficher chaque partenariat -->
            <div class="row">
                <!-- creer le titre du division -->
                <header><p><b><?= $mrow['fname'] . " " . $mrow['lname'] ; ?></b></p></header>
                <br>
                <!-- afficher les donnees -->
                <img src="php/images/<?php echo $mrow['img']; ?>" alt="">
                <p><b>Chiffre d'affaire : </b><?= $mrow['age_chiffre'] ; ?></p>
                <p><b>Email : </b><?= $mrow['email'] ; ?></p>
                <p><b>Site web : </b><?= $mrow['website'] ; ?></p>
                <p><b>Compte Instagram : </b><?= $mrow['ig_acc'] ; ?></p>
                <p><b>Compte Facebook : </b><?= $mrow['fb_acc'] ; ?></p>
                <p><b>Compte Tiktok : </b><?= $mrow['tiktok_acc'] ; ?></p>
            </div>
            <?php
        }
    }else{
        echo "Aucune marque restante pour le moment!";
    }
?>
</body>
</html>