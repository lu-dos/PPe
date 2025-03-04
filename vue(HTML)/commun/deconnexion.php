<?php
session_start();
session_unset();
session_destroy();
$_SESSION['user_id'] = null;
$_SESSION['isClient'] = null;
$_SESSION['isAdmin'] = null;
header("Location: accueil.php"); // Redirige vers la page d'accueil après déconnexion
exit();
?>
