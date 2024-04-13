<?php
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "dbconfig.php";
        $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
        if(isset($logout_id)){
            $status = "Hors ligne";//on met à jour le status d l'utilisateur pour qu'il soit hors ligne après la déconnexion
            $sql = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id={$_GET['logout_id']}");
            if($sql){//On détruit la session
                session_unset();
                session_destroy();
                header("location: ../connexion.php");
            }
        }else{
            header("location: ../users_page.php");
        }
    }else{  //Si l'utilisateur n'est pas connecté on le redirige vers la page de connexion
        header("location: ../connexion.php");
    }
?>