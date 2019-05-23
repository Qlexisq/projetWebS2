<?php //session_start(); ?>
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
          <a class="" href="./profile.php">
            <button class="myButton deleteButtonLeft" id="deleteYes">Oui</button></a>
            <button class="myButton deleteButtonRight" data-dismiss="modal">Non</button>
          </div>
        </div>
      </div>
    </div>
    <div class="profileProjects" id="profileProjects">
        <button id="disconnectButton" class="myButton registerButtonLeft" style="margin:15px 0px">Se déconnecter</button>
      <!-- change pseudo dynamically -->
      
      <div class="profileLegend text-center">MES CRÉATIONS</div>
      <div class="row" id="myProject">
        <!-- dynamic begining -->
        
      
        <!-- dynamic end -->
      </div>
      <div class="profileLegend text-center">JE SOUTIENS</div>
      <div class="row" id="mySupport">
        <!-- dynamic begining -->
        
        <!-- dynamic end -->
      </div>
    </div>
    <!-- container end -->  
  </div>
  <script src="js/profile.js" crossorigin="anonymous"></script>
  <!-- JavaScript for Bootstrap -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
