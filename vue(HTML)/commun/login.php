<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="/E5_petanque/css/rstyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/E5_petanque/include(redondance)/navbar.php'); ?>
<h1>Connexion</h1>
<form method="POST" action="login.php">
    Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>
    <input type="submit" value="Login">
</form>
<ul>
    <li><a href="inscription.php">S'inscrire</a></li>
    <li><a href="accueil.php">Retour</a></li>
</ul>

<?php if (!empty($error_message)): ?>
    <p style="color: red;"><?php echo $error_message; ?></p>
<?php endif; ?>
</body>
</html>

<?php
session_start();
//include 'db.php';
include($_SERVER['DOCUMENT_ROOT'] . '/E5_petanque/modele(SQL)/admin/db.php');

$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Préparer la requête avec les bons champs et vérification des colonnes
    if ($query = $conn->prepare("SELECT Id_utilisateur, isClient, isAdmin, mot_de_passe FROM utilisateur WHERE mail = ?")) {
        $query->bind_param('s', $email);
        $query->execute();
        $query->store_result();
        
        if ($query->num_rows == 1) {
            // Récupérer les données nécessaires
            $query->bind_result($user_id, $isClient, $isAdmin, $hashed_password);
            $query->fetch();

            // Vérifier le mot de passe
            if (password_verify($password, $hashed_password)) {
                // Stocker les informations de l'utilisateur dans la session
                $_SESSION['user_id'] = $user_id;
                $_SESSION['isClient'] = $isClient;
                $_SESSION['isAdmin'] = $isAdmin;
                header("Location: accueil.php");
                exit();
            } else {
                $error_message = "Mot de passe invalide.";
            }
        }
        else {
            $error_message = "Mail inconnu.";
        }

        $query->close();
    } else {
        $error_message = "Erreur lors de la préparation de la requête: " . $conn->error;
    }
}
?>
