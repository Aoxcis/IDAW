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

function update_user($db, $previous_login, $login, $email){
    $sql1 = "SELECT id FROM users WHERE login = :previous_login";
    $exe1 = $db->prepare($sql1);
    $exe1->bindParam(':previous_login', $previous_login);
    $exe1->execute();

    $sql = "UPDATE users SET login = :login, email = :email WHERE id = :id";
    $exe = $db->prepare($sql);
    $exe->bindParam(':login', $login);
    $exe->bindParam(':email', $email);
    $exe->bindParam(':id', $exe1->fetch(PDO::FETCH_OBJ)->id);
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
            http_response_code(200);
            exit(json_encode(['status' => 'ok']));
        } else {
            http_response_code(400);
            exit(json_encode(['status' => 'error', 'message' => 'Invalid input']));
        }
    case 'UPDATE':
        $input = json_decode(file_get_contents('php://input'), true);

        if(isset($input['previous_login']) && isset($input['login']) && isset($input['email'])){
            update_user($pdo, $input['previous_login'], $input['login'], $input['email']);
            setHeaders();
            http_response_code(201);
            exit(json_encode(['status' => 'ok']));
        } else {
            http_response_code(400);
            exit(json_encode(['status' => 'error', 'message' => 'Invalid input']));
        }
    default:
        http_response_code(405);
        exit(json_encode(['status' => 'error', 'message' => 'Method not allowed']));
}