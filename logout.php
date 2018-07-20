<?php
session_start();
$_SESSION["current_user"] = "";
header('Location: index.php');
?>
