<?php ob_start(); ?>
    <body>
        <h1 class="d-flex justify-content-center">Mon super blog !</h1>
        <h5 class='d-flex justify-content-center ml-2'>Modification d'un commentaire</h5>

    <div class="col-md-6 offset-md-5">
    <div class="card border-primary mb-3 col-md-auto" style="max-width: 20rem;">
        <form action="index.php?action=editComment&amp;id=<?= $comment['id'] ?>" method="post">

        <div class='d-flex justify-content-center flex-column mt-3'>
                <label for="author">Auteur :</label><br />
                <input type="text" id="author" name="author" value="<?= $comment['author'] ?>"/>
            </div>
            <div class='d-flex justify-content-center flex-column mt-3'>
                <label for="comment">Commentaire :</label><br />
                <textarea id="comment" name="comment" ><?= $comment['comment'] ?></textarea>
            </div>

            <div class='d-flex justify-content-center mt-3 mb-2'>
                <input id="post_id" name="post_id" type="hidden" value="<?= $comment['post_id'] ?>"/>
                <input class="btn btn-primary" type="submit" />
            </div>
        </form>
    </div>
    </div>

 <?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>