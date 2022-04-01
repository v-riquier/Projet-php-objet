<?php
session_start();
include "../Classes/Utilisateur.php";
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
    <link rel="icon" type="image/png" sizes="16x16" href="../Image/icone.png">
    <link rel='stylesheet' href='../CSS/fichier.css'>
    <title>Exercice BDD</title>
</head>

<body class="blur" background="../Image/1204408.jpg">
    <h1>Connexion</h1>
    <?php
    if (isset($_POST["btnConnection"])) {
        $Req = $MaBase->query("SELECT * FROM User WHERE NomUser = '" . $_POST["txtUser"] . "' AND Pass = '" . $_POST["pwdUser"] . "'");
        $test = $Req->fetch();
        if (isset($test["IdUser"])) {
            $util=new User($test["IdUser"],$test["NomUser"]);
            echo "Connecté en tant que " . $_SESSION["NomUser"];
        } else {
            echo "Utilisateur inconnu";
        }

    } else {
    ?>
        <div class="formulaire">
            <form action="" method="post">
                Login : <input type="text" name="txtUser" id="txtUser" required>
                Mot de passe : <input type="password" name="pwdUser" id="pwdUser" required>
                <input type="submit" name="btnConnection" value="Connection">
            </form>
        </div>
    <?php
    }
    ?>
    <p><a href="../index.php">Retour</a></p>
</body>

</html>