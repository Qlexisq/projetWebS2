<?php
function generate_header(){
	$html = <<<HTML
	<img class="w-100" src="./img/banner.png"/>

	<nav class="nav nav-justified justify-content-betweenq d-flex align-items-center myNav">
		<a class="nav-item nav-link" href="./projects-gallery.php">Découvrir les projets</a>
		<a class="nav-item nav-link" href="./project-creation.php">Créer mon projet</a>
		<a class="nav-link" href="./index.php"><img src="./img/logo_noir_court_goodimac.png"/></a>
		<a class="nav-item nav-link" href="./about-us.php">À propos de nous</a>
		<a class="nav-item nav-link" href="./profile.php">Mon Profil</a>
	</nav>

HTML;
	echo $html;
}
?>