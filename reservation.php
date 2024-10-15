<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Reservation</title>
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
    </style>
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

    <script>
      // Initialiser la carte
      var map = L.map('map').setView([48.80, 5.68], 8);

      L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          maxZoom: 19,
      }).addTo(map);

      gymnases.forEach(function(gymnase) {
          var popupContent = `<b>${gymnase.name}</b><br>${gymnase.address}<br>${gymnase.Ville}<br>${gymnase.Zip}`;
          <?php if ($connect->isAdmin()): ?>
              popupContent += `
                  <form method="POST" action="main.php">
                      <input type="hidden" name="action" value="edit_gymnase">
                      <input type="hidden" name="gymid" value="${gymnase.idgym}">
                      <input type="submit" value="Paramètre">
                  </form>
              `;
          <?php endif; ?>

      

          L.marker([gymnase.latitude, gymnase.longitude]).addTo(map)
              .bindPopup(popupContent);
      });
      </script>
    <ul>
        <li><a href="acceuil.html">Retour</a></li>
    </ul>

</body>
</html>