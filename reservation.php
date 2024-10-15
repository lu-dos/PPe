<?php
// Connexion à la base de données
$host = 'localhost';
$dbname = 'tablepetanque';
$username = 'root';  // Modifier selon tes infos
$password = '';      // Modifier selon tes infos

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête pour récupérer tous les terrains
    $sql = "SELECT * FROM terrain";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    // Récupérer les résultats
    $terrains = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Réservation de Terrain</title>
    <link rel="stylesheet" href="rstyle.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
    <style>
        #map { height: 600px; width: 100%; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 10px; text-align: left; }
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
        /* Style for the map */
        #map {
            height: 600px;
            width: 100%;
        }
    </style>
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
    <!-- Carte -->
    <div id="map"></div>

    <!-- Table des terrains -->
    <table>
        <thead>
            <tr>
                <th>Nom du Terrain</th>
                <th>Ville</th>
                <th>Type</th>
                <th>État</th>
                <th>Note</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($terrains as $terrain): ?>
                <tr>
                    <td><?= htmlspecialchars($terrain['nom_terrain']) ?></td>
                    <td><?= htmlspecialchars($terrain['ville']) ?></td>
                    <td><?= htmlspecialchars($terrain['type_terrain']) ?></td>
                    <td><?= htmlspecialchars($terrain['etat']) ?></td>
                    <td><?= htmlspecialchars($terrain['note']) ?></td>
                    <td>
                        <a href="modifier.php?id=<?= $terrain['id_Terrain'] ?>">Modifier</a> | 
                        <a href="supprimer.php?id=<?= $terrain['id_Terrain'] ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce terrain ?')">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
    <script>
        // Initialiser la carte
        var map = L.map('map').setView([48.6921, 6.1844], 10);

        // Ajouter la couche OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Ajouter des marqueurs pour chaque terrain
        var terrains = <?= json_encode($terrains) ?>;
        terrains.forEach(function(terrain) {
            L.marker([terrain.latitude, terrain.longitude])
                .addTo(map)
                .bindPopup(terrain.nom_terrain);
        });
    </script>
</body>
</html>
