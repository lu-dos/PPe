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
        .video-container {
            position: relative;
            width: 100%;
            height: calc(100vh - 50px); /* Adjust height if needed */
            overflow: hidden;
        }
        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0;
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
        <li><a href="acceuil.html">Retour</a></li>
    </ul>

</body>
</html>
