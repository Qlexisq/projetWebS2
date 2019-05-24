<?php
session_start();
if(!isset($_SESSION["user"])){
    header('Location: http://localhost/projetWebS2/login.php');
}
?>
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
          <span class="errorFormProjectMessage"></span>
        <div class="stepText">CHOIX DU SUPPORT</div>
      </div>

      <div class="row">
        <div class="MultiCarousel" data-items="1,2,4,4" data-slide="4" id="MultiCarousel"  data-interval="1000">
          <div class="MultiCarousel-inner">
            <!-- dynamic beginning, please delete this part when you call the thumbnails dynamically -->
            <!-- the template is in support.php -->

            <!-- dynamic end -->
          </div>
          <button class="btn leftLst"><img src="./img/slider-arrow-left.png"></button>
          <button class="btn rightLst"><img src="./img/slider-arrow-right.png"></button>
        </div>
      </div>
      <div class="d-flex align-items-center flex-column">
        <div class="buttonSticker stepSticker d-flex justify-content-center align-items-center">2</div>
          <span class="errorFormProjectMessage"></span>
        <div class="stepText">IMPORTATION DU VISUEL</div>
      </div>
      <div class="text-center">

        <label id="import" style="height:auto;" for="fileUpload" class="myButton uploadButton">Importer
            <input type="file" id="fileUpload" style="width: 0.1px;
	                                                    height: 0.1px;
                                                        opacity: 0;
                                                        overflow: hidden;
                                                        position: absolute;
                                                        z-index: -1;"
            >
          <div class="buttonSticker uploadSticker d-flex justify-content-center align-items-center">
            <img src="./img/upload.png"/>
          </div>
        </label>
      </div>
      <div class="d-flex align-items-center flex-column">
        <div class="buttonSticker stepSticker d-flex justify-content-center align-items-center">3</div>
          <span class="errorFormProjectMessage"></span>
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
  <script type="text/javascript" src="js/get-goodies.js"></script>
  <script type="text/javascript" src="js/create-project.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <!-- my slider js -->
    <script type="text/javascript" src="js/upload.js"></script>
</body>
</html>
