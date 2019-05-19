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
			SELECT Vote.pourcentage_vote
			FROM Project, State_project, Vote
			WHERE Project.id_project= :projectID
			AND Vote.id_project=Project.id_project
			AND Vote.pourcentage_vote=1;
SQL
		);
		$stmt->execute(['projectID'=>$project['id_project']]);
		while (($row = $stmt->fetch()) !== false) {
			array_push($votes, $row['pourcentage_vote']);
		}
		$projects[$key]['vote'] = $votes;


		//récupère user
		$users=array();
		$stmt = MyPDO::getInstance()->prepare(<<<SQL
			SELECT User.pseudo
			FROM Project, User
			WHERE Project.id_project= :projectID
			AND Project.id_user=User.id_user;
SQL
		);
		$stmt->execute(['projectID'=>$project['id_project']]);
		while (($row = $stmt->fetch()) !== false) {
			array_push($users, $row['pseudo']);
		}
		$projects[$key]['user'] = $users;

		//récupère template
		$templates=array();
		$stmt = MyPDO::getInstance()->prepare(<<<SQL
			SELECT Template.link_template 
			FROM Project, Template 
			WHERE Project.id_project = :projectID 
			AND Project.id_template = Template.id_template;
SQL
		);
		$stmt->execute(['projectID'=>$project['id_project']]);
		while (($row = $stmt->fetch()) !== false) {
			array_push($templates, $row['link_template']);
		}
		$projects[$key]['template'] = $templates;
	}
	

	echo json_encode($projects);
}
else{
	http_response_code(404);
	echo json_encode("No request provided");
	exit();
}

