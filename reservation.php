<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Réservation de Terrain</title>
    <link rel="stylesheet" type="text/css" href="rstyle.css">
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
            justify-content: space-between; /* Space between left and right content */
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
        /* Style for the map */
        #map {
            height: 600px;
            width: 100%;
        }
    </style>
    <!-- Leaflet.js CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" />
</head>
<body>  
    <div class="navbar">
        <div class="links">
            <a href="acceuil.html">Accueil</a>
            <a href="#">Réserver un Terrain</a>
            <a href="contact.php">Contacter le Créateur</a>
        </div>
        <a href="login.php">Se Connecter</a>
    </div>

    <!-- Map container -->
    <div id="map"></div>

    <!-- Leaflet.js JavaScript -->
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"></script>
    <script>
        // Initialiser la carte et définir la vue centrée sur une position en Lorraine
        var map = L.map('map').setView([48.6921, 6.1844], 10); // Coordonnées pour la région Lorraine

        // Ajouter une couche de tuiles à partir d'OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Ajouter des marqueurs pour les terrains de pétanque en Lorraine
        var terrains = [
            {lat: 48.6921, lng: 6.1844, name: "Terrain 1 - Nancy"},
            {lat: 49.1193, lng: 6.1757, name: "Terrain 2 - Metz"},
            {lat: 48.6741, lng: 6.1561, name: "Terrain 3 - Lunéville"},
            {lat: 48.8439, lng: 5.9581, name: "Terrain 4 - Pont-à-Mousson"},
            {lat: 48.6546, lng: 6.1667, name: "Terrain 5 - Toul"}
        ];

        terrains.forEach(function(terrain) {
            L.marker([terrain.lat, terrain.lng]).addTo(map)
                .bindPopup(terrain.name);
        });
    </script>

<ul>
        <li><a href="acceuil.html">Retour</a></li>
    </ul>
</body>
</html>