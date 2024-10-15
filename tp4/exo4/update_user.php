<?php
require_once('config.php');
$connectionString = "mysql:host=". _MYSQL_HOST;
    if(defined('_MYSQL_PORT')){
        $connectionString .= ";port=". _MYSQL_PORT;
    }
    $connectionString .= ";dbname=". _MYSQL_DBNAME;
    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' );

    $pdoUpd = NULL;
    try {
        $pdoUpd = new PDO($connectionString,_MYSQL_USER,_MYSQL_PASSWORD,$options);
        $pdoUpd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $erreur) {
        echo 'Erreur : '.$erreur->getMessage();
    }

    $previous_login = $_POST['previous_login'];
    $login = $_POST['new_login'];
    $email = $_POST['new_email'];

    $requestId = $pdoUpd->prepare("select * from users where login = :previous_login");
    $requestId->bindParam(':previous_login', $previous_login);
    $requestId->execute();


    $row = $requestId->fetch(PDO::FETCH_OBJ);
    $id = $row->id;



$requestUpd = $pdoUpd->prepare("UPDATE users SET login = :login, email = :email WHERE id = :id");


$requestUpd->bindParam(':login', $login);
$requestUpd->bindParam(':email', $email);
$requestUpd->bindParam(':id', $id);
$requestUpd->execute();

//close the database connection
$pdoAdd = NULL;
$request = NULL;
$row = NULL;
require_once('users.php');
?>