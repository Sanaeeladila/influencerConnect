<?php
    session_start();
    include_once "dbconfig.php";
    $getid = $_SESSION['unique_id'];

    $req = "SELECT * FROM users WHERE unique_id = {$getid}";
    $gettype = mysqli_query($conn, $req);
    if(mysqli_num_rows($gettype) > 0){
        $row = mysqli_fetch_assoc($gettype);
        if($row['type'] == "marque"){
            $lname =" ";
        }else{
            $lname = mysqli_real_escape_string($conn, $_POST['lname']);
        }
    }
 
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);//pour échapper les caractères spéciaux dans la chaîne de caractères avant de l'insérer dans la base de données
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $age_chiffre = mysqli_real_escape_string($conn, $_POST['age_chiffre']);
    $website = mysqli_real_escape_string($conn, $_POST['website']);
    $ig = mysqli_real_escape_string($conn, $_POST['ig']);
    $fb = mysqli_real_escape_string($conn, $_POST['fb']);
    $tiktok = mysqli_real_escape_string($conn, $_POST['tiktok']);

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){

                if(isset($_FILES['image'])){
                    $img_name = $_FILES['image']['name'];
                    $img_type = $_FILES['image']['type'];
                    $tmp_name = $_FILES['image']['tmp_name'];
                    
                    $img_explode = explode('.',$img_name);
                    $img_ext = end($img_explode);
    
                    $extensions = ["jpeg", "png", "jpg"];
                    if(in_array($img_ext, $extensions) === true){
                        $types = ["image/jpeg", "image/jpg", "image/png"];
                        if(in_array($img_type, $types) === true){
                            $time = time();
                            $new_img_name = $time.$img_name;
                            if(move_uploaded_file($tmp_name,"images/".$new_img_name)){
                                $encrypt_pass = md5($password);
                                
                                $update_query = mysqli_query($conn, "UPDATE users SET fname = '{$fname}', lname = '{$lname}', email = '{$email}', password = '{$encrypt_pass}',
                                 img = '{$new_img_name}', age_chiffre = '{$age_chiffre}', website = '{$website}', ig_acc = '{$ig}', fb_acc = '{$fb}', tiktok_acc = '{$tiktok}'
                                WHERE unique_id = {$getid}");
                                if($update_query){
                                    $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                    if(mysqli_num_rows($select_sql2) > 0){
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
        }else{
            echo "$email n'est pas un email valide!";
        }
    }else{
        echo "Tous les champs de saisie sont obligatoires!";
    }
?>