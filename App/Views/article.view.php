<?php require VIEWS_LAYOUT_FOLDER_PATH."header.view.php"; ?>

<?php // Affiche l'article ?>
<div class="article">
	<h1><?php echo $data['article']['title'] ?></h1>

	<p><?php echo $data['article']['content'] ?></p>

	<br>
	<p>Créé par <?php echo $data['article']['autor'] ?></p>
	<p>Le <?php echo $data['article']['created_at'] ?></p>

	<a 	title="Editer <?php echo $data['article']['title'] ?>" 
		href="<?php echo APP_BASE_PATH."article/edit/".$data['article']['id'] ?>">
		<img src="<?php echo APP_BASE_PATH ?>/images/picto/edit.png" alt="Editer" height="34" width="34" border="0">
	</a>
	<a 	title="Editer <?php echo $data['article']['title'] ?>" 
		href="<?php echo APP_BASE_PATH."article/remove/".$data['article']['id'] ?>">
		<img src="<?php echo APP_BASE_PATH ?>/images/picto/cross-l.png" alt="Supprimer" height="34" width="34" border="0">
	</a>
</div>

<?php // Affiche tous les commentaires liés à l'article ?>
<?php foreach ($data['comment'] as $comment): ?>
<div class="comment">
	<h2><?php echo $comment['title'] ?></h2>
	<p><?php echo $comment['content'] ?></p>
	<p>Créé par <?php echo $comment['autor'] ?></p>
	<p>Créé le  <?php echo $comment['created_at'] ?></p>
</div>
<?php endforeach; ?>

<?php // Affiche le bloc de saisie d'un nouveau commentaire ?>
<form action="" method="post" id="comment_form">
	<label for="author">Nom (requis)</label>
	<p><input class="new_comment" type="text" name="author" value=""></p>

	<p><textarea class="new_comment" name="comment"></textarea></p>

	<p><input class="new_comment" name="submit" type="submit" value="Envoyer"></p>
</form>

<?php require VIEWS_LAYOUT_FOLDER_PATH."footer.view.php"; ?>
