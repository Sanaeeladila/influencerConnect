//On définie les variables pour stocker les éléments prévenus de notre formulaire de recherche

const searchBar = document.querySelector(".search input"),
searchIcon = document.querySelector(".search button"),
usersList = document.querySelector(".users-list");

searchIcon.onclick = ()=>{//La fct suivante sera exécutée lorsque le bouton est cliqué
  searchBar.classList.toggle("show");//Pour afficher la barre de recherche
  searchIcon.classList.toggle("active");//Pour modifier l'icone de recherche
  searchBar.focus();//Place le curseur de texte dans la barre de recherche, donnant le focus à cet élément pour faciliter la saisie de l'utilisateur
  if(searchBar.classList.contains("active")){//On Vérifie si la barre de recherche a la classe css "active", cela signifie que l'utilisateur a précédemment effectué une recherche et la barre de recherche est déja active
    searchBar.value = "";//On la réinitialise a la chaine vide
    searchBar.classList.remove("active");//On supprime la classe active pour indiquer que la recherche est désactivée
  }
}

searchBar.onkeyup = ()=>{//Lorsque le bouton est relâché la fct suivante est exécutée
  let searchTerm = searchBar.value;//On stocke le terme de recherche entré par l'utilisateur 
  if(searchTerm != ""){//On vérifie si le terme n'est pas vide
    searchBar.classList.add("active");//On active la barre de recherche
  }else{
    searchBar.classList.remove("active");//On désactive la barre de recherche
  }
  let xhr = new XMLHttpRequest();//On declare la requête xhr qui envoie les données de recherche au script php
  xhr.open("POST", "php/rechercher.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          usersList.innerHTML = data;//la liste des utilisateurs sera mis à jour avec le resultat de recherche
        }
    }
  }
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("searchTerm=" + searchTerm);
}

/*On définie une fonction qui sera exécutée toutes les 500 millisecondes.
 Cela est utilisé pour effectuer une action répétitive, dans notre cas, pour récupérer périodiquement les utilisateurs*/
setInterval(() =>{
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "php/users.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          if(!searchBar.classList.contains("active")){
            usersList.innerHTML = data;
          }
        }
    }
  }
  xhr.send();
}, 500);

