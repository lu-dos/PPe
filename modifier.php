<?php
$host = 'localhost';
$dbname = 'tablepetanque';
$username = 'root'; 
$password = '';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérifier si un ID de terrain a été passé
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Récupérer les données du terrain
        $sql = "SELECT * FROM terrain WHERE Id_Terrain = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $terrain = $stmt->fetch(PDO::FETCH_ASSOC);
        
        // Vérifier si le terrain existe
        if (!$terrain) {
            die("Terrain non trouvé.");
        }

        // Traitement du formulaire si soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = $_POST['nom_terrain'];
            $ville = $_POST['ville'];
            $type = $_POST['type_terrain'];
            $etat = $_POST['etat'];
            $note = $_POST['note'];
            $latitude = $_POST['latitude'];
            $longitude = $_POST['longitude'];

            // Mettre à jour le terrain
            $sql = "UPDATE terrain SET nom_terrain = :nom, ville = :ville, type_terrain = :type, etat = :etat, note = :note, latitude = :latitude, longitude = :longitude WHERE Id_Terrain = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':nom', $nom);
            $stmt->bindParam(':ville', $ville);
            $stmt->bindParam(':type', $type);
            $stmt->bindParam(':etat', $etat);
            $stmt->bindParam(':note', $note);
            $stmt->bindParam(':latitude', $latitude);
            $stmt->bindParam(':longitude', $longitude);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            header("Location: reservation.php"); // Rediriger après modification
            exit();
        }
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
    <title>Modifier Terrain</title>
</head>
<body>


<div class="navbar">
        <div class="links">
            <a href="acceuil.html">Accueil</a>
            <a href="reservation.php">Réserver un Terrain</a>
            <a href="contact.php">Contacter le Créateur</a>
        </div>
        <a href="login.html">Se Connecter</a>
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
            display: inline-block; 
            width: 70%; 
            max-width: 800px; 
            border: 5px solid #333; 
            border-radius: 10px;
            overflow: hidden;
        }
        .video-container iframe {
            width: 100%;
            height: 450px; 
            border: 0;
        }
    </style>


    <h1>Modifier Terrain</h1>
    <form method="POST">
        <label>Nom du Terrain:</label>
        <input type="text" name="nom_terrain" value="<?= htmlspecialchars($terrain['nom_terrain']) ?>" required><br>
        
        <label>Ville:</label>
        <input type="text" name="ville" value="<?= htmlspecialchars($terrain['ville']) ?>" required><br>
        
        <label>Type:</label>
        <input type="text" name="type_terrain" value="<?= htmlspecialchars($terrain['type_terrain']) ?>" required><br>
        
        <label>État:</label>
        <input type="text" name="etat" value="<?= htmlspecialchars($terrain['etat']) ?>" required><br>
        
        <label>Note:</label>
        <input type="number" step="0.1" name="note" value="<?= htmlspecialchars($terrain['note']) ?>" required><br>
        
        <label>Latitude:</label>
        <input type="text" name="latitude" value="<?= htmlspecialchars($terrain['latitude']) ?>" required><br>
        
        <label>Longitude:</label>
        <input type="text" name="longitude" value="<?= htmlspecialchars($terrain['longitude']) ?>" required><br>
        
        <button type="submit">Mettre à jour</button>
    </form>
    <ul>
        <li><a href="reservation.php">Retour</a></li>
    </ul>
</body>
</html>
