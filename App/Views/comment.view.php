<?php require VIEWS_LAYOUT_FOLDER_PATH."header.view.php"; ?>

<div class="comment">
	<a title="title" href="<?php echo SERVER_URL."comment/view/".$comment['id']; ?>">
		<h2><?php echo $comment['title'] ?></h2>
	</a>
	<p><?php echo $comment['content'] ?></p>

	<br>
	<p>Créé par <?php echo $comment['autor'] ?></p>
	<p>Créé le  <?php echo $comment['created_at'] ?></p>

	<a 	title="Editer <?php echo $comment['title'] ?>" 
		href="<?php echo APP_BASE_PATH."comment/edit/".$comment['id'] ?>">
		<img src="<?php echo APP_BASE_PATH ?>/images/picto/edit.png" alt="Editer" height="34" width="34" border="0">
	</a>
	<a 	title="Supprimer <?php echo $comment['title'] ?>" 
		href="<?php echo APP_BASE_PATH."comment/remove/".$comment['id'] ?>">
		<img src="<?php echo APP_BASE_PATH ?>/images/picto/cross-l.png" alt="Supprimer" height="34" width="34" border="0">
	</a>
</div>

<?php require VIEWS_LAYOUT_FOLDER_PATH."footer.view.php"; ?>
