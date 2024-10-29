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

    // Vérification si l'email existe déjà
    $checkEmailQuery = "SELECT * FROM utilisateur WHERE mail = :email";
    $checkStmt = $conn->prepare($checkEmailQuery);
    $checkStmt->bindParam(':email', $email);
    $checkStmt->execute();

    if ($checkStmt->rowCount() > 0) {
        // Si le compte existe déjà
        echo "<p>Le compte avec cet email existe déjà.</p>";
        echo '<a href="inscription.html"><button>Retour à l\'inscription</button></a>';
    } else {
        // Insertion dans la base de données
        $sql = "INSERT INTO utilisateur (nom, prenom, mail, mot_de_passe, ville, grade) VALUES (:nom, :prenom, :email, :mot_de_passe, :ville, 'client')";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':mot_de_passe', $mot_de_passe);
        $stmt->bindParam(':ville', $ville);

        $stmt->execute();

        echo "<p>Inscription réussie !</p>";
        echo '<a href="accuueil.html"><button>Retour à l\'accueil</button></a>';
    }
} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
    echo '<a href="inscription.html"><button>Retour à l\'inscription</button></a>';
}

$conn = null;
?>