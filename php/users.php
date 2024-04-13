<?php
    session_start();
    include_once "dbconfig.php";
    $outgoing_id = $_SESSION['unique_id'];
    
    //On récupère tous les utilisateurs inscrits sur le site de tel sorte que la marque ne peut voir que les influenceurs et vice versa
    $sql = "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} AND NOT type = (SELECT type FROM users WHERE unique_id = {$outgoing_id}) ORDER BY user_id DESC";
    $query = mysqli_query($conn, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "Aucun utilisateur disponible";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "transfertdonnees.php";
    }
    echo $output;
?>