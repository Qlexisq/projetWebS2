<?php session_start(); ?>
<!doctype html>
<head>
  <?php
  require_once('./php/head.php');
  generate_head();
  ?>
  <title>GOODIMAC - Découvrir les projets</title>
</head>
<body>
  <!-- Header : banner + menu -->
  <?php
  require_once('./php/menu.php');
  generate_header();
  ?>
  <!-- container -->
  <div class="container-fluid myContainer">
    <div class="galleryProjects" >
      <div class="d-flex justify-content-between align-items-center">
        <div class="title" id="tri">Tous les projets
        </div>
        <div>
          <button class="myButton selectButton">
            <form class="" id="form-tri">
              <select name="tri" class="selectGallery">
                <option value="" selected="selected">Trier par</option>
                <option value="name-up" selected="selected">Nom croissant</option>
                <option value="name-down">Nom décroissant</option>
                <option value="date-up">Date croissante</option>
                <option value="date-down">Date décroissante</option>
                <option value="pourcent-up">Les plus soutenu</option>
                <option value="pourcent-down">Les moins soutenu</option>
                <option value="type">Type</option>
              </select>
            </form>
          </button>
        </div>
      </div>
      <div class="row" id="galleryProjects">
        <!-- dynamic beginning, please delete this part when you call the thumbnails dynamically-->
        <!-- the template is in thumbnail.php -->


        <!-- dynamic end -->
      </div>
    </div>



    <!-- container end -->  
  </div>
  <script src="js/discover-projet.js" crossorigin="anonymous"></script>
  <!-- JavaScript for Bootstrap -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
