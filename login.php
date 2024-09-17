<?php
session_start();
include 'db.php';

$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $error_message = 'Tous les champs sont requis.';
    } else {
        $error_message = 'Identifiants invalides.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="rstyle.css">
    
</head>
<body>  
    <?php if ($error_message): ?>
        <div class="alert alert-danger">
            <?php echo htmlspecialchars($error_message, ENT_QUOTES, 'UTF-8'); ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="login.php">
        <div>
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email" required>
        </div>
        <div>
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" name="password" class="form-control" id="password" required>
        </div>
        <input type="submit" value="Login">
    </form>
    <ul>
        <li><a href="acceuil.html">Retour</a></li>
    </ul>
</body>
</html>
