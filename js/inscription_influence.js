//On définie les variables pour stocker les éléments prévenus de notre formulaire d'inscription
const form = document.querySelector(".signup form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-text");

//Pour empêcher le comportement par défaut du formulaire
form.onsubmit = (e)=>{
    e.preventDefault();
}

/*On définie la fonction qui va nous permettre d'envoyer les données récuperées à partir le formulaire
 pour les traiter une fois le bouton est cliqué*/
continueBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/inscription_influence.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response;
              if(data === "success"){//Si les données sont inserées correctement on reçoie le message success 
                location.href="users_page.php";//Puis on redirige l'utilisateur vers son page de profile
              }else{//Sinon on reçoie le message d'erreur qui sera affiché sur l'écran
                errorText.style.display = "block";
                errorText.textContent = data;
              }
          }
      }
    }
    //Envoyer les données
    let formData = new FormData(form);
    xhr.send(formData);
}