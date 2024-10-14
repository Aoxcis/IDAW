<!doctype html>
<html lang="fr">

<?php
session_start();
if(isset($_SESSION['login'])) {
    header('Location: test.php');
}



if (isset($_GET['css'])) {
    setcookie('style', $_GET['css']);
    $style = $_GET['css'];
} else if (isset($_COOKIE['style'])) {
    $style = $_COOKIE['style'];
} else {
    $style = 'style1';
    setcookie('style', $style);
}
?>

<head>
    <meta charset="utf-8">
    <title>TP2-PHP</title>
    <?php
    echo '<link rel="stylesheet" href="' . $style . '.css" type="text/css" />';
    ?>
</head>

<body>
    <h1>TP3 PHP</h1>
    <p>L'heure actuelle est : <?php echo date('H:i:s'); ?></p>

    <?php require_once 'login.php'; ?>
</body>

<form id="style_form" action="index.php" method="GET">
    <select name="css">
        <option value="style1">style1</option>
        <option value="style2">style2</option>
    </select>
    <input type="submit" value="Appliquer" />
</form>


