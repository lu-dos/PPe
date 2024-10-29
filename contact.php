<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactez le créateur</title>
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
<div class="navbar">
        <div class="links">
            <a href="accueil.html">Accueil</a>
            <a href="reservation.php">Réserver un Terrain</a>
            <a href="contact.php">Contacter le Créateur</a>
        </div>
        <a href="login.html">Se Connecter</a>
        <a href="inscription.html" class="btn-inscription">S'inscrire</a>
    </div>

    <h2>Contactez-nous</h2>
    <form action="mailto:ludorouge7@gmail.com" method="post" enctype="text/plain">
        <label for="email">Email *</label>
        <input type="email" id="email" name="email" required placeholder="Votre email">
        <br><br>

        <label for="subject">Objet *</label>
        <input type="text" id="subject" name="subject" required placeholder="Objet de votre message">
        <br><br>

        <label for="message">Message *</label>
        <textarea id="message" name="message" rows="5" required placeholder="Votre message"></textarea>
        <br><br>

        <button type="submit">Envoyer</button>
    </form>
    <ul>
        <li><a href="accueil.html">Retour</a></li>
    </ul>

</body>
</html>