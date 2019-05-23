<?php
/**
 * Created by PhpStorm.
 * User: alexi
 * Date: 23/05/2019
 * Time: 11:35
 */

session_start();
header("Content-Type: application/json; charset=UTF-8");

$method = strtolower($_SERVER['REQUEST_METHOD']);

if ($method !== 'get') {
    http_response_code(405);
    echo json_encode(array(
        'message' => 'This method is not allowed.',
        'code' => 2
    ));
    exit();
} else{
    $_SESSION = array();
// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

// Finally, destroy the session.
    session_destroy();
    http_response_code(200);
    $message = array(
        "message" => "Successfully disconnected",
        "code" => 1
    );
    echo json_encode($message);
    exit();
}