<?php
try {
    //$connexion = new PDO('mysql:host=localhost;dbname=goodimac;charset=utf8', 'root', 'root');
	require 'MyPDO.class.php';

	

	//ID pour se connecter au serveur en ligne 
	//NE MARCHE PAS DEPUIS WAMP TELECHARGER LA BDD EN LOCAL
	//MyPDO::setConfiguration('mysql:host=localhost;dbname=id9153549_goudimac;charset=utf8', 'id9153549_admin', 'ImacKickstarter02');

	// ID Sophie ne pas effacer
	//MyPDO::setConfiguration('mysql:host=localhost;dbname=id9153549_goudimac;charset=utf8', 'root', ''); 
	//MyPDO::setConfiguration('mysql:host=localhost;dbname=goodimac;charset=utf8', 'root', 'root');
    //ID Alexis
    MyPDO::setConfiguration('mysql:host=localhost;dbname=goodimac;charset=utf8', 'root', '');
 //  $connexion = new PDO('mysql:host=localhost;dbname=id9153549_goudimac;charset=utf8', 'id9153549_admin', 'ImacKickstarter02');

} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
