<?php
session_start();
$host = "localhost"; 
$dbname = "tablepetanque"; 
$username = "root"; 
$password = "";
$error_message = '';
$success_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Récupération des données du formulaire
        $nom = $_POST['nom'] ?? null;
        $prenom = $_POST['prenom'] ?? null;
        $email = $_POST['email'] ?? null;
        $mot_de_passe = $_POST['mot_de_passe'] ?? null;
        $ville = $_POST['ville'] ?? null;

        if ($nom && $prenom && $email && $mot_de_passe && $ville) {
            $hashed_password = password_hash($mot_de_passe, PASSWORD_DEFAULT); // Hash du mot de passe
            $isClient = "1"; // Pour BINARY(1), utilisation de 1 comme valeur

            // Vérification si l'email existe déjà
            $checkEmailQuery = "SELECT * FROM utilisateur WHERE mail = :email";
            $checkStmt = $conn->prepare($checkEmailQuery);
            $checkStmt->bindParam(':email', $email);
            $checkStmt->execute();

            if ($checkStmt->rowCount() > 0) {
                $error_message = "Le compte avec cet email existe déjà.";
            } else {
                // Insertion dans la base de données
                $sql = "INSERT INTO utilisateur (nom, prenom, mail, mot_de_passe, ville, isClient) 
                        VALUES (:nom, :prenom, :email, :mot_de_passe, :ville, :isClient)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':nom', $nom);
                $stmt->bindParam(':prenom', $prenom);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':mot_de_passe', $hashed_password);
                $stmt->bindParam(':ville', $ville);
                $stmt->bindParam(':isClient', $isClient, PDO::PARAM_STR);

                $stmt->execute();
                $success_message = "Inscription réussie !";
            }
        } else {
            $error_message = "Tous les champs sont requis.";
        }
    } catch(PDOException $e) {
        $error_message = "Erreur : " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="rstyle.css">
    <title>Inscription</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>

    <?php include 'navbar.php'; ?>

    <h2>Inscription</h2>
    
    <?php if ($error_message): ?>
        <p style="color: red;"><?php echo $error_message; ?></p>
    <?php endif; ?>
    <?php if ($success_message): ?>
        <p style="color: green;"><?php echo $success_message; ?></p>
    <?php endif; ?>

    <form action="inscription.php" method="post">
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom" required><br>

        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom" required><br>

        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required><br>

        <label for="mot_de_passe">Mot de passe :</label>
        <input type="password" id="mot_de_passe" name="mot_de_passe" required><br>

        <label for="ville">Ville :</label>
        <input type="text" id="ville" name="ville" required><br>

        <button type="submit">S'inscrire</button>
    </form>
    
    <ul>
        <li><a href="accueil.php">Retour</a></li>
    </ul>
</body>
</html>