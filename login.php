<?php
session_start();
include 'db.php';

$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];



if ($query = $conn->prepare("SELECT id, Role, mot_de_passe FROM clients WHERE email = ?")) {
    $query->bind_param('s', $email);
    $query->execute();
    $query->store_result();
    
    if ($query->num_rows == 1) {
        $query->bind_result($user_id, $role, $stored_hashed_password);
        $query->fetch();
        $hashed_password = md5($password);

        if ($hashed_password === $stored_hashed_password) {
            $_SESSION['user_id'] = $user_id;
            $_SESSION['role'] = $role;
            header("Location: acceuil.html");
            exit();
        } else {
            $error_message = "Mot de passe invalide.";
        }
    } else {
        $error_message = "Mail inconnu.";
    }

    $query->close();
} else {
    $error_message = "Erreur lors de la préparation de la requête: " . $conn->error;
}
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="rstyle.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }
        .navbar {
            background-color: #333;
            padding: 10px;
            display: flex;
            justify-content: space-between; /* Space between left and right content */
            align-items: center;
        }
        .navbar .links {
            display: flex;
        }
        .navbar a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
        }
    </style>
</head>
<body>  
<div class="navbar">
        <div class="links">
            <a href="acceuil.html">Accueil</a>
            <a href="#">Réserver un Terrain</a>
            <a href="contact.php">Contacter le Créateur</a>
        </div>
        <a href="login.php">Se Connecter</a>
    </div>

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