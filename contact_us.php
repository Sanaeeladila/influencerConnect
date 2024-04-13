<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InfluencerConnect</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/1e94604817.js"></script>
</head> 
  <body>
    <!-- creer un formulaire de contact_us -->
    <!-- creer une div qui enveloppe le contenu de ce formulaire -->
    <div class="wrapper">
      <!-- cette section représente la section du formulaire de contact-->
        <section class="form contact_us">
          <!-- creer le titre du formulaire -->
            <header>Contactez-nous</header>
            <!--definir le mode de transmission des donnees du formulaire -->
         <form action="#" method="post" autocomplete="off">
          <div class="separation"></div>
          <div class="error-text">
          <!-- temporary -->
          <div class="gauche">
          <div class="field input"></div>
          <div class="field input"></div>
          <div class="field input"></div></div>
          <div class="droite"><div class="field input"></div></div></div>

         <div class="field input">
           <label>Votre Prénom</label>
           <input type="text" name="prenom" placeholder="Entrez votre prénom" required />
           <i class="fa-solid fa-user" style="color: black;"></i>
          </div>
          <div class="field input">
            <label>Votre adresse email</label>
            <input type="text" name="email" placeholder="Entrez votre adresse email" required/>
            <i class="fa-solid fa-envelope" style="color: black;"></i>
          </div>
          <div class="field input">
            <label>Votre téléphone</label>
            <input type="text" name="tel" placeholder="Entrez votre num de téléphone " required/>
            <i class="fa-solid fa-phone" style="color: black;"></i>
          </div>
          <div class="field input">
            <label>Message</label>
            <input class="input_msg" type="text" name="msg" placeholder="Ecrivez votre message ici..."></input>
            <i class="fa-regular fa-messages" style="color: #000000;"></i>
          </div>
          <!-- creer une boutton pour envoyer le formulaire --> 
          <div class="field button" >
            <input type="submit" name="send" value="Envoyer le message">
          </div>
        </form>
      </section>
    </div>

  </body>
</html>