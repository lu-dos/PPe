<?php
session_start();
session_unset();
session_destroy();
header("Location: accueil.php"); // Redirige vers la page d'accueil après déconnexion
exit();
?>
