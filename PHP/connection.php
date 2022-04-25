<?php
include "header.php";
echo "<h1>Connexion</h1>";
if (isset($_POST["btnConnection"])) {
    $Req = $MaBase->query("SELECT * FROM User WHERE NomUser = '" . $_POST["txtUser"] . "' AND Pass = '" . $_POST["pwdUser"] . "'");
    $test = $Req->fetch();
    if (isset($test["IdUser"])) {
        $_SESSION["NoUser"] = $test["IdUser"];
        $util = new User($test["IdUser"], $test["NomUser"]);
        echo "Connecté en tant que " . $_SESSION["NomUser"];
    } else echo "Utilisateur inconnu";
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
include "footer.php";
?>