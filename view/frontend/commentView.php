<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p>Commentaires:</p>

         <?php
            while ($comment = $commentId->fetch())
            {
        ?>
            <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?> 
            </p>
            <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>            
        <?php
            }
        ?>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>