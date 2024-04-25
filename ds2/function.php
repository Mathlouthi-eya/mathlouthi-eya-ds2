<?php
//fonction qui recupere tous les articles
function getArticles()
{
    require('connect.php');
    $req=$bdd->prepare('select id, titre, date from articles order by id desc');
    $req->execute();
    $data=$req->fetchAll(PDO::FETCH_OBJ);
    return $data ;
    $req->closeCursor();

}
//fonction qui récupère un article
function getArticle($id)
{
    require('connect.php');
    $req = $bdd->prepare('select * where id = ?');
    $req -> execute(array($id));

    if($req -> rowCount() == 1)
    {
        $data = $req -> fetch(PDO::FETCH_OBJ);
        return $data;
    }
    else 
    header('Location: index.php');

    $req -> closeCursor();
}
//fonction qui ajoute un commentaire en bdd
function addComment($articleId, $auteur, $commentaire)
{
    require('connect.php');
    $req = $bdd->prepare('INSERT INTO commentaires (articleId, auteur, commentaire, date) VALUES (?, ?, ?? NOW())');
    $req -> execute(array($articleId, $auteur, $commentaire));
    $req -> closeCursor();
}
//fonction qui récupère le commentaire d'un article
function getComment($id)
{
    require('connect.php');
    $req = $bdd->prepare('SELECT* FROM commentaires WHERE articlesId = ?');
    $req -> execute (array($id));
    $data = $req -> fetchAll(PDO::FETCH_OBJ);
    return $data;
    $req -> closeCursor();
}
?>