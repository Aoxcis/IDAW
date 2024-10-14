<head>
    <meta charset="utf-8">
    <title>TP2-PHP</title>
    <?php
    $style = $_COOKIE['style'];
    echo '<link rel="stylesheet" href="' . $style . '.css" type="text/css" />';
    ?>
</head>


<?php
    // on simule une base de données
    $users = array(
    // login => password
    'riri' => 'fifi',
    'yoda' => 'maitrejedi' 
    );

    $login = "anonymous";
    $errorText = "";
    $successfullyLogged = false;

    if(isset($_POST['login']) && isset($_POST['password'])) {
        echo "POST";
        echo $_POST['login'];
        echo $_POST['password'];
        $tryLogin=$_POST['login'];
        $tryPwd=$_POST['password'];
        // si login existe et password correspond
        if( array_key_exists($tryLogin,$users) && $users[$tryLogin]==$tryPwd ) {
            $successfullyLogged = true;
            session_start();
            $login = $tryLogin;
            $_SESSION['login'] = $login;
            echo "SESSION";
            echo $_SESSION['login'];
        } else
            $errorText = "Erreur de login/password";
    } else
        $errorText = "Merci d'utiliser le formulaire de login";
    if(!$successfullyLogged) {
        echo $errorText;
    } else {
    echo "<h1>Bienvenu ".$login."</h1>";
    echo "<p>Vous etes connecté</p>";
    echo "<a href='test.php'>Espace sécurisé</a>";

    //decconnection
    echo "<form id='logout_form' action='deconnection.php' method='POST'>
    <input type='submit' value='Déconnecter' />";
    }
?>