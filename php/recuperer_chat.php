<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        include_once "dbconfig.php";
        $outgoing_id = $_SESSION['unique_id'];//On récupère l'id de l'utlisateur
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $output = "";
        $sql = "SELECT * FROM messages LEFT JOIN users ON users.unique_id = messages.outgoing_msg_id
                WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){//On récupère tous les messages correspondants au deux utilisateurs
                if($row['outgoing_msg_id'] === $outgoing_id){//On affiche les messages en faisant différencier les couleurs et le format pour bien séparer les massages de l'utilisateur au ceux du destinataire
                    $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>'. $row['msg'] .'</p>
                                </div>
                                </div>';
                }else{
                    $output .= '<div class="chat incoming">
                                <img src="php/images/'.$row['img'].'" alt="">
                                <div class="details">
                                    <p>'. $row['msg'] .'</p>
                                </div>
                                </div>';
                }
            }
        }else{
            $output .= '<div class="text">Aucun message disponible. Une fois que vous envoyez un message, ils apparaitront ici.</div>';
        }
        echo $output;
    }else{
        header("location: ../connexion.php");
    }

?>