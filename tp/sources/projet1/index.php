<?php
// Fonction pour afficher les informations de la vidéo YouTube
function getYouTubeInfo() {
    // Les détails de la vidéo
    $videoUrl = 'https://www.youtube.com/watch?v=x7qLYzFIy_E';
    $title = "Vidéo YouTube Intéressante";
    $description = "C'est une description de la vidéo YouTube sans utiliser d'API.";
    $thumbnail = "https://img.youtube.com/vi/x7qLYzFIy_E/hqdefault.jpg";  // Image de la miniature de la vidéo YouTube
    
    return [
        'url' => $videoUrl,
        'title' => $title,
        'description' => $description,
        'thumbnail' => $thumbnail
    ];
}

// Fonction pour ajouter une clé dans Redis et afficher les clés
function handleRedis() {
    // Connexion à Redis
    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);

    // Ajouter une clé aléatoire
    $key = 'exampleKey_' . rand(1, 1000);
    $redis->set($key, 'Some random value');
    
    // Récupérer toutes les clés de Redis
    $keys = $redis->keys('*');
    
    return [
        'key' => $key,
        'keys' => $keys
    ];
}

// Fonction pour récupérer le contenu de l'URL donnée
function getUrlContent($url) {
    return file_get_contents($url);
}

// Choix aléatoire de l'action à effectuer
$action = rand(1, 3);

// Variables à afficher
$youTubeData = null;
$redisData = null;
$urlContent = null;

// Exécution de l'action aléatoire
switch ($action) {
    case 1:
        // Option 1 : Afficher la vidéo YouTube
        $youTubeData = getYouTubeInfo();
        break;
    case 2:
        // Option 2 : Gérer Redis
        $redisData = handleRedis();
        break;
    case 3:
        // Option 3 : Afficher le contenu de l'URL
        $urlContent = getUrlContent("http://10.1.1.23:8080");
        break;
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application PHP Aléatoire</title>
</head>
<body>

<h1>Application PHP Aléatoire</h1>

<?php if ($action == 1 && $youTubeData): ?>
    <!-- Affichage de la vidéo YouTube -->
    <h2>Vidéo YouTube :</h2>
    <a href="<?= $youTubeData['url'] ?>" target="_blank">
        <img src="<?= $youTubeData['thumbnail'] ?>" alt="<?= $youTubeData['title'] ?>" />
        <p><?= $youTubeData['title'] ?></p>
    </a>
    <p><?= $youTubeData['description'] ?></p>
<?php elseif ($action == 2 && $redisData): ?>
    <!-- Affichage de Redis -->
    <h2>Redis</h2>
    <p>Clé ajoutée : <?= $redisData['key'] ?></p>
    <h3>Clés disponibles dans Redis :</h3>
    <ul>
        <?php foreach ($redisData['keys'] as $key): ?>
            <li><?= $key ?></li>
        <?php endforeach; ?>
    </ul>
<?php elseif ($action == 3 && $urlContent): ?>
    <!-- Affichage du contenu de l'URL -->
    <h2>Contenu de http://10.1.1.23:8080 :</h2>
    <pre><?= htmlspecialchars($urlContent) ?></pre>
<?php endif; ?>

</body>
</html>
