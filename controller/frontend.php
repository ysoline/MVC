<?php

require_once('model/PostManager.php'); //require_once permet de ne pas charger la classe une seconde fois
require_once('model/CommentManager.php');

function listPosts()
{
    $postManager= new \Julie\Blog\Model\PostManager(); //Création d'un objet
    $posts= $postManager->getPosts(); //Appel d'une fonction de cette objet

    require('view/frontend/listPostsView.php');
}

function post()
{
    $postManager= new \Julie\Blog\Model\PostManager();
    $commentManager= new \Julie\Blog\Model\CommentManager();

    $post= $postManager-> getPost($_GET['id']);
    $comments= $commentManager-> getComments($_GET['id']);

    require('view/frontend/postView.php');
}

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

function editComment($newComment, $commentId, $comment)
{
    $commentManager= new \Julie\Blog\Model\CommentManager();

    $comment= $commentManager-> getComment($_GET['id']);

    $affectedComment = $commentManager->editComment($newComment, $commentId, $comment);
    require('view/frontend/commentView.php');

    if($affectedComment === false){
        throw new Exception('Impossible d\'éditer le commentaire !');
    }else{
        header('Location: view/frontend/postView.php?action=post&id='.$postID);
    }
}