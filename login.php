<?php
// Définir une valeur par défaut pour $error_message
$error_message = '';

// Vérifiez si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérez les valeurs du formulaire
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Ajoutez votre logique de validation ou d'authentification ici
    // Exemple de condition pour afficher un message d'erreur
    if (empty($email) || empty($password)) {
        $error_message = 'Tous les champs sont requis.';
    } else {
        // Effectuez l'authentification ici
        // Par exemple : vérifiez les informations dans une base de données
        // Si l'authentification échoue, définissez un message d'erreur approprié
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
</body>
</html>
