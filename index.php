<?php
session_start();
include "Classes/Utilisateur.php";
try {
    $BDD = new PDO('mysql:host=mysql-ogez-riquier.alwaysdata.net;dbname=ogez-riquier_astucesjeux', '257075_test', 'pokemonprovidence');
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
    <link rel="icon" type="image/png" sizes="16x16" href="Image/icone.png">
    <link rel='stylesheet' href='CSS/fichier.css'>
    <title>Projet PHP</title>
</head>

<body class="index">
    <div>
        <nav class="border">
            <ul>
                <li><a href="PHP/affichage.php">Voir Astuce</a></li>
                <li><a href="PHP/ajoutastuce.php">Ajouter Astuce</a></li>
                <li><a href="PHP/ajoutcomm.php">Ajouter Commentaire</a></li>
                <li><a href="PHP/ajoutjeu.php">Ajouter Jeu</a></li>
                <li><a href="PHP/modifastuce.php">Modifier Astuce</a></li>
                <li><a href="PHP/modifcomm.php">Modifier Commentaire</a></li>
                <li><a href="PHP/delastuce.php">Supprimer Astuce</a></li>
                <li><a href="PHP/delcomm.php">Supprimer Commentaire</a></li>
            </ul>
        </nav>
    </div>
    <div>
        <nav class="compte">
            <ul>
                <?php
                if (!isset($_SESSION["NomUser"])) {
                    echo "<li>Actuellement non connecté</li>";
                    echo '<li><a href="PHP/connection.php">Connexion</a></li>';
                    echo '<li><a href="PHP/inscription.php">Inscription</a></li>';
                } else {
                    echo "<li>Connecté en tant que " . $_SESSION["NomUser"] . "</li>";
                    echo '<li><a href="PHP/deconnection.php">Deconnexion</a></li>';
                }
                ?>
            </ul>
        </nav>
    </div>
    <h1 class="centre"><u>Bienvenue Sur Astuce-Jeux !</u></h1>
</body>

</html>