<?php 
header("Content-Type: application/json; charset=UTF-8");

include_once "../connect.php";

require ( 'project.class.php' );

$method = strtolower($_SERVER['REQUEST_METHOD']);

if ($method !== 'get') {
	http_response_code(405);
	echo json_encode(array('message' => 'This method is not allowed.'));
	exit();
}

http_response_code(200);

if (isset($_GET['project'])){
	$item['project'] = $_GET['project'];
}
else {
	http_response_code(404);
	echo json_encode("No request provided");
	exit();
}

$projects = array();

if(	$item['project']=="all"){
	$stmt = MyPDO::getInstance()->prepare(<<<SQL
	SELECT *
	FROM Project
SQL
	);
	$stmt->execute();
	while (($row = $stmt->fetch()) !== false) {
		array_push($projects, $row);
	}

echo json_encode($projects);

}
