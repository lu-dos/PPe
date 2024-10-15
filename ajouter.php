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
    <title>Ajouter un Terrain</title>
</head>
<body>
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
</body>
</html>
