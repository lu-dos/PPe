<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contactez le créateur</title>
    <link rel="stylesheet" type="text/css" href="rstyle.css">
</head>
<body>

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
