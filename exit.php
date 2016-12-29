<?php
header('location: index.php');
SetCookie("login", $login, time() - 3600);
?>