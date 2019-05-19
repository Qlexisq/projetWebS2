<?php 
header("Content-Type: application/json; charset=UTF-8");

include_once "../connect.php";

require ( 'project.class.php' );

session_start();


if (isset($_SESSION["projectOpen"])){
	$item['project']=$_SESSION["projectOpen"];
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

	foreach ($projects as $key => $project) {
		$votes = array();
		$stmt = MyPDO::getInstance()->prepare(<<<SQL
			SELECT vote.pourcentage_vote
			FROM project, state_project, vote
			WHERE project.id_project= :projectID
			AND vote.id_project=project.id_project;
SQL
		);
		$stmt->execute(['projectID'=>$project['id_project']]);
		while (($row = $stmt->fetch()) !== false) {
			array_push($votes, $row['pourcentage_vote']);
		}
		$projects[$key]['vote'] = $votes;
	}
	
	echo json_encode($projects);
}
else{
	http_response_code(404);
	echo json_encode("No request provided");
	exit();
}

