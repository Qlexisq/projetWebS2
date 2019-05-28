<?php
header("Content-Type: application/json; charset=UTF-8");

include_once "../connect.php";

require('project.class.php');

$method = strtolower($_SERVER['REQUEST_METHOD']);

// Verify the method used is POST
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

// Verify that parameters are not empty
if( !empty( $decoded['nameRegister'])
    && !empty($decoded['firstnameRegister'])
   && !empty($decoded['pseudoRegister'])
    &&!empty($decoded['mailRegister'])
   && !empty($decoded['passwordRegister'])){

    // Transform special characters
    $name = htmlspecialchars($decoded['nameRegister']);
    $firstname = htmlspecialchars($decoded['firstnameRegister']);
    $pseudo = htmlspecialchars($decoded['pseudoRegister']);
    $mail = htmlspecialchars($decoded['mailRegister']);
    $password = htmlspecialchars($decoded['passwordRegister']);
    $passwordBin=bin2hex($password);
    
}else 
{
    echo json_encode("No request provided");
    exit();
}

// Verify the email
if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
        $message = array(
            "message" => "Email not valid",
            "code" => 3
        );
        echo json_encode($message);  
        exit();
}


// Check if the nickname is not taken
$stmt = MyPDO::getInstance()->prepare(<<<SQL
   SELECT pseudo FROM User;
SQL
);
$stmt->execute();

while (($row = $stmt->fetch()) !== false) {
    foreach($row as $value){
        if($value == $pseudo)
        {
            http_response_code(404);
            echo json_encode("Error from register : name already exists");
            exit();
        }
    }
}


// Check if the mail is not taken
$stmt = MyPDO::getInstance()->prepare(<<<SQL
 SELECT mail FROM User;
SQL
);
$stmt->execute();

while (($row = $stmt->fetch()) !== false) {
    foreach($row as $value){
        if($value == $mail){
            http_response_code(404);
            echo json_encode("erreur form register");
            exit();
        }
    }
}

// Create a new row in the table User 
$db = MyPDO::getInstance();
$stmt = $db->prepare(<<<SQL
    INSERT INTO User (firstname, lastname, pseudo, mail, password)
    VALUES(:firstname, :lastname, :pseudo, :mail, :password);
SQL
);
if($stmt->execute(['firstname' => $firstname, 'lastname' => $name, 'pseudo' => $pseudo, 'mail' => $mail, 'password' => $passwordBin])){
    session_start();
    session_regenerate_id(true);
 //   $_SESSION["user"] = $db->lastInsertId();
    $message = array(
        "Message" => "Successfully registered",
        "code" => 1
    );
    echo json_encode($message);
    http_response_code(200);
    exit();
}
else{
    $message = array(
        "Message" => "Error while registering, please try again",
        "code" => 2
    );
    echo json_encode($message);
    exit();
}
?>