<?php
header("Content-Type: application/json; charset=UTF-8");

include_once "../connect.php";

require('project.class.php');

$method = strtolower($_SERVER['REQUEST_METHOD']);

if ($method !== 'post') {
    http_response_code(405);
    echo json_encode(array(
        'message' => 'This method is not allowed.'
    ));
    exit();
}
 
$contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

if ($contentType === "application/json") {
  //Receive the RAW post data.
  $content = trim(file_get_contents("php://input"));

  $decoded = json_decode($content, true);
 

  //If json_decode failed, the JSON is invalid.
  if(! is_array($decoded)) {
     echo json_encode("Error json");
        exit();
  } 
}

if( !empty( $decoded['nameRegister'])
    && !empty($decoded['firstnameRegister'])
   && !empty($decoded['pseudoRegister'])
    &&!empty($decoded['mailRegister'])
   && !empty($decoded['passwordRegister'])){
    // verification à faire  
    $name = htmlspecialchars($decoded['nameRegister']);
    $firstname = htmlspecialchars($decoded['firstnameRegister']);
    $pseudo = htmlspecialchars($decoded['pseudoRegister']);
    $mail = htmlspecialchars($decoded['mailRegister']);
    $password = htmlspecialchars($decoded['passwordRegister']);
    
}else 
{
   // http_response_code(404);
    echo json_encode("No request provided");
    exit();
}


//Véfirication si le pseudo non pris
$stmt = MyPDO::getInstance()->prepare(<<<SQL
   SELECT pseudo FROM User;
SQL
);
$stmt->execute();
//  $stmt->setFecthMode(PDO::FETCH_ASSOC);
while (($row = $stmt->fetch()) !== false) {
    foreach($row as $value)
{
    if($value == $pseudo)
    {
        http_response_code(404);
        echo json_encode("Error from register : name already exists");
        exit();
       }
}
}



//verification mail
$stmt = MyPDO::getInstance()->prepare(<<<SQL
 SELECT mail FROM User;
SQL
);
$stmt->execute();
//    $stmt->setFecthMode(PDO::FETCH_ASSOC);
while (($row = $stmt->fetch()) !== false) {
    foreach($row as $value){
        if($value == $mail){
            http_response_code(404);
            echo json_encode("erreur form register");
            exit();
        }
    }
}

$stmt = MyPDO::getInstance()->prepare(<<<SQL
    INSERT INTO User (firstname, lastname, pseudo, mail, password)
    VALUES(:firstname, :lastname, :pseudo, :mail, :password);
SQL
);
if($stmt->execute(['firstname' => $firstname, 'lastname' => $name, 'pseudo' => $pseudo, 'mail' => $mail, 'password' => $password])){
    echo json_encode("Register done");
    http_response_code(200);
    exit();
}
else{
    http_response_code(404);
        echo json_encode("Error to insert");
        exit();
}
?>