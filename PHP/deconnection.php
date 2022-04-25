<?php
include "header.php";
echo "<h1>Deconnexion</h1>";
session_unset();
echo "Vous avez été deconnecté";
include "footer.php";
?>