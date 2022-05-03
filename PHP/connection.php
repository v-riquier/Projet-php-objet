<?php
include "header.php";
echo "<h1>Connexion</h1>";
if (isset($_POST["btnConnection"])) {
    $Req = $BDD->query("SELECT * FROM User WHERE NomUser = '" . $_POST["txtUser"] . "' AND Pass = '" . $_POST["pwdUser"] . "'");
    $test = $Req->fetch();
    if (isset($test["IdUser"])) {
        $util = new User($test["IdUser"], $test["NomUser"]);
        echo "Connecté en tant que " . $_SESSION["NomUser"];
    } else echo "Utilisateur inconnu";
} else {
?>
    <form action="" method="post">
        <table>
            <tr>
                <td><label for="txtUser">Login : </label></td>
                <td><input type="text" name="txtUser" id="txtUser" required></td>
            </tr>
            <tr>
                <td><label for="pwdUser">Mot de passe : </label></td>
                <td><input type="password" name="pwdUser" id="pwdUser" required></td>
            </tr>
            <tr>
                <td class="nocolor"></td>
                <td><input type="submit" name="btnConnection" value="Connection"></td>
            </tr>
        </table>
    </form>
<?php
}
include "footer.php";
?>