<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>TP2-PHP</title>
</head>

<body>
    <h1>TP2 PHP</h1>
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


