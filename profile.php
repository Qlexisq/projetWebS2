
<!doctype html>
<head>
  <?php
  require_once('./php/head.php');
  generate_head();
  ?>
  <title>GOODIMAC - Mon profil</title>
</head>
<body>
  <!-- Header : banner + menu -->
  <?php
  require_once('./php/menu.php');
  generate_header();
  ?>
  <!-- container -->
  <div class="container-fluid myContainer">
    <!-- Modal vote success -->
    <div class="modal fade myModal" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-body text-center">
            Voulez-vous vraiment supprimer ce projet ?
          </div>
          <div class="text-center topButtonArea">
            <button class="myButton deleteButtonLeft">Oui</button></a>
            <button class="myButton deleteButtonRight" data-dismiss="modal">Non</button>
          </div>
        </div>
      </div>
    </div>
    <div class="profileProjects">
      <!-- change pseudo dynamically -->
      <div class="title">Mon profil : LaulauDu77</div>
      <div class="profileLegend text-center">MES CRÉATIONS</div>
      <div class="row">
        <!-- dynamic begining -->
        <div class="col-md-3">
          <div class=" projectThumbnail">
            <button class="buttonSticker crossSticker d-flex justify-content-center align-items-center" data-toggle="modal" data-target="#delete">x</button>
            <div class="thumbnailImageBox text-center">
              <!-- change image file path dinamically -->
              <a href=""><img class="thumbnailImage" src="./img/test/test1.jpg"/></a>
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
            <div class="buttonSticker crossSticker d-flex justify-content-center align-items-center">x</div>
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
            <div class="buttonSticker crossSticker d-flex justify-content-center align-items-center">x</div>            
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
            <div class="buttonSticker crossSticker d-flex justify-content-center align-items-center">x</div>
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
      <div class="profileLegend text-center">JE SOUTIENS</div>
      <div class="row">
        <!-- dynamic begining -->
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
  <!-- JavaScript for Bootstrap -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
