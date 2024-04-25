<?php
require_once('function.php');
$articles = getArticles();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palestine Aujoud'hui</title>
</head>
<body>
    <h1>IN PALESTINE</h1>
    <p><b>Bienvenue .. ici vous trouverez tous les actualités de la guerre en palestine</b></p>
    <nav>
            <ul>
                <li><a href="#">NUMÉRO DU MOIS</a></li>
                <li><a href="#">ARCHIVES</a></li>
                <li><a href="#">AUDIO</a></li>
                <li><a href="#">À PROPOS</a></li>
            </ul>
        </nav>
    <?php foreach($articles as $article): ?>
        <h2> <?= $article->titre ?></h2>
        <time><?= $article -> date ?></time>
        <br><br>
        <a href="article.php?id=<?= $article->id ?>" value="b_link">Lire la suite</a>
        <?php endforeach; ?>
</body>
</html>

<?php

define('URL', str_replace("index.php","",(isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));
require_once('controllers/Router.php');

$router = new Router();
$router->routeReq();
?>