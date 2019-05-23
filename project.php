
<!doctype html>
<head>
  <?php
  require_once('./php/head.php');
  generate_head();
  ?>
  <title>GOODIMAC - *NOM DU PROJET*</title> <!-- dynamic -->
</head>
<body>
  <!-- Header : banner + menu -->
  <?php
  require_once('./php/menu.php');
  generate_header();
  ?>
  <!-- Modal not logged -->
  <div class="modal fade myModal" id="not-logged" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body text-center">
          Vous n'êtes pas connecté !
          <br>Pour voter vous devez être inscrit et connecté sur le site.
        </div>
        <div class="text-center topButtonArea">
          <a href="./login.php"><button class="myButton registerButtonLeft">Se connecter</button></a>
          <a href="./register.php"><button class="myButton loginButtonRight">S'inscrire</button></a>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal vote success -->
  <div class="modal fade myModal" id="vote-success" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body text-center">
          Votre vote a bien été pris en compte !
          <br>Merci d'avoir soutenu ce projet.
        </div>
        <div class="text-center topButtonArea">
          <a href="./projects-gallery.php"><button class="myButton voteButtonLeft">Voir d'autres projets</button></a>
          <a href="./project.php"><button class="myButton voteButtonRight" data-dismiss="modal">Fermer</button></a>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal already votes -->
  <div class="modal fade myModal" id="already-voted" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-body text-center">
          Désolé mais vous avez déjà voté pour ce projet.
          <br>Ce vote ne sera donc pas pris en compte.
        </div>
        <div class="text-center topButtonArea">
          <a href="./projects-gallery.php"><button class="myButton voteButtonLeft">Voir d'autres projets</button></a>
          <button class="myButton voteButtonRight" data-dismiss="modal">Fermer</button>
        </div>
      </div>
    </div>
  </div>
  <!-- container -->
  <div class="container-fluid myContainer">
    <div class="projectBg" id="project">
     
    </div>
    <div class="suggestions">
      <div class="text-center suggestionsTitle">VOUS AIMEREZ AUSSI</div>
      <div class="row" id="galleryProjects">
          

      </div>
    </div>
    <!-- container end -->  
  </div>
  <script src="js/project.js" crossorigin="anonymous"></script>
  <!-- JavaScript for Bootstrap -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>