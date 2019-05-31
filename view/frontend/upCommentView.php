<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
    <body>
        <h1>Mon super blog !</h1>
        <p><a href="index.php">Retour à la liste des billets</a></p>

        <h2>Edition d'un commentaire</h2>

<form action="index.php?action=editComment&amp;id=<?= $comment['id'] ?>" method="post">
    <div>
        <label for="author">Auteur</label><br />
        <input type="text" id="author" name="author" />
    </div>
    <div>
        <label for="comment">Commentaire</label><br />
        <textarea id="comment" name="comment"></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>
 <?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>