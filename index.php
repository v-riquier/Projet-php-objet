<?php
session_start();
try {
    $MaBase = new PDO('mysql:host=localhost;dbname=yes', 'root', 'root');
} catch (Exception $e) {
    header("Location: https://www.youtube.com/watch?v=dQw4w9WgXcQ");
    exit();
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="16x16" href="Image/icone.png">
    <link rel='stylesheet' href='CSS/fichier.css'>
    <title>Exercice BDD</title>
</head>

<body class="blur" background="Image/1204408.jpg">
<div class="compte">
        <?php
        if(!isset($_SESSION["NomUser"])){
            ?>
            <li><a href="PHP/connection.php">Connexion</a></li>
            <li><a href="PHP/inscription.php">Inscription</a></li>
            <?php
        }
        else{
            ?>
            <li><a href="PHP/deconnection.php">Deconnexion</a></li>
            <?php
        }
        ?>
    </div>
    <h1 class="centre"><u>Bienvenue Sur Astuce-Jeux !</u></h1>
    <nav>
        <div class="border">
            <li>
                <a href="PHP/ajoutastuce.php">Ajouter Astuce</a>
            </li>

            <li>
                <a href="PHP/ajoutjeu.php">Ajouter Jeux</a>
            </li>

            <li>
                <a href="PHP/affichage.php">Voir Astuce</a>
            </li>

            <li>
                <a href="PHP/suppression.php">Suppression</a>
            </li>

            <li>
                <a href="PHP/modif.php">Modif</a>
            </li>
        </div>
    </nav>
</body>

</html>