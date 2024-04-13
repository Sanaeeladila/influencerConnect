<?php
    session_start();//On démarre la session
    include_once "dbconfig.php";//On inclue le fichier contenant la connexion à la base de données
    //On recupère les données saisis par l'utilisateurs 
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $age = mysqli_real_escape_string($conn, $_POST['age']);
    $website = mysqli_real_escape_string($conn, $_POST['website']);
    $ig = mysqli_real_escape_string($conn, $_POST['ig']);
    $fb = mysqli_real_escape_string($conn, $_POST['fb']);
    $tiktok = mysqli_real_escape_string($conn, $_POST['tiktok']);

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){//le filtre de validation de l'email
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
            if(mysqli_num_rows($sql) > 0){//On vérifie si l'email déja existe
                echo "$email - Cet email existe déjà!";
            }else{
                if(isset($_FILES['image'])){//On récupère l'image
                    $img_name = $_FILES['image']['name'];//On récupère le nom l'image
                    $img_type = $_FILES['image']['type'];//On récupère le type l'image
                    $tmp_name = $_FILES['image']['tmp_name'];//On récupère le nom temporaire de l'image
                    
                    $img_explode = explode('.',$img_name); //On divise le nom du fichier image en utilisant le point comme séparateur
                    $img_ext = end($img_explode);//On récupère l'extention de l'image à partir de la dernière partie du nom de fichier
    
                    $extensions = ["jpeg", "png", "jpg"];//On définie les extentions acceptés
                    if(in_array($img_ext, $extensions) === true){//On vérifie si l'extention est valide
                        $types = ["image/jpeg", "image/jpg", "image/png"];//On définie les types acceptés
                        if(in_array($img_type, $types) === true){//On vérifie si le type est valide
                            $time = time();//On récupère l'heure actuelle en tant que valeur numérique
                            $new_img_name = $time.$img_name;//On change le nom de l'image en ajoutant l'heure actuelle
                            if(move_uploaded_file($tmp_name,"images/".$new_img_name)){//On déplace l'image vers le dossier images
                                $ran_id = rand(time(), 100000000);//On génère un identifiant unique aléatoire pour l'utilisateur
                                $status = "En ligne";//On définie le status de l'utilisateur
                                $type = "influenceur";//On déifinie le type d'utilisateur
                                $encrypt_pass = md5($password);//On crypte le mot de passe de l'utilisateur par la méthode de hachage md5 pour sécuriser ses données
                                //Insersion des données 
                                $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, type, status, age_chiffre, website, ig_acc, fb_acc, tiktok_acc)
                                VALUES ({$ran_id}, '{$fname}','{$lname}', '{$email}', '{$encrypt_pass}', '{$new_img_name}', '{$type}', '{$status}', '{$age}', '{$website}', '{$ig}', '{$fb}', '{$tiktok}')");
                                if($insert_query){
                                    $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                    if(mysqli_num_rows($select_sql2) > 0){//On vérifie si les données sont bien insérées
                                        $result = mysqli_fetch_assoc($select_sql2);
                                        $_SESSION['unique_id'] = $result['unique_id'];//On stocke l'id de l'utilisateur dans l'id de la session
                                        //Si tout est bien passé en envoie le message success
                                        echo "success";
                                    }else{
                                        echo "Cette adresse email n'éxiste pas!";
                                    }
                                }else{
                                    echo "Quelque chose s'est mal passé. Veuillez réessayer!";
                                }
                            }
                        }else{
                            echo "Veuillez télécharger un fichier image - jpeg, png, jpg";
                        }
                    }else{
                        echo "Veuillez télécharger un fichier image - jpeg, png, jpg";
                    }
                }
            }
        }else{
            echo "$email n'est pas un email valide!";
        }
    }else{
        echo "Tous les champs de saisie sont obligatoires!";
    }
?>