<?php 
  session_start();
?>

<?php include_once "myheader.php"; ?>
<body>
  <!-- creer un formulaire de demande de suppression du compte -->
  <!-- creer une div qui enveloppe le contenu de ce formulaire -->
  <div class="wrapper">
    <!-- cette section représente la section de ce formulaire -->
    <section class="delete_acc form">
      <!-- creer le titre du formulaire -->
      <header>Demande de suppression du compte</header>
      <!--definir le mode de transmission des donnees du formulaire -->
      <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off">
        <!-- creer une div consacrer au msg d'erreur-->
        <div class="error-text"></div>
        <!-- creer une div qui contient un champs de saisie -->
        <div class="field input">
          <label>Rédigez votre demande ici :</label>
          <input type="text" name="contenu" id="contenu" placeholder="Rédigez votre demande ici ..." required></input>
        </div>
       
        <!-- creer une boutton pour envoyer le formulaire -->
        <div class="field button">
          <input type="submit" name="submit" value="Envoyer">
        </div>
       
      </form>
      
    </section>
  </div>
  <!-- ajouter le script js -->
  <script src="js/demande_suppr.js"></script>

</body>
</html>