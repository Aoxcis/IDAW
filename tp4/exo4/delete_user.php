<?php
require_once('config.php');
$connectionString = "mysql:host=". _MYSQL_HOST;
    if(defined('_MYSQL_PORT')){
        $connectionString .= ";port=". _MYSQL_PORT;
    }
    $connectionString .= ";dbname=". _MYSQL_DBNAME;
    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' );

    $pdoDel = NULL;
    try {
        $pdoDel = new PDO($connectionString,_MYSQL_USER,_MYSQL_PASSWORD,$options);
        $pdoDel->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $erreur) {
        echo 'Erreur : '.$erreur->getMessage();
    }



$request = $pdoDel->prepare("DELETE FROM users WHERE login = :login");
$request->bindParam(':login', $login);

$login = $_POST['login_del'];
$request->execute();

//close the database connection
$pdoAdd = NULL;
$request = NULL;
require_once('users.php');
?>