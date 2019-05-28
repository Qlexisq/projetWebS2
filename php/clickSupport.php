<?php
session_start();

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

//check vote post
if(!empty( $decoded['soutien']))
{
		// verification à faire  
		$soutien = $decoded['soutien'];
}else 
{
	 // http_response_code(404);
		echo json_encode("No request provided");
		exit();
}

// SQL : insert vote
$stmt = MyPDO::getInstance()->prepare(<<<SQL
	 INSERT INTO Vote 
	 VALUES (:projectID,:userID,1);
SQL
);
if(!$stmt->execute(['projectID' => $soutien,'userID' => $_SESSION['user']])){
	http_response_code(400);
	$message = array(
		"message" => "Something went wrong",
		"code" => 0
	);
	echo json_encode($message);
	exit();
}
else{
	http_response_code(200);
	$message = array(
		"message" => "Support done",
		"code" => 1
	);
	echo json_encode($message);
	exit();
}
?>