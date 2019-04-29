 <?php
 function generate_head(){
  $html = <<<HTML
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
            <!--display only on index.php and projects-gallery.php -->
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

HTML;
  echo $html;
}
?>