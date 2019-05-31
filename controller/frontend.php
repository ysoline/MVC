<?php

require_once('model/PostManager.php'); //require_once permet de ne pas charger la classe une seconde fois
require_once('model/CommentManager.php');

function listPosts()
{
    $postManager= new PostManager(); //Création d'un objet
    $posts= $postManager->getPosts(); //Appel d'une fonction de cette objet

    require('view/frontend/listPostsView.php');
}

function post()
{
    $postManager= new PostManager();
    $commentManager= new CommentManager();

    $post= $postManager-> getPost($_GET['id']);
    $comments= $commentManager-> getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function addComment($postID, $author, $comment)
{
    $commentManager= new CommentManager();

    $affectedLines = $commentManager->postComment($postID, $author, $comment);

    if($affectedLines === false){
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }else{
        header('Location: index.php?action=post&id='.$postID);
    }
}

function editComment($newComment, $author, $commentId)
{
    $commentManager= new CommentManager();

    $affectedComment = $commentManager->editComment($newComment, $author, $commentId);

    if($affectedComment === false){
        throw new Exception('Impossible d\éditer le commentaire !');
    }else{
        header('Location: index.php?action=post&id='.$postID);
    }
}