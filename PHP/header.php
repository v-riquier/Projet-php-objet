<?php
session_start();
include "../Classes/Utilisateur.php";
try {
    $MaBase = new PDO('mysql:host=mysql-ogez-riquier.alwaysdata.net;dbname=ogez-riquier_astucesjeux', '257075_test', 'pokemonprovidence');
} catch (Exception $e) {
    echo $e;
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="16x16" href="../Image/icone.png">
    <link rel='stylesheet' href='../CSS/fichier.css'>
    <title>Projet PHP</title>
</head>

<body>
    <?php
    if (isset($_SESSION["NomUser"])) echo "Connecté en tant que " . $_SESSION["NomUser"] . "";
    else echo "Actuellement non connecté";
    ?>