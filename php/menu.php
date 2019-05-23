<?php
session_start();
function generate_header(){
    if(isset($_SESSION["user"])){
        $link = "./profile.php";
        $label = "Mon profil";
    } else{
        $link = "./login.php";
        $label = "Se connecter";
    }
	$html = <<<HTML
	<img class="w-100 d-none d-md-block" src="./img/banner.png"/>

	<nav class="nav navbar navbar-expand-md nav-justified justify-content-between d-flex align-items-center myNav">
	<a class="d-md-none logoMobile" href="./index.php"><img class="w-100" src="./img/logo_noir_long.png"/></a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"><img class="menuIcon" src="./img/menu.png"/></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarToggler">
	<a class="nav-item nav-link" href="./projects-gallery.php">Découvrir les projets</a>
	<a class="nav-item nav-link" href="./project-creation.php">Créer mon projet</a>
	<a class="nav-link d-none d-md-block" href="./index.php"><img class="logoNav" src="./img/logo_noir_court_goodimac.png"/></a>
	<a class="nav-item nav-link" href="./about-us.php">À propos de nous</a>
	<a class="nav-item nav-link" href="$link">$label</a>
	</div>
	</nav>

HTML;
	echo $html;
}
?>