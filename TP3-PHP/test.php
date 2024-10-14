<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>TP3-PHP</title>
    <?php
    $style = $_COOKIE['style'];
    echo '<link rel="stylesheet" href="' . $style . '.css" type="text/css" />';
    ?>
</head>

<body>
    <h1>TP3 PHP</h1>
    <p>L'heure actuelle est : <?php echo date('H:i:s'); ?></p>
    <p>
        <?php 
        session_start();
        echo $_SESSION['login']; 
        ?>
    </p>

    <form id='logout_form' action='deconnection.php' method='POST'>
        <input type='submit' value='Déconnecter' />
    </form>
</body>


