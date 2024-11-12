<!DOCTYPE html>
<meta charset="UTF-8">

<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="rstyle.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            align-items: center;
            width: 100%; /* Assurer que la barre de navigation prend toute la largeur */
            box-sizing: border-box; /* Inclure le padding dans la largeur totale */
        }
        .navbar .links {
            display: flex;
            justify-content: center; /* Centrer les liens dans la navbar */
        }
        .navbar a {
            color: white;
            margin: 0 15px;
            text-decoration: none;
        }
        #map {
            height: 600px;
            width: 100%;
        }
    </style>

</head>
<body>
<?php include 'navbar.php'; ?>
    <h1></h1>
    <form method="POST" action="login.php">
        Email: <input type="email" name="email" required><br>
        Password: <input type="password" name="password" required><br>
        <input type="submit" value="Login">
    </form>
    <ul>
        <li><a href="inscription.html">S'inscrire</a></li>
    </ul>
    <ul>
        <li><a href="accueil.html">Retour</a></li>
    </ul>
</body>
</html>



<?php
session_start();
include 'db.php';

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
                header("Location: acceuil1.html");
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

