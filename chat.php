<?php 
  session_start();
  include_once "php/dbconfig.php";
  if(!isset($_SESSION['unique_id'])){//On limite l'accès à cette page de tel sorte que seuls les utilisateurs connecté peuvent l'y acceder
    header("location: connexion.php");
  }
?>
<?php include_once "myheader.php"; ?>
<body>
  <!-- creer -->
  <div class="wrapper">
    <!-- creer une section du chat -->
    <section class="chat-area">
      <header>
        <?php 
        //On récupère les données de l'utilisateurs pour les afficher à l'en-tête
          $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
          $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$user_id}");
          if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
          }else{
            header("location: users.php");
          }
        ?>
        <!-- ajouter une icone arrow-left qui va nous aider a retourner a la page precedante -->
        <a href="users.php" class="back-icon"><i class="fas fa-arrow-left"></i></a>
        <!-- importer les donnees d'utilisateur de la base de donnee et les affiches-->
        <img src="php/images/<?php echo $row['img']; ?>" alt="">
        <div class="details">
          <span><?php echo $row['fname']. " " . $row['lname'] ?></span>
          <p><?php echo $row['status']; ?></p>
        </div>
      </header>
      <!-- creer une div du chat box ou les msgs seront affiches -->
      <div class="chat-box">

      </div>
      <!-- creer une boutton "collaborer -->
      <a href="contrat.php"><button class="contrat_sign" ><p class="text_p">Collaborer</p></button></a>
      <!-- creer une zone de saisie  -->
      <form action="#" class="typing-area">
        <input type="text" class="incoming_id" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
        <input type="text" name="message" class="input-field" placeholder="Tapez votre message ici..." autocomplete="off">
        <button><i class="fab fa-telegram-plane "></i></button>
      </form>
    </section>
  </div>
  <!-- ajouter le script js -->
  <script src="js/chat.js"></script>

</body>
</html>
