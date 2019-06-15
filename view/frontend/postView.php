<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
    <body>
        <h1 class='d-flex justify-content-center'>Mon super blog !</h1>
        <button type="button" class="btn btn-outline-primary mb-4"><a href="index.php">Retour à la liste des billets</a></button>

        <div class="jumbotron">
            <h3>
                <?= htmlspecialchars($post['title']) ?>
                <em>le <?= $post['date_creation_fr'] ?></em>
            </h3>
            
            <p>
                <?= nl2br(htmlspecialchars($post['content'])) ?>
            </p>
        </div>


        <div class="card-header">
        <h2>Commentaires :</h2> 
    
        <?php
        while ($comment = $comments->fetch())
        {
        ?>
            <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?> 
            (<a href="index.php?action=updateComment&id=<?= $comment['id'] ?>">modifier</a>)
            </p>
            <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>            
        <?php
        }
        ?>
    </div>

    <h5 class="d-flex justify-content-center mt-5">Ajouter un commentaire : </h5>
    <div class="col-md-6 offset-md-5 mt-5">
        <div class="card border-primary mb-3 col-md-auto" style="max-width: 20rem;">

            <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post" >

                <div class='d-flex justify-content-center flex-column'>
                    <label for="author">Auteur :</label><br />
                    <input type="text" id="author" name="author" />
                </div>

                <div class='d-flex justify-content-center flex-column mt-2'>
                    <label for="comment">Commentaire :</label><br />
                    <textarea id="comment" name="comment"></textarea>
                </div>
                
                <div class="row justify-content-md-center mt-3 mb-2">
                    <input class="btn btn-primary " type="submit" />
                </div>
            </form>
        </div>
    </div>

 <?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
