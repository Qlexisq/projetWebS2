
<!doctype html>
<head>
  <?php
  require_once('./php/head.php');
  generate_head();
  ?>
  <title>GOODIMAC - À propos de nous</title>
</head>
<body>
  <!-- Header : banner + menu -->
  <?php
  require_once('./php/menu.php');
  generate_header();
  ?>
  <!-- container -->
  <div class="container-fluid myContainer">
    <div class="title loginTitle">Inscription</div>
    <div class="loginContainer">
      <div class="text-center topButtonArea">
        <a href="./login.php"><button class="myButton registerButtonLeft">Déjà inscrit</button></a>
        <button class="myButton registerButtonRight">Nouveau</button>
      </div>
      <form class="d-flex align-items-center flex-column">
        <div class="loginText">Nom</div>
        <input class="inputLogin" type="text">        
        <div class="loginText">Prénom</div>
        <input class="inputLogin" type="text">        
        <div class="loginText">Pseudo</div>
        <input class="inputLogin" type="text">
        <div class="loginText">Adresse mail</div>
        <input class="inputLogin" type="text">
        <div class="loginText">Mot de passe</div>
        <input class="inputLogin" type="text">
      </form>
      <div class="text-center">
        <button type="submit" class="myButton loginButton">S'inscrire
        </button>
      </div>
    </div>
    <!-- container end -->  
  </div>
  <!-- JavaScript for Bootstrap -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>