
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contract</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/1e94604817.js"></script>
  </head> 
  <body>
    <!-- creer un formulaire de contract -->
      <!-- creer une div qui enveloppe le contenu de ce formulaire -->
      <div  class="wrapper">
        <!-- cette section représente la section du formulaire de contact-->
        <section class="form contact_us">
            <!-- creer le titre du formulaire -->
            
            <header>Contrat de collaboration</header>
           <!--definir le mode de transmission des donnees du formulaire -->
           <form action="#" method="post" autocomplete="off">
             <div class="separation"></div>
              <!-- creer une div consacrer au msg d'erreur-->
             <div class="error-text">
              <!-- temporary -->
             <div class="gauche">
             <div class="field input"></div>
             <div class="field input"></div>
             <div class="field input"></div></div>
             <div class="droite"><div class="field input"></div></div></div>
              <!-- creer des div qui contiennent sept champs de saisie des donnees -->
             
             <div class="field input">
               <label>La marque</label>
               <input type="text" name="marque" placeholder="Entrer le nom de la marque" required />
               <i class="fa-solid fa-building" style="color: black;"></i>
              </div>
              <div class="field input">
                <label>L'influenceur</label>
                <input type="text" name="influenceur" placeholder="Entrer le nom de l'influenceur" required/>
                <i class="fa-solid fa-user" style="color: black;"></i>
              </div>
              <div class="field input">
                <label>Les termes de l'accord </label>
                <input type="text" name="terme" placeholder="Entrer les termes de votre accord" required/>
                <i class="fa-solid fa-check" style="color: black;"></i>
              </div>
              <div class="field input">
                <label>Le montant </label>
                <input type="text" name="montant" placeholder="Entrer le montant convenu" required/>
                <i class="fa-solid fa-money-check-dollar" style="color: black;"></i>
              </div>
              <div class="field input">
                <label>La duree de contrat</label>
                <input type="text" name="duree" placeholder="Entrer la duree de contrat" required/>
                <i class="fa-solid fa-business-time" style="color: #000000;"></i>
              </div>
              <div class="field input">
                <label>Date initiale</label>
                <input type="text" name="datei" placeholder="aaaa-mm-jj" required/>
                <i class="fa-solid fa-calendar-days" style="color: black;"></i>
              </div>
              <div class="field input">
                <label>Date finale</label>
                <input type="text" name="datef" placeholder="aaaa-mm-jj" required/>
                <i class="fa-solid fa-calendar-days" style="color: black;"></i>
              </div>
              <!-- creer une boutton pour envoyer le contrat de collaboration -->
              <div class="field button" >
               <input type="submit" name="send" value="Collaborer">
              </div>
              
              
            </form>
          </section>
        </div>
    <!-- ajouter le script js -->
    <script src="js/contrat.js"></script>
  </body>
</html>