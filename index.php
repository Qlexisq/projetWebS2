<!doctype html>
<head>
  <?php
  require_once('./php/head.php');
  generate_head();
  ?>
  <title>GOODIMAC - Accueil</title>
</head>
<body>
  <!-- Header : banner + menu -->
  <?php
  require_once('./php/menu.php');
  generate_header();
  ?>
  <!-- container -->
  <div class="container-fluid myContainer">
    <div class="indexBg d-flex flex-column justify-content-center">
      <div class="indexTitle text-center">
        C’est ici que commencent
        <br>les idées créatives et scientifiques !
      </div>
      <div class="indexText text-center">
        Tout d’abord, vous aurez besoin  de l’état d’esprit propre aux <b>IMAC</b>.
        <br>Ajoutez-y la volonté d’<b>afficher fièrement votre école</b> et la créativité de ses ingénieurs.
        <br>
        <br>Concrétisez le tout avec :
        <br>- Un système de <b>votes</b> permettant de soutenir vos goodies préférés 
        <br>- La possibilité de <b>créer vos propres designs</b> et donc vos propres goodies
        <br>- Une fois arrivés à 100% de votes, la <b>production des goodies</b> est lancée
        <br>
        <br>Bravo, vous avez ici la genèse de Goodimac : <b>voter pour des goodies et en créer !</b>
      </div>
      <div class="text-center">
        <img class="indexImg" src="./img/index-img.png"/>
      </div>
      <div class="indexButtonArea text-center">
        <a href="./projects-gallery.php"><button class="myButton indexButtonLeft">Découvrir les projets</button></a>
        <a href="./project-creation.php"><button class="myButton indexButtonRight">Créer mon projet</button></a>
      </div>
    </div>
    <div class="indexProjects">
      <div class="title">Les projets les plus soutenus</div>
      <div class="row" id="home-project">
        <!-- dynamic beginning, please delete this part when you call the thumbnails dynamically-->
       
        <!-- dynamic end -->
      </div>
      <div class="text-center">
        <a href="./projects-gallery.php"><button class="myButton indexButtonGallery">Afficher tous les projets
          <div class="buttonSticker buttonArrow d-flex justify-content-center align-items-center">
            <img src="./img/right-arrow.png"></img></button>
          </div>
        </a>
      </div>
    </div>
    <!-- container end -->  
  </div>
   <script src="js/home-project.js" crossorigin="anonymous"></script>
  <!-- JavaScript for Bootstrap -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
