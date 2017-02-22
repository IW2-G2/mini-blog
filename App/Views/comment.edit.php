<?php require VIEWS_LAYOUT_FOLDER_PATH."header.view.php"; ?>

<div class="comment">
	<form method="POST" action="">
		<div class="title">
			<input type="text" name="title" value="<?php echo $comment['title'] ?>"/>
		</div>

		<textarea name="content"><?php echo $comment['content'] ?></textarea>

		<p>Créé par <?php echo $comment['autor'] ?></p>
		<p>Le <?php echo $comment['created_at'] ?></p>
		<br>
		
		<input type="submit" value="Valider" />
	</form>
</div>

<?php require VIEWS_LAYOUT_FOLDER_PATH."footer.view.php"; ?>
