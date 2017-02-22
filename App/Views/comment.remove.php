<?php require VIEWS_LAYOUT_FOLDER_PATH."header.view.php"; ?>

<div class="comment">
	<h1><?php echo $comment['title'] ?></h1>

	<p><?php echo $comment['content'] ?></p>

	<br>
	<p>Créé par <?php echo $comment['autor'] ?></p>
	<p>Le <?php echo $comment['created_at'] ?></p>
</div>

<form method="POST" action="">
	<label for="title">Confirmer la suppression de cet article :</label>
	<input type="hidden" name="remove" value="1" />
	<input type="submit" value="Valider" />
</form>

<?php require VIEWS_LAYOUT_FOLDER_PATH."footer.view.php"; ?>
