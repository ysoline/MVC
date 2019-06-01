<?php
require_once('model/CommentManager.php');

function addComment($postID, $author, $comment)
{
    $commentManager= new \Julie\Blog\Model\CommentManager();

    $affectedLines = $commentManager->postComment($postID, $author, $comment);

    if($affectedLines === false){
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }else{
        header('Location: index.php?action=post&id='.$postID);
    }
}

function comment()
{
    $commentManager = new \Julie\Blog\Model\CommentManager();

    $comment = $commentManager -> commentView($_GET['id']);

    require('view/frontend/commentView.php');

    //if ($comments === false){
    //    throw new Exception('Impossible d\'afficher le commentaire !');
   // }else{
    //    header('Location: view/frontend/commentView.php?action=comment='.$_GET['id']);
    //}
}