<?php 
    session_start();//On démarre la session
    include_once "dbconfig.php";//On inclue le fichier contenant la connexion à la base de données
    $email = mysqli_real_escape_string($conn, $_POST['email']);//On recupère les données de l'utilisateurs 
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    if(!empty($email) && !empty($password)){//On vérifie si les champs ne sont pas vides 
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
        if(mysqli_num_rows($sql) > 0){//On vérifie si l'email existe
            $row = mysqli_fetch_assoc($sql);//On stock le resultat de la requête dans row
            $user_pass = md5($password);// On crypte le mot de passe entré par l'utilisateur pour le comparer avec la valeur déja stocker dans la base de données
            $enc_pass = $row['password'];
            if($user_pass === $enc_pass){
                $status = "En ligne";//Si la valeur est identique on met à jour le status de l'utilisateur
                $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
                if($sql2){
                    $_SESSION['unique_id'] = $row['unique_id'];//on stocke l'id de l'utilisateur dans l'id de la session
                    echo "success";//On envoie le message success
                }else{
                    echo "Quelque chose s'est mal passé. Veuillez réessayer!";
                }
            }else{
                echo "Email ou mot de passe incorrect!";
            }
        }else{
            echo "$email - Cette adresse email n'éxiste pas!";
        }
    }else{
        echo "Tous les champs de saisie sont obligatoires!";
    }
?>