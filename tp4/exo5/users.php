<?php
require_once("init_pdo.php");
function get_users($db){
    $sql = "SELECT * FROM users";
    $exe = $db->query($sql);
    $res = $exe->fetchAll(PDO::FETCH_OBJ);
    return $res;
}

function add_user($db, $login, $email){
    $sql = "INSERT INTO users (login, email) VALUES (:login, :email)";
    $exe = $db->prepare($sql);
    $exe->bindParam(':login', $login);
    $exe->bindParam(':email', $email);
    $exe->execute();
}

function delete_user($db, $login){
    $sql = "DELETE FROM users WHERE login = :login";
    $exe = $db->prepare($sql);
    $exe->bindParam(':login', $login);
    $exe->execute();
}

function setHeaders() {
    // https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Access-Control-Allow-Origin
    header("Access-Control-Allow-Origin: *");
    header('Content-type: application/json; charset=utf-8');
}
// ==============
// Responses
// ==============

switch($_SERVER["REQUEST_METHOD"]) {
    case 'GET':
        $result = get_users($pdo);
        setHeaders();
        exit(json_encode($result));
    case 'POST':
        $input = json_decode(file_get_contents('php://input'), true);
        
        if (isset($input['login']) && isset($input['email'])) {
            add_user($pdo, $input['login'], $input['email']);
            setHeaders();
            http_response_code(201);
            exit(json_encode(['status' => 'ok']));
        } else {
            http_response_code(400);
            exit(json_encode(['status' => 'error', 'message' => 'Invalid input']));
        }
    case 'DELETE':
        $input = json_decode(file_get_contents('php://input'), true);
        if (isset($input['login'])) {
            delete_user($pdo, $input['login']);
            setHeaders();
            http_response_code(204);
            exit(json_encode(['status' => 'ok']));
        } else {
            http_response_code(400);
            exit(json_encode(['status' => 'error', 'message' => 'Invalid input']));
        }
}