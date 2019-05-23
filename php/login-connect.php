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
    SELECT id_user, password FROM user WHERE pseudo = :pseudo;
SQL
);
if(!$stmt->execute(['pseudo' => $pseudo])){
    http_response_code(400);
    $message = array(
        "message" => "Something went wrong",
        "code" => 4
    );
    echo json_encode($message);
    exit();
} else{
    $i=0;
    while(($row = $stmt->fetch(PDO::FETCH_ASSOC)) !== false)
    {
        $i++;
        foreach($row as $value)
        {
            if($value == $password)
            {
                session_start();
                $_SESSION["user"] = $row["id_user"];
                http_response_code(200);
                $message = array(
                    "message" => "Login successfull",
                    "code" => 1
                );
                echo json_encode($message);
                exit();

            }
        }
    }
    if($i != 0){
        http_response_code(400);
        $message = array(
            "message" => "Incorrect password",
            "code" => 3
        );
        echo json_encode($message);
        exit();
    } else{
        http_response_code(400);
        $message = array(
            "message" => "Incorrect login",
            "code" => 2
        );
        echo json_encode($message);
        exit();
    }

}



?>