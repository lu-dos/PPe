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

        // Supprimer le terrain
        $sql = "DELETE FROM terrain WHERE Id_Terrain = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        header("Location: reservation.php"); // Rediriger après suppression
        exit();
    }
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
