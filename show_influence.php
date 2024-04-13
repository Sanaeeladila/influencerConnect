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
    <h1>Voici la liste des influenceurs sans partenariats</h1>
<?php
    $getid = $_SESSION['unique_id'];
    $req2 = "SELECT * FROM users WHERE type = 'influenceur' AND fname NOT IN (SELECT influenceur FROM partenariat WHERE marque = (SELECT fname FROM users WHERE unique_id = {$getid}))";
    $getInf = mysqli_query($conn, $req2);
    if(mysqli_num_rows($getInf) > 0){
        while($frow = mysqli_fetch_assoc($getInf)){
            ?>
            <!-- creer chaque div pour afficher chaque partenariat -->
            <div class="row">
                <!-- creer le titre du division -->
                <header><p><b><?= $frow['fname'] . " " . $frow['lname'] ; ?></b></p></header>
                <br>
                <!-- afficher les donnees -->
                <img src="php/images/<?php echo $frow['img']; ?>" alt="">
                <p><span><b>Age : </b><?= $frow['age_chiffre'] ; ?></span></p>
                <p><span><b>Email : </b><?= $frow['email'] ; ?></span></p>
                <p><span><b>Site web : </b><?= $frow['website'] ; ?></span></p>
                <p><span><b>Compte Instagram : </b><?= $frow['ig_acc'] ; ?></span></p>
                <p><span><b>Compte Facebook : </b><?= $frow['fb_acc'] ; ?></span></p>
                <p><span><b>Compte Tiktok : </b><?= $frow['tiktok_acc'] ; ?></span></p>
            </div>
            <?php
        }
    }else{
        echo "Aucun influenceur trouvé!!";
    }
?>
</body>
</html>