<?php
    require_once('config.php');

    $connectionString = "mysql:host=". _MYSQL_HOST;
    if(defined('_MYSQL_PORT')){
        $connectionString .= ";port=". _MYSQL_PORT;
    }
    $connectionString .= ";dbname=". _MYSQL_DBNAME;
    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' );

    $pdo = NULL;
    try {
        $pdo = new PDO($connectionString,_MYSQL_USER,_MYSQL_PASSWORD,$options);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $erreur) {
        echo 'Erreur : '.$erreur->getMessage();
    }
    $request = $pdo->prepare("select * from users");
    $request->execute();
    // TODO: add your code here
    // retrieve data from database using fetch(PDO::FETCH_OBJ) and
    // display them in HTML arrayd
    /*** close the database connection ***/

    $row = $request->fetch(PDO::FETCH_OBJ);
    echo "<table>";
        echo "<tr>";
            echo "<th>id</th>";
            echo "<th>login</th>";
            echo "<th>email</th>";
        echo "</tr>";
    while(!empty($row)){
        echo "<tr>";
            echo "<td>".$row->id."</td>";
            echo "<td>".$row->login."</td>";
            echo "<td>".$row->email."</td>";
        echo "</tr>";
        $row = $request->fetch(PDO::FETCH_OBJ);
    }
    echo "</table>";
    