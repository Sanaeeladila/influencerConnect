const form = document.querySelector(".typing-area"), /*On définie la variable form pour stocker l'élément DOM (Document Object Model) prévenu du formulaire qui a la classe CSS "typing-area"*/
incoming_id = form.querySelector(".incoming_id").value,/*Pour stocker l'id de l'utilisateur à partir de la session*/
inputField = form.querySelector(".input-field"),/*Pour stocker le message entré par l'utilisateur dans la zone de text du formulaire*/
sendBtn = form.querySelector("button"),/*Pour stocker le premier élément <button> dans le formulaire, dans notre cas c'est le bouton d'envoi du message*/
chatBox = document.querySelector(".chat-box");/*Pour stocker l'élément DOM représentant la zone ou les messages seront affichés*/

/*On définie cette fonction pour empêcher le chargement de la page en évitant le comportement par défaut du formulaire*/
form.onsubmit = (e)=>{ 
    e.preventDefault();
}

inputField.focus();/*Pour que le curseur apparaitra automatiquement à l'intérieur de ce champ lors du chargement de la page*/
inputField.onkeyup = ()=>{ /*Lorsque la touche est relâchée dans le champ de saisie du message du chat, cette fonction fléchée est exécutée*/
    if(inputField.value != ""){ /*On vérifie si le champ de saisie du message n'est pas vide*/
        sendBtn.classList.add("active");/* Ajoute la classe css "active" à l'élément du bouton d'envoi pour changer l'apparence du bouton lorsque le champ de saisie n'est pas vide*/
    }else{
        sendBtn.classList.remove("active");/*si le champ de saisie est vide On supprime la classe "active" */
    }
}

sendBtn.onclick = ()=>{ /*Lorsque le bouton d'envoi est cliqué, cette fonction fléchée est exécutée*/
    let xhr = new XMLHttpRequest(); /* On crée un nouvel objet XMLHttpRequest, qui est utilisé pour effectuer des requêtes HTTP*/
    xhr.open("POST", "php/insersion_chat.php", true);/*On initialise l'URL de la destination vers le fichier php pour insérer les données récupérées dans la base de données*/
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){/*Lorsque la requête XMLHttpRequest est terminée avec succès, on vérifie si la requête a été correctement traitée (status 200)*/
              inputField.value = "";/*On réinitialise la valeur du champ de saisie du message à une chaîne vide, effaçant ainsi le contenu précédent après l'envoi du message*/
              scrollToBottom();/*Cette fonction permet de défiler la zone de chat vers le bas, pour que le dernier message soit visible*/
          }
      }
    }
    let formData = new FormData(form);/*On crée un nouvel objet FormData à partir du formulaire sélectionné, pour collecter les données saisies dans le formulaire pour les envoyer avec la requête*/
    xhr.send(formData);/*Pour envoyer la requête HTTP POST avec les données du formulaire vers l'URL spécifiée*/
}
chatBox.onmouseenter = ()=>{/*Lorsque la souris entre dans la zone des messages on change l'apparence de cette dernière*/
    chatBox.classList.add("active");
}

chatBox.onmouseleave = ()=>{
    chatBox.classList.remove("active");
}

/*On définie une fonction qui sera exécutée toutes les 500 millisecondes.
 Cela est utilisé pour effectuer une action répétitive, dans notre cas, pour récupérer périodiquement les nouveaux messages du chat*/
setInterval(() =>{
    let xhr = new XMLHttpRequest();/*On crée un nouvel objet XMLHttpRequest */
    xhr.open("POST", "php/recuperer_chat.php", true);/*On initialise une requête HTTP POST pour récupérer les messages du chat*/
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            chatBox.innerHTML = data;
            if(!chatBox.classList.contains("active")){
                scrollToBottom();
              }
          }
      }
    }
    /*On définit l'en-tête de la requête HTTP pour indiquer le type de contenu envoyé au serveur*/
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("incoming_id="+incoming_id);/*Pour envoyer la requête HTTP POST avec les données du formulaire, dans notre cas, l'identifiant entrant ("incoming_id") récupéré précédemment*/
}, 500);

//On définie cette fonction qui nous va permettre de défiler la zone de chat vers le bas en ajustant la valeur de scrollTop à scrollHeight
function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
  }