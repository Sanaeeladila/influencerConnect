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
    <script src="https://kit.fontawesome.com/1e94604817.js"></script>
</head>
<body>
    <!-- creer le titre de la page -->
    <h1>Voici la liste de tous les partenariats</h1>
    <?php
        $getid = $_SESSION['unique_id'];
        $req = "SELECT * FROM partenariat WHERE influenceur = (SELECT fname FROM users WHERE unique_id = {$getid})";
        $getfname = mysqli_query($conn, $req);
        if(mysqli_num_rows($getfname) > 0){
            while($drow = mysqli_fetch_assoc($getfname)){
                $sql = "SELECT * FROM users WHERE fname = '{$drow['marque']}'";
                $getmarque = mysqli_query($conn, $sql);
                if(mysqli_num_rows($getmarque) > 0){
                    $row = mysqli_fetch_assoc($getmarque);
                    ?>
                    <!-- creer chaque div pour afficher chaque partenariat -->
                    <div class="row">
                        <!-- creer le titre du division -->
                        <header>Collab </header>
                        <br>
                        <!-- afficher les donnees -->
                        <img src="php/images/<?php echo $row['img']; ?>" alt="">
                        <p><span><b><?= $row['fname'] . " " . $row['lname'] ; ?></b></span></p>
                        <p><b>Les termes d'accord : </b><?= $drow['terme'] ; ?></p>
                        <p><b>Montant : </b><?= $drow['montant'] ; ?></p>
                        <p><b>Durée : </b><?= $drow['duree'] ; ?></p>
                        <p><b>Date initiale : </b><?= $drow['datei'] ; ?></p>
                        <p><b>Date finale : </b><?= $drow['datef'] ; ?></p>
                    </div>
                    <?php
                }else{
                   /* echo "La marque n'est pas trouvé!"; */

                }
            }
        }else{
           /*  echo "Aucune partenariat pour le moment!"; */
        }
    ?>
</body>
</html>