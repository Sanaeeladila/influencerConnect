<?php
session_start();
include_once 'php\dbconfig.php';
if(!$_SESSION['password']){
    header('Location: admin.php');
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
    <h1>Voici la liste de tous les partenariats</h1>
      <?php
        $sql = "SELECT * FROM partenariat";
        $getUser = mysqli_query($conn, $sql);
        if(mysqli_num_rows($getUser) > 0){
            while($row = mysqli_fetch_assoc($getUser)){
                $req1 = "SELECT img FROM users WHERE fname = '{$row['influenceur']}'";
                $getImgM = mysqli_query($conn, $req1);
                $row1 = mysqli_fetch_assoc($getImgM);

                $req2 = "SELECT img FROM users WHERE fname = '{$row['marque']}'";
                $getImgInf = mysqli_query($conn, $req2);
                $row2 = mysqli_fetch_assoc($getImgInf);
               
                ?>
                <!-- creer chaque div pour afficher chaque partenariat -->
                <div class="row">
                    <!-- creer le titre du division -->
                    <header>Collab</header>
                    <br>
                    <!-- afficher les donnees -->
                    <p><b>La marque: </b><?= $row['marque'] ; ?></p>
                    <img src="php/images/<?php echo $row2['img'] ; ?>" alt="">
                    <p><b>L'influenceur: </b><?= $row['influenceur'] ; ?></p>
                    <img  src="php/images/<?php echo $row1['img'] ; ?>" alt="">
                    <p><b>Les termes de collab: </b><?= $row['terme'] ; ?></p>
                    <p><b>Le montant: </b><?= $row['montant'] ; ?></p>
                    <p><b>La durée: </b><?= $row['duree'] ; ?></p>
                    <p><b>La date i: </b><?= $row['datei'] ; ?></p>
                    <p><b>La date f: </b><?= $row['datef'] ; ?></p>
                          
                </div>
                <?php
            }
        }else{
            echo "Aucune Partenariat trouvé!";
        }
    ?>
</body>
</html>