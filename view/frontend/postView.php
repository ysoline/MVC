<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
    <body>
        <h1>Mon super blog !</h1>
        <p><a href="index.php">Retour à la liste des billets</a></p>

        <div class="news">
            <h3>
                <?= htmlspecialchars($post['title']) ?>
                <em>le <?= $post['date_creation_fr'] ?></em>
            </h3>
            
            <p>
                <?= nl2br(htmlspecialchars($post['content'])) ?>
            </p>
        </div>

        <h2>Commentaires</h2>

        <?php
        while ($comment = $comments->fetch())
        {
        ?>
            <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?> 
            <a href="view/frontend/commentView.php?action=edit&amp;id=<?= $comment['id']?>">Modifier le commentaire </a>
            </p>
            <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>            
        <?php
        }
        ?>

        <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
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

<?php require('view/frontend/template.php'); ?>
