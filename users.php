<?php 
  session_start();
  include_once "php/dbconfig.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: connexion.php");
  }
?>
<?php include_once "myheader.php"; ?>
<body>
  <div class="wrapper">
    <section class="users">
      <header>
        <a href="users_page.php" class="back-icon"><i class="fas fa-arrow-left" color="black"></i></a>
        <div class="content">
          <?php 
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = {$_SESSION['unique_id']}");
            if(mysqli_num_rows($sql) > 0){
              $row = mysqli_fetch_assoc($sql);
            }
          ?>
          <img src="php/images/<?php echo $row['img']; ?>" alt="">
          <div class="details">
            <span><?php echo $row['fname']. " " . $row['lname'] ?></span>
            <p><?php echo $row['status']; ?></p>
          </div>
        </div>
        <a href="php/deconnexion.php?logout_id=<?php echo $row['unique_id']; ?>" class="logout">Déconnexion</a>
      </header>
      <!-- creer une section de recherche avec un champ de saisie -->
      <div class="search">
        <span class="text">Selectionner un utilisateur</span>
        <input type="text" placeholder="Enter name to search...">
        <button><i class="fas fa-search"></i></button>
      </div>
      <!-- creer une section de liste d'utilisateurs -->
      <div class="users-list">
  
      </div>
    </section>
  </div>
  <!--  ajouter le script js -->
  <script src="js/users.js"></script>

</body>
</html>
