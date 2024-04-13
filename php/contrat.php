<?php
    session_start();//On démarre la session
    include_once "dbconfig.php";//On inclue le fichier contenant la connexion à la base de données
    //On recupère les données de l'utilisateurs 
    $marque = mysqli_real_escape_string($conn, $_POST['marque']);//pour échapper les caractères spéciaux dans la chaîne de caractères avant de l'insérer dans la base de données
    $influenceur = mysqli_real_escape_string($conn, $_POST['influenceur']);
    $terme = mysqli_real_escape_string($conn, $_POST['terme']);
    $montant = mysqli_real_escape_string($conn, $_POST['montant']);
    $duree = mysqli_real_escape_string($conn, $_POST['duree']);
    $datei = mysqli_real_escape_string($conn, $_POST['datei']);
    $datef = mysqli_real_escape_string($conn, $_POST['datef']);

    if(!empty($marque) && !empty($influenceur) && !empty($terme) && !empty($montant)){//On vérifie si les champs ne sont pas vides 
        $req = mysqli_query($conn,"SELECT * FROM users WHERE fname IN ('{$marque}', '{$influenceur}')");
        if(mysqli_num_rows($req) > 0){//on vérifie si le nom de la marque et de l'influenceur existent dans la base de données, si c'est le cas on insère les details du partenariat dans la table partenariat
            $insert_query = mysqli_query($conn, "INSERT INTO partenariat (marque, influenceur, terme, montant, duree, datei, datef)
            VALUES ('{$marque}','{$influenceur}', '{$terme}', '{$montant}', '{$duree}', '{$datei}', '{$datef}')");
            if($insert_query){//Si les données sont bien inséré on envoie le message success
                $select_sql2 = mysqli_query($conn, "SELECT * FROM partenariat WHERE marque = '{$marque}' AND influenceur = '{$influenceur}'");
                    if(mysqli_num_rows($select_sql2) > 0){
                        echo "success";
                    }else{
                        echo "Ce contrat n'exite pas!";
                    }
            }else{
                echo "Quelque chose s'est mal passé.Veuillez réessayer!";
            }
        }else{
            echo "La marque ou l'influenceur n'existe pas!";
        }
    }else{
        echo "Tous les champs de saisie sont obligatoires!";
    }
?>