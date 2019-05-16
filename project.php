
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
          <button class="myButton voteButtonRight" data-dismiss="modal">Fermer</button>
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
      <div class="row">
        <!-- dynamic beginning, please delete this part when you call the thumbnails dynamically-->
        <div class="col-md-3">
          <div class=" projectThumbnail">
            <div class="thumbnailImageBox text-center">
              <!-- change image file path dinamically -->
              <img class="thumbnailImage" src="./img/test/test1.jpg"/>
            </div>
            <!-- change project title dinamically -->
            <div class="thumbnailTitle">Titre du projet</div>
            <div class="progress">
              <!-- change progress-bar width(style.css) and aria-valuenow dynamically -->
              <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <!-- change percentage dynamically -->
            <div class="thumbnailPercentage">Soutenu à 50%</div>
            <!-- change description dynamically -->
            <div class="thumbnailText">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla id ipsum nisl. Aenean rutrum sapien ac arcu ornare, vel vehicula.</div>
            <div class="text-center thumbnailButtonBox">
              <a class="thumbnailLink" href="./project.php">
                <button class="myButton thumbnailButton">Soutenir
                  <div class="buttonSticker buttonHeart d-flex justify-content-center align-items-center">
                    <img src="./img/heart.png"/>
                  </div>
                </button>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class=" projectThumbnail">
            <div class="thumbnailImageBox text-center">
              <!-- change image file path dinamically -->
              <img class="thumbnailImage" src="./img/test/test2.jpg"/>
            </div>
            <!-- change project title dinamically -->
            <div class="thumbnailTitle">Titre du projet</div>
            <div class="progress">
              <!-- change progress-bar width(style.css) and aria-valuenow dynamically -->
              <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <!-- change percentage dynamically -->
            <div class="thumbnailPercentage">Soutenu à 50%</div>
            <!-- change description dynamically -->
            <div class="thumbnailText">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla id ipsum nisl. Aenean rutrum sapien ac arcu ornare, vel vehicula.</div>
            <div class="text-center thumbnailButtonBox">
              <a class="thumbnailLink" href="./project.php">
                <button class="myButton thumbnailButton">Soutenir
                  <div class="buttonSticker buttonHeart d-flex justify-content-center align-items-center">
                    <img class="" src="./img/heart.png">
                  </div>
                </button>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class=" projectThumbnail">
            <div class="thumbnailImageBox text-center">
              <!-- change image file path dinamically -->
              <img class="thumbnailImage" src="./img/test/test3.jpg"/>
            </div>
            <!-- change project title dinamically -->
            <div class="thumbnailTitle">Titre du projet</div>
            <div class="progress">
              <!-- change progress-bar width(style.css) and aria-valuenow dynamically -->
              <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <!-- change percentage dynamically -->
            <div class="thumbnailPercentage">Soutenu à 50%</div>
            <!-- change description dynamically -->
            <div class="thumbnailText">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla id ipsum nisl. Aenean rutrum sapien ac arcu ornare, vel vehicula.</div>
            <div class="text-center thumbnailButtonBox">
              <a class="thumbnailLink" href="./project.php">
                <button class="myButton thumbnailButton">Soutenir
                  <div class="buttonSticker buttonHeart d-flex justify-content-center align-items-center">
                    <img class="" src="./img/heart.png">
                  </div>
                </button>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class=" projectThumbnail">
            <div class="thumbnailImageBox text-center">
              <!-- change image file path dinamically -->
              <img class="thumbnailImage" src="./img/test/test4.jpg"/>
            </div>
            <!-- change project title dinamically -->
            <div class="thumbnailTitle">Titre du projet</div>
            <div class="progress">
              <!-- change progress-bar width(style.css) and aria-valuenow dynamically -->
              <div class="progress-bar" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <!-- change percentage dynamically -->
            <div class="thumbnailPercentage">Soutenu à 50%</div>
            <!-- change description dynamically -->
            <div class="thumbnailText">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla id ipsum nisl. Aenean rutrum sapien ac arcu ornare, vel vehicula.</div>
            <div class="text-center thumbnailButtonBox">
              <a class="thumbnailLink" href="./project.php">
                <button class="myButton thumbnailButton">Soutenir
                  <div class="buttonSticker buttonHeart d-flex justify-content-center align-items-center">
                    <img class="" src="./img/heart.png">
                  </div>
                </button>
              </a>
            </div>
          </div>
        </div>
        <!-- dynamic end -->
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