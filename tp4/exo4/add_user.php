<?php
require_once('config.php');
$connectionString = "mysql:host=". _MYSQL_HOST;
    if(defined('_MYSQL_PORT')){
        $connectionString .= ";port=". _MYSQL_PORT;
    }
    $connectionString .= ";dbname=". _MYSQL_DBNAME;
    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' );

    $pdoAdd = NULL;
    try {
        $pdoAdd = new PDO($connectionString,_MYSQL_USER,_MYSQL_PASSWORD,$options);
        $pdoAdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $erreur) {
        echo 'Erreur : '.$erreur->getMessage();
    }



$request = $pdoAdd->prepare("INSERT INTO users (id, login, email) VALUES (NULL, :login, :email)");
$request->bindParam(':login', $login);
$request->bindParam(':email', $email);

$login = $_POST['login'];
$email = $_POST['email'];

$request->execute();

//close the database connection
$pdoAdd = NULL;
$request = NULL;
$row = NULL;
require_once('users.php');
?>