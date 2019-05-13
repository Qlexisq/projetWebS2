<?php
try {
	require_once 'MyPDO.class.php';
	MyPDO::setConfiguration('mysql:host=localhost;dbname=id9153549_goudimac;charset=utf8', 'id9153549_admin', 'ImacKickstarter02');

	// ID Sophie ne pas effacer
	PDO::setConfiguration('mysql:host=localhost;dbname=id9153549_goudimac;charset=utf8', 'root', ''); 
   //$connexion = new PDO('mysql:host=localhost;dbname=id9153549_goudimac;charset=utf8', 'id9153549_admin', 'ImacKickstarter02');

} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
