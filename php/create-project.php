<?php
session_start ();

header("Content-Type: application/json; charset=UTF-8");

include_once "../connect.php";

$method = strtolower($_SERVER['REQUEST_METHOD']);

if ($method !== 'post') {
    http_response_code(405);
    echo json_encode(array('message' => 'This method is not allowed.'));
    exit();
}


if(isset($_FILES["projectPhoto"]) && isset($_POST["projectGoodieId"]) && isset($_POST["projectTitle"]) && isset($_POST["projectDescription"])){
    $errors = [];
    $path = '../img/templates/';
    $extensions = ['jpg', 'jpeg', 'png', 'gif'];

    $file_name = $_FILES['projectPhoto']['name'];
    $file_tmp = $_FILES['projectPhoto']['tmp_name'];
    $file_type = $_FILES['projectPhoto']['type'];
    $file_size = $_FILES['projectPhoto']['size'];
    $file_ext = strtolower(explode('.', $_FILES['projectPhoto']['name'])[1]);
    //$file_ext = strtolower(end(explode('.', $_FILES['projectPhoto']['name'])));

    //$path .= $_SESSION["user_id"]."/";
    $path .= "1/";
    $file = $path . $file_name;

    if (file_exists( $file )){
        $errors[] = 'File already exists ' . $file_name . ' ' . $file_type;
    }

    if (!in_array($file_ext, $extensions)) {
        $errors[] = 'Extension not allowed: ' . $file_name . ' ' . $file_type;
    }

    if ($file_size > 2097152) {
        $errors[] = 'File size exceeds limit: ' . $file_name . ' ' . $file_type;
    }
    if (empty($errors)) {

        if ( !file_exists( $path ) && !is_dir( $path ) ) {
            mkdir( $path );
        }
        if(move_uploaded_file($file_tmp, $file)){
            $sql = <<<SQL
INSERT INTO template (link_template)
VALUES (:file)
SQL;
            $db = MyPDO::getInstance();
            $sth = $db->prepare($sql);
            $sth->execute(array(':file' => $file));

            $templateID = $db->lastInsertId();


            echo json_encode($templateID);
        }
    }
    if ($errors) print_r($errors);
}
/*

if (isset($_GET['project'])){
    $item['project'] = $_GET['project'];
    $_SESSION["project"] = $item['project'];
    http_response_code(200);
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
else{
    echo $_SESSION["project"] ;
    exit();
}
*/


