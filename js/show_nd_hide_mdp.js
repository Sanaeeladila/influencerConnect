/*On déclare la constant pswrdField on utilisant la methode querySelector pour récuperer l'élément du type password du formulaire */
const pswrdField = document.querySelector(".form input[type='password']"),
toggleIcon = document.querySelector(".form .field i");//Pour récuperer l'élément icone

toggleIcon.onclick = () =>{//Lorsque l'icone est cliquée on exécute la fct
  if(pswrdField.type === "password"){//On vérifie si le type du champ est égale à password c-à-d si le mot de passe est masqué
    pswrdField.type = "text";//On change le type du champ pour afficher le mot de passe en tant que texte
    toggleIcon.classList.add("active");//On change l'apparence de l'icone (l'oeil)
  }else{//Si le mot de passe est affiché on va le masquer
    pswrdField.type = "password";
    toggleIcon.classList.remove("active");
  }
}
