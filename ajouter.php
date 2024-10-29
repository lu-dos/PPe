<?php
$host = 'localhost';
$dbname = 'tablepetanque';
$username = 'root'; 
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Traitement du formulaire si soumis
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nom = $_POST['nom_terrain'];
        $ville = $_POST['ville'];
        $type = $_POST['type_terrain'];
        $etat = $_POST['etat'];
        $note = $_POST['note'];
        $latitude = $_POST['latitude'];
        $longitude = $_POST['longitude'];

        // Insérer le nouveau terrain
        $sql = "INSERT INTO terrain (nom_terrain, ville, type_terrain, etat, note, latitude, longitude) VALUES (:nom, :ville, :type, :etat, :note, :latitude, :longitude)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':ville', $ville);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':etat', $etat);
        $stmt->bindParam(':note', $note);
        $stmt->bindParam(':latitude', $latitude);
        $stmt->bindParam(':longitude', $longitude);
        $stmt->execute();

        header("Location: reservation.php"); // Rediriger après ajout
        exit();
    }
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="rstyle.css">
    <title>Ajouter un Terrain</title>
</head>
<body>

<div class="navbar">
        <div class="links">
            <a href="acceuil.html">Accueil</a>
            <a href="reservation.php">Réserver un Terrain</a>
            <a href="contact.php">Contacter le Créateur</a>
        </div>
        <a href="login.html">Se Connecter</a>
        <a href="inscription.html" class="btn-inscription">S'inscrire</a>
    </div>

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
            width: 100%;
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
        .video-section {
            text-align: center;
            margin-top: 20px;
        }
        .video-section h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 10px;
        }
        .video-container {
            display: inline-block; /* Align the container inline */
            width: 70%; /* Set a width for the video */
            max-width: 800px; /* Limit the maximum width */
            border: 5px solid #333; /* Add border */
            border-radius: 10px; /* Rounded corners */
            overflow: hidden;
        }
        .video-container iframe {
            width: 100%;
            height: 450px; /* Set height of the video */
            border: 0;
        }
    </style>

    <h1>Ajouter un Terrain</h1>
    <form method="POST">
        <label>Nom du Terrain:</label>
        <input type="text" name="nom_terrain" required><br>
        
        <label>Ville:</label>
        <input type="text" name="ville" required><br>
        
        <label>Type:</label>
        <input type="text" name="type_terrain" required><br>
        
        <label>État:</label>
        <input type="text" name="etat" required><br>
        
        <label>Note:</label>
        <input type="number" step="0.1" name="note" required><br>
        
        <label>Latitude:</label>
        <input type="text" name="latitude" required><br>
        
        <label>Longitude:</label>
        <input type="text" name="longitude" required><br>
        
        <button type="submit">Ajouter Terrain</button>
    </form>

    <ul>
        <li><a href="reservation.php">Retour</a></li>
    </ul>
</body>
</html>
