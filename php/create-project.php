<?php
session_start();

header("Content-Type: application/json; charset=UTF-8");

include_once "../connect.php";
include_once "is_code.php";

$method = strtolower($_SERVER['REQUEST_METHOD']);

if ($method !== 'post') {
    http_response_code(405);
    echo json_encode(array('message' => 'This method is not allowed.'));
    exit();
}


//$errors = [];
$message = [];

if (!isset($_POST["projectGoodieId"])) {
    http_response_code(400);
    $message = array(
        "Message" => "Please select a goodie",
        "Code" => 2,
    );
    echo json_encode($message);
    exit();
}

if (!isset($_POST["projectTitle"])) {
    http_response_code(400);
    $message = array(
        "Message" => "Please enter a title for your project",
        "Code" => 4,
    );
    echo json_encode($message);
    exit();
}

if (!isset($_POST["projectDescription"])) {
    http_response_code(400);
    $message = array(
        "Message" => "Please enter a description for your project",
        "Code" => 4,
    );
    echo json_encode($message);
    exit();
}

if (!isset($_FILES["projectPhoto"])) {
    http_response_code(400);
    $message = array(
        "Message" => "Please select a file to upload",
        "Code" => 3,
    );
    echo json_encode($message);
    exit();
}

if (is_code($_POST["projectGoodieId"]) && !is_numeric($_POST["projectGoodieId"])) {
    http_response_code(400);
    $message = array(
        "Message" => "Corrupted data, try again",
        "Code" => 2,
    );
    echo json_encode($message);
    exit();
}
if (is_code($_POST["projectTitle"])) {
    http_response_code(400);
    $message = array(
        "Message" => "Unauthorized special chars : " . $specialchars,
        "Code" => 4
    );
    echo json_encode($message);
    exit();
}

if (is_code($_POST["projectDescription"])) {
    http_response_code(400);
    $message = array(
        "Message" => "Unauthorized special chars : " . $specialchars,
        "Code" => 4,
    );
    echo json_encode($message);
    exit();
}


$path = '../img/templates/';
$extensions = ['jpg', 'jpeg', 'png', 'gif'];

$file_name = $_FILES['projectPhoto']['name'];
$file_tmp = $_FILES['projectPhoto']['tmp_name'];
$file_type = $_FILES['projectPhoto']['type'];
$file_size = $_FILES['projectPhoto']['size'];
$file_ext = strtolower(explode('.', $_FILES['projectPhoto']['name'])[1]);

//$path .= $_SESSION["user_id"]."/";
$path .= "1/";
$file = $path . $file_name;

if (file_exists($file)) {
    http_response_code(400);
    $message = array(
        "Message" => "File already exists",
        "Code" => 3
    );
    echo json_encode($message);
    exit();
    //$errors[] = 'File already exists ' . $file_name . ' ' . $file_type;
}

if (!in_array($file_ext, $extensions)) {
    http_response_code(400);
    $message = array(
        "Message" => "Extension not allowed",
        "Code" => 3
    );
    echo json_encode($message);
    exit();
    //$errors[] = 'Extension not allowed: ' . $file_name . ' ' . $file_type;
}

if ($file_size > 2097152) {
    http_response_code(400);
    $message = array(
        "Message" => "File size exceeds limit",
        "Code" => 3
    );
    echo json_encode($message);
    //$errors[] = 'File size exceeds limit: ' . $file_name . ' ' . $file_type;
}
if (empty($message)) {

    if (!file_exists($path) && !is_dir($path)) {
        mkdir($path);
    }
    if (move_uploaded_file($file_tmp, $file)) {
        $sql = <<<SQL
INSERT INTO template (link_template)
VALUES (:file)
SQL;
        $db = MyPDO::getInstance();
        $sth = $db->prepare($sql);
        if (!$sth->execute(array(':file' => $file))) {
            http_response_code(500);
            $message = array(
                "Message" => "Error inserting file to database",
                "Code" => 5
            );
            echo json_encode($message);
            exit();
        }

        $templateID = $db->lastInsertId();
        //$userId = $_SESSION["user_id"];
        $userId = 1;

        $sql = <<<SQL
INSERT INTO templateuser (`id_template`, `id_user`)
VALUES ($templateID, $userId);
SQL;
        if (MyPDO::getInstance()->exec($sql) == 0) {
            http_response_code(500);
            $message = array(
                "Message" => "Error linking file to user",
                "Code" => 5
            );
            echo json_encode($message);
            exit();
        }

        $goodieId = $_POST["projectGoodieId"];
        $projectTitle = $_POST["projectTitle"];
        $projectDescription = $_POST["projectDescription"];
        $createdAt = date("Y-m-d");
        $idState = 1;
        $photo = "";

        $sql = <<<SQL
INSERT INTO `project`(`id_project`, `name_project`, `photo_project`, `description_project`, `date_project`, `id_user`, `id_template`, `id_goodies`, `id_state`)
VALUES (:idProjet, :projectName, :projectPhoto, :projectDescription, :projectDate, :userId, :templateId, :goodiesId, :stateId)
SQL;
        $db = MyPDO::getInstance();
        $query = $db->prepare($sql);
        if (!$query->execute(array(
            ':idProjet' => NULL,
            ':projectName' => $projectTitle,
            ':projectPhoto' => $photo,
            ':projectDescription' => $projectDescription,
            ':projectDate' => $createdAt,
            ':userId' => $userId,
            ':templateId' => $templateID,
            ':goodiesId' => $goodieId,
            ':stateId' => $idState
        ))) {
            http_response_code(500);
            $message = array(
                "Message" => "Error creating project",
                "Code" => 5
            );
            $_SESSION["projectOpen"] = $db->lastInsertId();
            echo json_encode($message);
            exit();
        }
    } else {
        http_response_code(500);
        $message = array(
            "Message" => "Error uploading file",
            "Code" => 5
        );
        echo json_encode($message);
        exit();
    }
    http_response_code(201);
    $message = array(
        "Message" => "Project created",
        "Code" => 1
    );
    echo json_encode($message);
    exit();
}


