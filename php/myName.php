<?php
session_start();

header("Content-Type: application/json; charset=UTF-8");

include_once "../connect.php";

require('project.class.php');

$method = strtolower($_SERVER['REQUEST_METHOD']);

if ($method !== 'get') {
    http_response_code(405);
    echo json_encode(array(
        'message' => 'This method is not allowed.'
    ));
    exit();
}

//check if the user is login with session
if (isset($_SESSION["user"])) {
    http_response_code(200);
}
else {
    http_response_code(404);
    echo json_encode("No request provided");
    exit();
}

//SQL COMMAND
//search pseudo user with id
$users = array();
$stmt = MyPDO::getInstance()->prepare(<<<SQL
    SELECT  User.pseudo
	FROM User 
	WHERE User.id_user=:userID;
SQL
    );
    
if($stmt->execute(['userID'=>$_SESSION["user"]])){
    while (($row = $stmt->fetch()) !== false) {
        array_push($users, $row);
    }  
}
else{
    http_response_code(404);
    echo json_encode("User not found");
    exit();
}

echo json_encode($users);

