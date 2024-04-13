<?php
session_start();
include_once 'php\dbconfig.php';
if(!$_SESSION['password']){//Si l'admin n'est pas connecté on le redirige vers la page de connexion
    header('Location: admin.php');
}
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Afficher les demandes</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
</head> 
<body>

  <!-- creer un formulaire qui affiche les demandes du suppression -->
  <div class="wrapper">
    <!-- cette section représente la section du formulaire -->
    <section class="form login">
      <!-- creer le titre du formulaire -->
      <header>Voici la liste de tous les demandes</header>
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <?php
            $req = "SELECT * FROM demande_suppr";
            $getdemande = mysqli_query($conn, $req);
            if(mysqli_num_rows($getdemande) > 0){
                while($drow = mysqli_fetch_assoc($getdemande)){
                    $sql = "SELECT * FROM users WHERE unique_id = {$drow['outgoing_id']}";
                    $getuser = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($getuser) > 0){
                        $row = mysqli_fetch_assoc($getuser);
                        ?>

                        <div class="demandes-list">
                        <p><span><b><?= $row['fname'] . " " . $row['lname'] . " "  ; ?></b>  <?= $row['type'] ; ?><p></p></span> </p>
                        <p><?= $drow['contenu'] ; ?></p>
                        <p><a href="php\supprimer.php?unique_id=<?= $row['unique_id']; ?>">Supprimer</a> </p>
                        </div>
                        <?php
                    }else{
                        echo "L'utilisateur est supprimé!";
                    }
                }
            }else{
                echo "Aucune demande de suppression pour le moment!";
            }
        ?>
        </form>
        </section>
    </div>
    
</body>
</html>