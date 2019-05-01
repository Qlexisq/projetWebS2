
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
    <div class="aboutUs">
      <div class="title">À propos de nous</div>
      <div class="row">
        <div class="col-12 col-md-6">
          <div>
            <br>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
            <br><br>
            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          </div>
        </div>
        <div class="col-12 col-md-6">
          <div class="text-center">
            <img class="aboutUsImage" src="./img/index-img.png"/>
          </div>
        </div>
      </div>
      <div class="aboutUsButtonArea text-center">
        <a href="./projects-gallery.php"><button class="myButton indexButtonLeft">Découvrir les projets</button></a>
        <a href="./project-creation.php"><button class="myButton indexButtonRight">Créer mon projet</button></a>
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