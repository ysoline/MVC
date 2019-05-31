<?php $title = 'Mon blog'; ?>

<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p>Une erreur a été detecté</p>

<?php $errorMessage='Il s\'est produit une erreur'?>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>