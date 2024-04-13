<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "dbconfig.php";
        $outgoing_id = $_SESSION['unique_id'];//On recupère l'id de l'utilisateur
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);//On récupère l'id du destinataire
        $message = mysqli_real_escape_string($conn, $_POST['message']);//On récupère le message
        if(!empty($message)){//Si le champ n'est pas vide on l'insère dans la table messages
            $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
                                        VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')") or die();
        }
    }else{
        header("location: ../connexion.php");
    }


    
?>