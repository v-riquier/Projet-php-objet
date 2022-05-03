<?php
include "header.php";
echo "<h1>Inscription</h1>";
if (isset($_POST["btnAjout"])) {
    $Req = $BDD->query("INSERT INTO User(NomUser,Pass) VALUES ('" . $_POST["txtUser"] . "','" . $_POST["pwdUser"] . "')");
    $Req = $BDD->query("SELECT * FROM User WHERE NomUser = '" . $_POST["txtUser"] . "' AND Pass = '" . $_POST["pwdUser"] . "'");
    $test = $Req->fetch();
    $util = new User($test["IdUser"], $test["NomUser"]);
    echo "Bienvenue " . $_SESSION["NomUser"];
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
                <td><input type="submit" name="btnAjout" value="Créer un utilisateur"></td>
            </tr>
        </table>
    </form>
<?php
}
include "footer.php";
?>