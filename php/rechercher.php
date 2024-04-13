<?php
    session_start();
    include_once "dbconfig.php";

    $outgoing_id = $_SESSION['unique_id'];//On récupère l'id de l'utilisateur
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);//On récupère le terme à rechercher

    //On définie la requête Pour chercher de tel sorte que la marque ne peut chercher que parmis les influenceurs et vice versa
    $sql = "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} AND (fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%') AND NOT type = (SELECT type FROM users WHERE unique_id = {$outgoing_id}) ";
    $output = "";//On initialise le résultat par la chaine vide
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) > 0){//On vérifie si le terme est trouvé
        include_once "transfertdonnees.php";
    }else{
        $output .= 'Aucun utilisateur trouvé correspondant à votre recherche';
    }
    echo $output;
?>