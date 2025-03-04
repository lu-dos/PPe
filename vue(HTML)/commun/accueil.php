<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil</title>
    
</head>
<body>
    <?php 
    require_once($_SERVER['DOCUMENT_ROOT'] . '/E5_petanque/include(redondance)/navbar.php');
    ?>
    <style>
    
        .video-section {
            text-align: center;
            margin-top: 20px;
        }
        .video-section h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 10px;
        }
        .video-container {
            display: inline-block;           
            width: 70%; 
            max-width: 800px; 
            border: 5px solid #333; /* bordures */
            border-radius: 10px; /* arrondir les angles */
            overflow: hidden;
        }
        .video-container iframe {
            width: 100%;
            height: 450px; /*Arranger la taille de la vidéo*/
            border: 0;
        }
    </style>

    <div class="video-section">
        <h2>Les Meilleures Actions de Pétanque</h2>
        <div class="video-container">
            <iframe src="https://www.youtube.com/embed/NvF9ocMgX30?si=Shnh1en3SX9zJNBx" 
                    title="YouTube video player" 
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share">
            </iframe>
        </div>
    </div>


</body>
</html>