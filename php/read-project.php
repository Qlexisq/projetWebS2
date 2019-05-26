<?php
session_start();

header("Content-Type: application/json; charset=UTF-8");

include_once "../connect.php";

require ( 'project.class.php' );

//check if a specific project is open
if (isset($_SESSION["projectOpen"])){
	$item['project']=$_SESSION["projectOpen"];
	http_response_code(200);
}
else {
	//http_response_code(404);
	echo json_encode("No request provided");
	exit();
}

//search all informations about the project
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
			SELECT COUNT(Vote.pourcentage_vote) as pourcentage_vote
			FROM Vote
			WHERE Vote.id_project = :projectId;
SQL
        );

        $stmt->execute(array(
            ':projectId'=>$project["id_project"]
        ));
        $row = $stmt->fetch();
        $voteCount = (int)$row['pourcentage_vote'];
        for($i=0;$i<$voteCount;$i++){
            $votes[$i] = 1;
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

		//récupère goodies
		$goodies=array();
		$stmt = MyPDO::getInstance()->prepare(<<<SQL
			SELECT Goodies.photo_goodies
			FROM Project, Goodies
			WHERE Project.id_project = :projectID 
			AND Project.id_goodies = Goodies.id_goodies;
SQL
		);
		$stmt->execute(['projectID'=>$project['id_project']]);
		while (($row = $stmt->fetch()) !== false) {
			array_push($goodies, $row['photo_goodies']);
		}
		$projects[$key]['goodies'] = $goodies;

		$connexion=array();
			
		if(isset($_SESSION["user"])){
			$connexion[0]=1;
			$userVotes = array();
			$stmt = MyPDO::getInstance()->prepare(<<<SQL
				SELECT *
				FROM Project, State_project, Vote
				WHERE Project.id_project= :projectID
				AND Vote.id_project=Project.id_project
				AND Vote.id_user=:userID;
SQL
			);
			$stmt->execute(['projectID'=>$project['id_project'],'userID'=>$_SESSION["user"]]);
			while (($row = $stmt->fetch()) !== false) {
				array_push($userVotes, $row);
			}
			if(empty($userVotes)){
				$projects[$key]['alreadyVote'] = 0;
			}
			else{
				$projects[$key]['alreadyVote'] = 1;
			}
			$projects[$key]['vote'] = $votes;
		}
		else{
			$connexion[0]=0;
		}
		$projects[$key]['connexion'] = $connexion;
		
	}
	echo json_encode($projects);
}
else{
	http_response_code(404);
	echo json_encode("No request provided");
	exit();
}

