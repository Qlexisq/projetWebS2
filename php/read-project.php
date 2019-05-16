<?php 
header("Content-Type: application/json; charset=UTF-8");

include_once "../connect.php";

require ( 'project.class.php' );

session_start();


if (isset($_SESSION["project"])){
	$item['project']=$_SESSION["project"];
	http_response_code(200);
}
else {
	//http_response_code(404);
	echo json_encode("No request provided");
	exit();
}


$projects = array();

if($item['project']!="all"){
	$stmt = MyPDO::getInstance()->prepare(<<<SQL
	SELECT *
	FROM Project WHERE id_project=:projectID;
SQL
	);
	$stmt->execute(['projectID'=>$item['project']]);
	while (($row = $stmt->fetch()) !== false) {
		array_push($projects, $row);
	}
	echo json_encode($projects);
}
else{
	http_response_code(404);
	echo json_encode("No request provided");
	exit();
}

