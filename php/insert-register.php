<?php
include_once "../connect.php";
session_start();

echo "<script>
        console.log('je suis la')
     </script>";

if(isset($_GET['name-register']) && isset($_GET['firstname-register']) && isset($_GET['pseudo-register']) && isset($_GET['mail-register']) && isset($_GET['password-register']))
{
    // verification à faire
    echo json_encode("find request");
    $name = $_GET['name-register'];
    $firstname = $_GET['firstname-register'];
    $pseudo = $_GET['pseudo-register'];
    $mail = $_GET['mail-register'];
    $password = $_GET['password-register'];
    $stmt = MyPDO::getInstance()->prepare(<<<SQL
    INSERT INTO user (firstname, lastname, pseudo, mail, password)
    VALUES(:firstname, :lastname, :pseudo, :mail, :password);
SQL
);
    $stmt->execute(['firstname' => $firstname, 'lastname' => $name, 'pseudo' => $pseudo, 'mail' => $pseudo, 'password' => $password]);
}else 
{
    http_response_code(404);
    echo json_encode("erreur form register");
    exit();
}

?>