<?php
    while($row = mysqli_fetch_assoc($query)){
        $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
                OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
                OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
        $query2 = mysqli_query($conn, $sql2);//On récupère le dernier message envoyé
        $row2 = mysqli_fetch_assoc($query2);
        //Si un message est trouvé on le stocke sinon on affiche un message à l'utilisateur
        (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="Aucun message disponible";
        //Si le message est assez long on affiche les trois point à la fin pour indiquer qu'il reste une suite n'est pas affichée
        (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
        if(isset($row2['outgoing_msg_id'])){
            ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "vous: " : $you = "";
        }else{
            $you = "";
        }
        //On récupère le status de l'utilisateur pour modifier la couleur du petit cercle en indiquant si l'utilisateur est connecté ou pas
        ($row['status'] == "Hors ligne") ? $offline = "offline" : $offline = "";
        ($outgoing_id == $row['unique_id']) ? $hid_me = "hide" : $hid_me = "";

        $output .= '<a href="chat.php?user_id='. $row['unique_id'] .'">
                    <div class="content">
                    <img src="php/images/'. $row['img'] .'" alt="">
                    <div class="details">
                        <span>'. $row['fname']. " " . $row['lname'] .'</span>
                        <p>'. $you . $msg .'</p>
                    </div>
                    </div>
                    <div class="status-dot '. $offline .'"><i class="fas fa-circle"></i></div>
                </a>';
    }
?>