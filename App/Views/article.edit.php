<?php require VIEWS_LAYOUT_FOLDER_PATH."header.view.php"; ?>

<form method="POST" action="">
	<label for="title">Titre :</label>
	<input type="text" name="title" value="<?php echo $data['article']['title'] ?>"/>
	<br><br>

	<label for="content">Contenu :</label><br>
	<textarea name="content"><?php echo $data['article']['content'] ?></textarea>
	<br><br>

	<p>Créé par <?php echo $data['article']['autor'] ?></p>
	<p>Le <?php echo $data['article']['created_at'] ?></p>
	<br><br>

	<input type="submit" value="Valider" />
</form>

<?php require VIEWS_LAYOUT_FOLDER_PATH."footer.view.php"; ?>
