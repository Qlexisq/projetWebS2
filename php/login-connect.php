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

if( !empty( $decoded['pseudoLogin']) && !empty($decoded['passwordLogin']))
{
    // verification à faire  
    $pseudo = htmlspecialchars($decoded['pseudoLogin']);
    $password = htmlspecialchars($decoded['passwordLogin']);
    
    
}else 
{
   // http_response_code(404);
    echo json_encode("No request provided");
    exit();
}

// Vérification de la connexion 
$stmt = MyPDO::getInstance()->prepare(<<<SQL
    SELECT password FROM user WHERE pseudo = :pseudo;
SQL
);
$stmt->execute(['pseudo' => $pseudo]);

while(($row = $stmt->fetch()) !== false)
{
    foreach($row as $value)
    {
        if($value == $password)
        {
            echo json_encode("Login done");
            http_response_code(200);
        }
    }
}

?>