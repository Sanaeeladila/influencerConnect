<?php
session_start();
include_once 'dbconfig.php';
if(isset($_GET['unique_id']) AND !empty($_GET['unique_id'])){//On vérifie la récuperation de l'id de l'utilisateur par la méthode GET
    $getid = ($_GET['unique_id']);//On stocke l'id
    $req = "SELECT * FROM demande_suppr WHERE outgoing_id = {$getid}";
    $getdemande = mysqli_query($conn, $req);//On récupère la demande de l'utilisateur 
    
    if(mysqli_num_rows($getdemande) > 0){//Si la demande est trouvée on la supprime de la table
        $delete = "DELETE FROM demande_suppr WHERE outgoing_id = {$getid}";
        $query2 = mysqli_query($conn, $delete);
    }else{
        echo "Aucune demande trouvé";
    }
    $getuser ="SELECT * FROM users WHERE unique_id = {$getid}";
    $query1 = mysqli_query($conn, $getuser);//On récupère l'utilisateur
    if(mysqli_num_rows($query1) > 0){//Si l'utilisateur est trouvé on le supprime de la table
        $suppr = "DELETE FROM users WHERE unique_id = {$getid}";
        $query3 = mysqli_query($conn, $suppr);
    }else{
        echo "Aucun utilisateur trouvé";
    }

}else{
    echo "L'identifiant n'a pas été récupéré";
}
header('Location: ../show_demandes.php');