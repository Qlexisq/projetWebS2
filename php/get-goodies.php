<?php
/**
 * Created by PhpStorm.
 * User: alexi
 * Date: 18/05/2019
 * Time: 13:37
 */

header("Content-Type: application/json; charset=UTF-8");

include_once "../connect.php";

//require ( 'project.class.php' );

$method = strtolower($_SERVER['REQUEST_METHOD']);

if ($method !== 'get') {
    http_response_code(405);
    echo json_encode(array('message' => 'This method is not allowed.'));
    exit();
}

session_start ();



if (isset($_GET['goodies'])){
    $item['goodies'] = $_GET['goodies'];
    $_SESSION["goodies"] = $item['goodies'];
    http_response_code(200);
}
else {
    http_response_code(404);
    echo json_encode("No request provided");
    exit();
}


$goodies = array();

if(	$item['goodies']=="all"){
    $stmt = MyPDO::getInstance()->prepare(<<<SQL
	SELECT *
	FROM Goodies
SQL
    );
    $stmt->execute();
    while (($row = $stmt->fetch()) !== false) {
        array_push($goodies, $row);
    }
    echo json_encode($goodies);
}
else{
    echo $_SESSION["goodies"] ;
    exit();
}

