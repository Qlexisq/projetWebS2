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

//check post content
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

if(!empty( $decoded['delete']) && !empty($decoded['image']))
{
    // verification à faire  
    $delete = $decoded['delete'];
    $image= $decoded['image'];
}else 
{
   // http_response_code(404);
    echo json_encode("No request provided");
    exit();
}

// SQL : delete from many table
$stmt = MyPDO::getInstance()->prepare(<<<SQL
    DELETE FROM Vote
    WHERE Vote.id_project=:projectID
SQL
);
   if(!$stmt->execute(['projectID' => $delete])){
    http_response_code(400);
    $message = array(
        "message" => "Something went wrong",
        "code" => 4
    );
    echo json_encode($message);
    exit();

}

$stmt = MyPDO::getInstance()->prepare(<<<SQL
    DELETE FROM Template
    WHERE Template.id_template
    IN (SELECT Project.id_template from Project WHERE Project.id_project=:projectID);
SQL
);
if(!$stmt->execute(['projectID' => $delete])){
    http_response_code(400);
    $message = array(
        "message" => "Something went wrong",
        "code" => 4
    );
    echo json_encode($message);
    exit();
} 

$stmt = MyPDO::getInstance()->prepare(<<<SQL
    DELETE FROM Templateuser
    WHERE Templateuser.id_user
    IN (SELECT Project.id_user from Project WHERE Project.id_project=:projectID);
SQL
);
if(!$stmt->execute(['projectID' => $delete])){
    http_response_code(400);
    $message = array(
        "message" => "Something went wrong",
        "code" => 4
    );
    echo json_encode($message);
    exit();
} 

$stmt = MyPDO::getInstance()->prepare(<<<SQL
    DELETE FROM Project
    WHERE Project.id_project=:projectID
SQL
);
if(!$stmt->execute(['projectID' => $delete])){
    http_response_code(400);
    $message = array(
        "message" => "Something went wrong",
        "code" => 4
    );
    echo json_encode($message);
    exit();
} 
else{
   //file image template suppr from server
   $fichier ='.'. $image;

   if(file_exists($fichier)){
     unlink($fichier) ;
   }
    http_response_code(200);
    $message = array(
        "message" => "Delete project",
        "code" => 1
    );
    echo json_encode($message);
    exit();
}
?>