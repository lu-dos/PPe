<div class="navbar">
    <div class="links">
        <a href="accueil.php">Accueil</a>
        <?php if (isset($_SESSION['isClient']) && $_SESSION['isClient'] == "1" || isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == "1"): ?>
            <a href="reservation.php">Réserver un Terrain</a>
            <a href="contact.php">Contacter le Créateur</a>
        <?php endif; ?>
    </div>
    <?php if (!isset($_SESSION['isClient']) && !isset($_SESSION['isAdmin']) == "0"): ?>
        <a href="login.php" class="btn-connexion">Se Connecter</a>
        <a href="inscription.php" class="btn-inscription">S'inscrire</a>
    <?php else: ?>
        <form action="deconnexion.php" method="POST" style="display:inline;">
            <button type="submit" class="logout-button">Se Déconnecter</button>
        </form>
    <?php endif; ?>
</div>


<style>
    body, html {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
    }
    .navbar {
        background-color: #333;
        padding: 10px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        box-sizing: border-box;
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
    .navbar .links a:hover, .logout-button:hover {
        background-color: #555;
        border-radius: 5px;
    }
</style>
