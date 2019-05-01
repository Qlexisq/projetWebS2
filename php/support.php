 <?php
 function generate_head(){
  $html = <<<HTML
            <div class="item">
              <div>
                <label>
                  <input type="radio" name="support">
                  <!-- change image file path dynamically -->
                  <img  src=""/>
                </label>
                <!-- change name dynamically -->
                <div class="supportName">
                  Nom du support
                </div>
              </div>
            </div>

HTML;
  echo $html;
}
?>