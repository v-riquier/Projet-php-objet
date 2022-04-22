<?php
session_start();
include "../Classes/Utilisateur.php";
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" sizes="16x16" href="../Image/icone.png">
    <link rel='stylesheet' href='../CSS/fichier.css'>
    <title>Exercice BDD</title>
</head>

<body>
    <h1>Deconnexion</h1>
    <?php
    session_unset();
    echo "Vous avez été deconnecté";
    ?>
    <p><a href="../index.php">Retour</a></p>
</body>

</html>