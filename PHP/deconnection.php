<?php
include "header.php";
echo "<h1>Deconnexion</h1>";
session_unset();
header("Location: ../index.php");
include "footer.php";
?>