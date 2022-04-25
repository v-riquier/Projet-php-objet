<?php
include "header.php";
echo "<h1>Inscription</h1>";
if (isset($_POST["btnAjout"])) {
    $Req = $MaBase->query("INSERT INTO User(NomUser,Pass,IdAdmin) VALUES ('" . $_POST["txtUser"] . "','" . $_POST["pwdUser"] . "','0')");
    $Req = $MaBase->query("SELECT * FROM User WHERE NomUser = '" . $_POST["txtUser"] . "' AND Pass = '" . $_POST["pwdUser"] . "'");
    $test = $Req->fetch();
    $_SESSION["NoUser"] = $test["IdUser"];
    $util = new User($test["IdUser"], $test["NomUser"]);
    echo "Bienvenue " . $_SESSION["NomUser"];
} else {
?>
    <div>
        <form action="" method="post">
            Login : <input type="text" name="txtUser" id="txtUser" required>
            Mot de passe : <input type="password" name="pwdUser" id="pwdUser" required>
            <input type="submit" name="btnAjout" value="Créer un utilisateur">
        </form>
    </div>
<?php
}
include "footer.php";
?>