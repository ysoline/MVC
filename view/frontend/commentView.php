<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
    <body>
        <h1>Mon super blog !</h1>
        <p><a href="index.php">Retour à la liste des billets</a></p>

        <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?> 
            
            </p>
            <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>