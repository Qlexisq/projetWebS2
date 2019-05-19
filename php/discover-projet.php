<?php
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

session_start();



if (isset($_GET['project'])) {
    $item['project']     = $_GET['project'];
    $_SESSION["project"] = $item['project'];
	$order ='name_project ASC';

    if (isset($_GET['tri'])) {
        switch ($_GET['tri']) {
            case 'name-up':
                $item['tri'] = 'name_project ASC';
                break;
            case 'name-down':
                $item['tri'] = 'name_project DESC';
                break;
            case 'date-up':
                $item['tri'] = 'date_project ASC';
                break;
            case 'date-down':
                $item['tri'] = 'date_project DESC';
                break;
            case 'pourcent-up':
                $item['tri'] = 'id_project ASC';
                break;
            case 'pourcent-down':
                $item['tri'] = 'id_project DESC';
                break;
            case 'type':
                $item['tri'] = 'id_goodies ASC';
                break;
            case 'random':
                $item['tri'] = 'RAND()';
                break;    
        }
        $order = $item['tri'];
    }
    http_response_code(200);
}
else {
    http_response_code(404);
    echo json_encode("No request provided");
    exit();
}

//SQL COMMAND
$projects = array();

if ($item['project'] == "all" ) {
    $stmt = MyPDO::getInstance()->prepare(<<<SQL
    SELECT *
    FROM Project ORDER BY $order;
SQL
    );
    
    $stmt->execute();
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
} else {
	$_SESSION["projectOpen"] = $item['project'];
   
    exit();
}