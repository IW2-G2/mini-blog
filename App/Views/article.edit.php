<?php require VIEWS_LAYOUT_FOLDER_PATH."header.view.php"; ?>

<div class="article">
	<form method="POST" action="">
		<div class="title">
			<input type="text" name="title" value="<?php echo $data['article']['title'] ?>"/>
		</div>

		<textarea name="content"><?php echo $data['article']['content'] ?></textarea>

		<p>Créé par <?php echo $data['article']['autor'] ?></p>
		<p>Le <?php echo $data['article']['created_at'] ?></p>
		<br>
		
		<input type="submit" value="Valider" />
	</form>
</div>

<?php require VIEWS_LAYOUT_FOLDER_PATH."footer.view.php"; ?>
