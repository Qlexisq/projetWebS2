
<!doctype html>
<head>
  <?php
  require_once('./php/head.php');
  generate_head();
  ?>
  <title>GOODIMAC - Créer mon projet</title>
</head>
<body>
  <!-- Header : banner + menu -->
  <?php
  require_once('./php/menu.php');
  generate_header();
  ?>
  <!-- container -->
  <div class="container-fluid myContainer">
    <div class="creationContainer">
      <div class="title">Lancer mon GOODIMAC</div>
      <div class="d-flex align-items-center flex-column">
        <div class="buttonSticker stepSticker d-flex justify-content-center align-items-center">1</div>
        <div class="stepText">CHOIX DU SUPPORT</div>
      </div>
      <div class="row">
        <div class="MultiCarousel" data-items="1,2,4,4" data-slide="4" id="MultiCarousel"  data-interval="1000">
          <div class="MultiCarousel-inner">
            <!-- dynamic beginning, please delete this part when you call the thumbnails dynamically -->
            <!-- the template is in support.php -->
            <div class="item">
              <div>
                <label>
                  <input type="radio" name="support">
                  <img  src="./img/test/test1.jpg">
                </label>
                <div class="supportName">
                  Nom du support
                </div>
              </div>
            </div>
            <div class="item">
              <div>
                <label>
                  <input type="radio" name="support">
                  <img  src="./img/test/test2.jpg">
                </label>
                <div class="supportName">
                  Nom du support
                </div>
              </div>
            </div>
            <div class="item">
              <div>
                <label>
                  <input type="radio" name="support">
                  <img  src="./img/test/test3.jpg">
                </label>
                <div class="supportName">
                  Nom du support
                </div>
              </div>
            </div>
            <div class="item">
              <div>
                <label>
                  <input type="radio" name="support">
                  <img  src="./img/test/test4.jpg">
                </label>
                <div class="supportName">
                  Nom du support
                </div>
              </div>
            </div>
            <div class="item">
              <div>
                <label>
                  <input type="radio" name="support">
                  <img  src="./img/test/test1.jpg">
                </label>
                <div class="supportName">
                  Nom du support
                </div>
              </div>
            </div>
            <div class="item">
              <div>
                <label>
                  <input type="radio" name="support">
                  <img  src="./img/test/test1.jpg">
                </label>
                <div class="supportName">
                  Nom du support
                </div>
              </div>
            </div>
            <div class="item">
              <div>
                <label>
                  <input type="radio" name="support">
                  <img  src="./img/test/test1.jpg">
                </label>
                <div class="supportName">
                  Nom du support
                </div>
              </div>
            </div>
            <div class="item">
              <div>
                <label>
                  <input type="radio" name="support">
                  <img  src="./img/test/test1.jpg">
                </label>
                <div class="supportName">
                  Nom du support
                </div>
              </div>
            </div>
            <div class="item">
              <div>
                <label>
                  <input type="radio" name="support">
                  <img  src="./img/test/test1.jpg">
                </label>
                <div class="supportName">
                  Nom du support
                </div>
              </div>
            </div>
            <div class="item">
              <div>
                <label>
                  <input type="radio" name="support">
                  <img  src="./img/test/test1.jpg">
                </label>
                <div class="supportName">
                  Nom du support
                </div>
              </div>
            </div>
            <div class="item">
              <div>
                <label>
                  <input type="radio" name="support">
                  <img  src="./img/test/test1.jpg">
                </label>
                <div class="supportName">
                  Nom du support
                </div>
              </div>
            </div>
            <div class="item">
              <div>
                <label>
                  <input type="radio" name="support">
                  <img  src="./img/test/test1.jpg">
                </label>
                <div class="supportName">
                  Nom du support
                </div>
              </div>
            </div>
            <!-- dynamic end -->
          </div>
          <button class="btn leftLst"><img src="./img/slider-arrow-left.png"></button>
          <button class="btn rightLst"><img src="./img/slider-arrow-right.png"></button>
        </div>
      </div>
      <div class="d-flex align-items-center flex-column">
        <div class="buttonSticker stepSticker d-flex justify-content-center align-items-center">2</div>
        <div class="stepText">IMPORTATION DU VISUEL</div>
      </div>
      <div class="text-center">
        <button class="myButton uploadButton">Importer
          <div class="buttonSticker uploadSticker d-flex justify-content-center align-items-center">
            <img src="./img/upload.png"/>
          </div>
        </button>
      </div>
      <div class="d-flex align-items-center flex-column">
        <div class="buttonSticker stepSticker d-flex justify-content-center align-items-center">3</div>
        <div class="stepText">DESCRIPTION DU GOODIMAC</div>
        Titre du GOODIMAC
        <input class="inputProjectTitle" type="text">
        Description
        <textarea class="inputProjectDescription"></textarea>
      </div>
      <div class="text-center">
        <button type="submit" class="myButton projectSubmitButton">Valider
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
  <!-- my slider js -->
  <script src="./js/slider.js"></script>
</body>
</html>
