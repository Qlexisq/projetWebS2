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



if (isset($_SESSION["user"])) {
    //var_dump($_SESSION);exit();
   
    http_response_code(200);
}
else {
    http_response_code(404);
    echo json_encode("No request provided");
    exit();
}

//SQL COMMAND
$users = array();


    $stmt = MyPDO::getInstance()->prepare(<<<SQL
    SELECT  User.pseudo
	FROM User 
	WHERE User.id_user=:userID;
SQL
    );
    
   if($stmt->execute(['userID'=>$_SESSION["user"]])){
        
   }
   else{
        http_response_code(404);
        echo json_encode("User not found");
        exit();
}

   
	
        $stmt = MyPDO::getInstance()->prepare(<<<SQL
    SELECT Project.id_project, Project.name_project,Project.photo_project,Project.description_project,Project.date_project,Project.id_user,Project.id_template,
    Project.id_goodies,Project.id_state, Template.link_template
    FROM Project, Template
    WHERE Project.id_user=:userID
    AND Project.id_template = Template.id_template;
SQL
    );
    




    $stmt->execute(['userID'=>$_SESSION["user"]]);
    while (($row = $stmt->fetch()) !== false) {
        array_push($users, $row);
    }

    foreach ($users as $key => $user) {
		//récupère vote
		$votes = array();
		$stmt = MyPDO::getInstance()->prepare(<<<SQL
			SELECT Vote.pourcentage_vote
			FROM Project, State_project, Vote
			WHERE Vote.id_project=Project.id_project
            AND Project.id_user=:userID;
SQL
		);
		$stmt->execute(['userID'=>$_SESSION["user"]]);
		while (($row = $stmt->fetch()) !== false) {
			array_push($votes, $row['pourcentage_vote']);
		}
		$users[$key]['vote'] = $votes;

       }
	

    echo json_encode($users);

