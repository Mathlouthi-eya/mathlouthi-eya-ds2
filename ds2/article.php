<?php
if (!isset($_GET['id']) OR !is_numeric($_GET['id']))
header('location: index.php');
else 
{
    extract($_GET);
    $id = strip_tags($id);
    require_once('config/function.php');

    if(!empty($_POST))
    {
        extract($_POST);
        $errors = array();

        $auteur = strip_tags($auteur);
        $commentaire = strip_tags($commentaire);

        if (empty($auteur))
        array_push($errors,'Entrez un pseudo');

        if (empty($commentaire))
        array_push($errors,'Entrez un commentaire');

        if (count($errors) == 0)
        {
            $commentaire = addComment($id, $auteur, $commentaire);
            $sucsess  = 'commentaire publié';
            unset($auteur);
            unset($commentaire);
        }
    }
    $article = getArticle($id);
    $commentaire = getComment($id);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $article -> title ?></title>
</head>
<body>
    <a href="index.php">Retour aux articles</a>
    <h1><?= $article -> title ?></h1>
    <time><?= $article -> date ?></time>
    <p><?= $article -> contenue ?></p>
    <hr>

    <?php 
    if(isset($sucsess))
    echo $sucsess;

    if(!empty($errors)):?>

    <?php foreach($errors as $error):?>
        <p><?= $error ?></p>
        <?php endforeach; ?>

    <?php endif; ?>

    <form action="article.php?id=<?= $article->id ?>" method="post">
    <p><label for="auteur"> Pseudo : </label><br>
    <input type="text" name="auteur" id="auteur" value="<?php if(isset($auteur)) echo $auteur ?>"/></p>
    <p><label for="commentaire"> commentaires : </label><br>
    <textarea" name="commentaire" id="commentaire" cols="20" rows="8" value="<?php if(isset($commentaire)) echo $commentaire ?>"></textarea></p>
    <button type="submit">Envoyer</button>
</form>
</body>
</html>