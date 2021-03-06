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

//check what we have to show
if (isset($_GET['project'])) {
    //var_dump($_SESSION);exit();
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
                $item['tri'] = 'Pourcent DESC, Project.name_project';
                break;
            case 'pourcent-down':
                $item['tri'] = 'Pourcent ASC, Project.name_project';
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

//if it's gallery project request
if ($item['project'] == "all" ) {
    $stmt = MyPDO::getInstance()->prepare(<<<SQL
        SELECT  Project.id_project, Project.name_project,Project.photo_project,Project.description_project,Project.date_project,Project.id_user,Project.id_template,
    	Project.id_goodies,Project.id_state, IFNULL(SUM(Vote.pourcentage_vote), 0) as Pourcent 
    	FROM Project 
    	LEFT JOIN Vote ON Project.id_project = Vote.id_project 
    	GROUP BY Project.id_project, Project.name_project 
    	ORDER BY $order;
SQL
    );
    $stmt->execute();
    while (($row = $stmt->fetch()) !== false) {
        array_push($projects, $row);
    }

    //check for all project informations
	foreach ($projects as $key => $project) {
		//vote
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

        //template
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
} else {
    //go on a specific projet
	$_SESSION["projectOpen"] = $item['project'];
    exit();
}