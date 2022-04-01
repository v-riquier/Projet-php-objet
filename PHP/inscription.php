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
    if (isset($_POST["btnAjout"])){
        $Req = $MaBase->query("INSERT INTO User(NomUser,Pass,IdAdmin) VALUES ('" . $_POST["txtUser"] . "','" . $_POST["pwdUser"] . "','0')");
        $Req = $MaBase->query("SELECT * FROM User WHERE NomUser = '" . $_POST["txtUser"] . "' AND Pass = '" . $_POST["pwdUser"] . "'");
        $test = $Req->fetch();
        $util=new User($test["IdUser"],$test["NomUser"]);
        echo "Bienvenue " . $_SESSION["NomUser"];
    } else {
    ?>
        <div>
            <form action="" method="post">
                Login : <input type="text" name="txtUser" id="txtUser" required>
                Mot de passe : <input type="text" name="pwdUser" id="pwdUser" required>
                <input type="submit" name="btnAjout" value="Créer un utilisateur">
            </form>
        </div>
    <?php
    }
    ?>
    <p><a href="../index.php">Retour</a></p>
</body>

</html>