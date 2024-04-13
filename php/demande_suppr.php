
<?php
    session_start();
    include_once "dbconfig.php";
    $contenu = mysqli_real_escape_string($conn,$_POST['contenu']);
    $outgoing_id = $_SESSION['unique_id'];//On récupère l'id de l'utilisateur à partir de la session
    $sql="INSERT INTO demande_suppr (outgoing_id, contenu) VALUES ({$outgoing_id}, '{$contenu}')";
    $res = mysqli_query($conn, $sql);//On insère la demande de suppression dans la table demande_suppr

    if($res){//On vérifie si la demande est inséré avec succès, si c'est le cas on envoie le message success sinon on envoie Error
        $select_sql = mysqli_query($conn, "SELECT * FROM demande_suppr WHERE contenu = '{$contenu}'");
        if(mysqli_num_rows($select_sql) > 0){
            echo "success";
        }else{
            echo "Error";
        }
    }else{
        echo "Error";
    }

?>