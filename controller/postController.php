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
