<?php
include "header.php";
echo "<h1>Inscription</h1>";
if (isset($_POST["btnAjout"])) {
    $Req = $MaBase->query("INSERT INTO User(NomUser,Pass) VALUES ('" . $_POST["txtUser"] . "','" . $_POST["pwdUser"] . "')");
    $Req = $MaBase->query("SELECT * FROM User WHERE NomUser = '" . $_POST["txtUser"] . "' AND Pass = '" . $_POST["pwdUser"] . "'");
    $test = $Req->fetch();
    $_SESSION["NoUser"] = $test["IdUser"];
    $util = new User($test["IdUser"], $test["NomUser"]);
    echo "Bienvenue " . $_SESSION["NomUser"];
} else {
?>
    <form action="" method="post">
        Login : <input type="text" name="txtUser" id="txtUser" required>
        Mot de passe : <input type="password" name="pwdUser" id="pwdUser" required>
        <input type="submit" name="btnAjout" value="Créer un utilisateur">
    </form>
<?php
}
include "footer.php";
?>