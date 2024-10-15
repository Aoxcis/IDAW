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

    //close the database connection
    $pdo = NULL;
    $request = NULL;
    $row = NULL;
?>
    <h2>Add a user</h2>
    <form action='add_user.php' method='POST'>
        <input name='login' placeholder='login'>
        <input name='email' placeholder='email'>
        <input type='submit' value='add'>
    </form>

    <h2>Delete a user</h2>
    <form action='delete_user.php' method='POST'>
        <input name='login_del' placeholder='login'>
        <input type='submit' value='delete'>
    </form>

    <h2>Update a user</h2>
    <form action='update_user.php' method='POST'>
        <input name='previous_login' placeholder='previous login'>
        <input name='new_login' placeholder='new login'>
        <input name='new_email' placeholder='new email'>
        <input type='submit' value='update'>
    </form>