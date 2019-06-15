<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p>Derniers billets du blog :</p>


<?php
while ($data = $posts->fetch())
{
?>
    <div class="jumbotron">
        <h3>
            <?= htmlspecialchars($data['title']) ?>
            <em>le <?= $data['date_creation_fr'] ?></em>
        </h3>
       
        <p>
            <?= nl2br(htmlspecialchars($data['content'])) ?>
        </div> 
        <button type="button" class="btn btn-outline-primary"><em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a></em></button>
        </p>
    
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
