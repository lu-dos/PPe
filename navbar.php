<div class="navbar">
    <div class="links">
        <a href="accueil.php">Accueil</a>
        <?php if (isset($_SESSION['IsClient']) && $_SESSION['IsClient'] == chr(1) || isset($_SESSION['IsAdmin']) && $_SESSION['IsAdmin'] == chr(1)): ?>
            <a href="reservation.php">Réserver un Terrain</a>
            <a href="contact.php">Contacter le Créateur</a>
        <?php endif; ?>
    </div>
    <?php if (!isset($_SESSION['IsClient']) && !isset($_SESSION['IsAdmin'])): ?>
        <a href="login.php" class="btn-connexion">Se Connecter</a>
        <a href="inscription.php" class="btn-inscription">S'inscrire</a>
    <?php else: ?>
        <form action="deconnexion.php" method="POST" style="display:inline;">
            <button type="submit" class="logout-button">Se Déconnecter</button>
        </form>
    <?php endif; ?>
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
            align-items: center;

        }
        .navbar .links {
            display: flex;
        }
        .navbar a, .logout-button {
        color: white;
        margin: 0 15px;
        text-decoration: none;
        font-size: 17px;
        }   
        .logout-button {
        background: none;
        border: none;
        cursor: pointer;
        color: white;
        }
/* CSS pour la barre de navigation */
nav {
    background-color: #333; /* Couleur de fond de la barre */
    width: 100%; /* Étendre la barre sur toute la largeur */
    display: flex;
    justify-content: space-around; /* Espacement égal entre les éléments */
    padding: 1em 0; /* Ajout de padding vertical */
}

nav a {
    color: white;
    text-decoration: none;
    padding: 0.5em 1em;
    font-size: 1.1em;
}

nav a:hover {
    background-color: #555; /* Changement de couleur au survol */
    border-radius: 5px;
}


    </style>