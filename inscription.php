<?php
// Connexion à la base de données
$host = "localhost"; // Adresse du serveur
$dbname = "tablepetanque"; // Nom de la base de données
$username = "root"; // Nom d'utilisateur
$password = ""; // Mot de passe

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupération des données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $mot_de_passe = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT); // Hash du mot de passe
    $ville = $_POST['ville'];

    // Insertion dans la base de données
    $sql = "INSERT INTO utilisateur (nom, prenom, mail, mot_de_passe, ville, grade) VALUES (:nom, :prenom, :email, :mot_de_passe, :ville, 'client')";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':mot_de_passe', $mot_de_passe);
    $stmt->bindParam(':ville', $ville);

    $stmt->execute();

    echo "Inscription réussie !";
} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

$conn = null;
?>
