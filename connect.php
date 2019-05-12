<?php
try {
    $connexion = new PDO('mysql:host=localhost;dbname=id9153549_goudimac;charset=utf8', 'id9153549_admin', 'ImacKickstarter02');
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
