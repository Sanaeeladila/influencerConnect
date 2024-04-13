
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>page d'accueil</title>
    <link rel="stylesheet" href="css/div3.css">
    <!-- pour que les icones seront affichees vous devez se connecter a l'internet -->
    <script src="https://kit.fontawesome.com/1e94604817.js" crossorigin="anonymous"></script> 
  </head>
<body>
  <!-- le body -->
  <!-- le header -->
  <?php include 'homepage_header.php'; ?>
  <!-- creer une section d'accueil -->

  <section id="accueil" >
    <h1 class="text_1">Nouez un partenariat avec un influenceur en quelques clics</h1>
    <a href="type.php"> <button class="button_1" >S'inscrire</button> </a>
  </section>
  <!-- creer une section d'a propos -->
 
  <section id="a_propos">
    <h1 class="logo_1">InfluencerConnect</h1>
    <p class="prag_1">Est la plateforme idéale pour faciliter la connexion entre les marques et les influenceurs</p>
    <p class="prag_1"> Nous sommes dédiés à aider les marques à trouver les influenceurs les plus pertinents pour leur public cible </p>
    <p class="prag_1">Et à aider les influenceurs à trouver des partenariats avec des marques qui correspondent à leur style et leur audience.</p>
  </section>
  <!-- creer une section de contact us -->

  <div id="contact" >
    <div class="container_box">
      <div class="box">
        <h2 class="title2"> Vous êtes une marque ? </h2>
        <p class="prag_1"> Nous pouvons vous offrer une solution personnalisée pour votre stratégie d'influence grâce à nos outils innovants de recherche </p>
      </div>

      <div class="box">
        <h2 class="title2"> Vous êtes un influenceur ?</h2>
        <p class="prag_1"> Vous pouvez monétiser votre audience et gagne de l'argent en répondant à des projets soumis par les top marques présentes sur notre plateforme </p>
      </div>
      
      <div class="box">
        <p class="pag_2" > N'hésitez pas à nous contacter directement afin d'en savoir plus sur nos solutions</p>
        <a href="contact_us.php"> <button class="button_2">Contactez-nous</button> </a>
      </div>
    </div>
</div>
  <!-- creer une boutton de arrow-up -->

  <a href="#" class="btni">
    <i class="fa-solid fa-arrow-up" style="color: #050505;" class="iconei"></i>
  </a>
  
  <!-- le footer -->
  <?php include 'footer.php'; ?>
</body>
</html>