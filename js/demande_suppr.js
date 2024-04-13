/*pour récupèrer le formulaire HTML qui contient le bouton de validation et le champ d'erreur textuel à partir de leurs id*/
const form = document.querySelector(".delete_acc form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-text");

form.onsubmit = (e)=>{ /*pour empêcher l'envoi du formulaire lorsqu'on appuie sur le bouton*/
    e.preventDefault();
}

//On configure le bouton de validation pour qu'on puisse déclencher notre fonction une fois qu'il soit cliqué
continueBtn.onclick = ()=>{ 
    let xhr = new XMLHttpRequest();//On crée un objet XMLHttpRequest pour envoyer la requête au script PHP
    xhr.open("POST", "php/demande_suppr.php", true);
    xhr.onload = ()=>{//on utilise la propriété onload de l'objet XMLHttpRequest pour définir une fonction qui sera appelée lorsque la réponse du script PHP sera disponible.
    if(xhr.readyState === XMLHttpRequest.DONE){ 
      //On vérifie si la requête a abouti avec succès (status === 200) et si la réponse est différente de "Error" , un message d'erreur est affiché à l'utilisateur.
      // sinon, l'utilisateur est informé que sa demande a été envoyée avec succès et redirigé vers la page de profil. 
        if(xhr.status === 200){
              let data = xhr.response;
              if(data === "Error"){//S'il y a un erreur on envoie un message d'erreur à l'utilisateur
                errorText.style.display = "block";
                errorText.textContent = data;
              }else{//Si la demande est inséré avec succès on redirige l'utilisateur vers son page de profile
                location.href="users_page.php";
                alert("Votre demande a été envoyée avec succés! Merci de se déconnecter...");

              }
          }
      }
    }
    //On crée un objet FormData pour récupérer les données du formulaire et les envoyer via la méthode send() de l'objet XMLHttpRequest.
    let formData = new FormData(form);
    xhr.send(formData);

}