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
 //   $item['page']     = $_GET['page'];

    $_SESSION["project"] = $item['project'];
    
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
    }
    http_response_code(200);
} else {
    http_response_code(404);
    echo json_encode("No request provided");
    exit();
}

$order = $item['tri'];

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
    echo json_encode($projects);
} else {
    echo $_SESSION["project"];
    exit();
}