<?php session_start(); ?>
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
  if(isset($_SESSION["user"])){
      header('Location: https://imackickstarter.000webhostapp.com/profile.php');
     // header('Location: http://localhost/projetWebS2/profile.php');
  }
  generate_header();
  ?>
  <!-- container -->
  <div class="container-fluid myContainer">
    <div class="title loginTitle">Connexion</div>
    <div class="loginContainer">
      <div class="text-center topButtonArea">
        <button class="myButton loginButtonLeft">Déjà inscrit</button>
        <a href="./register.php"><button class="myButton loginButtonRight">Nouveau</button></a>
      </div>
      <form class="d-flex align-items-center flex-column" id="form-login">
        <div class="loginText">Pseudo <span class="errorFormProjectMessage"></span></div>
        <input class="inputLogin" id="pseudo-login" name="pseudo" type="text">
        <div class="loginText">Mot de passe <span class="errorFormProjectMessage"></span></div>
        <input class="inputLogin" id="password-login" name="password" type="password">
      </form>
      <div class="text-center">
        <button type="submit" id="button-login" class="myButton loginButton">Se connecter
        </button>
      </div>
      <script src="js/form-login.js" ></script>
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