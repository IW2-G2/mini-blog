<?php require VIEWS_LAYOUT_FOLDER_PATH."header.view.php"; ?>

<form method="POST" action="">
	<label for="title">Titre :</label>
	<input type="text" name="title" value=""/>
	<br><br>

	<label for="content">Contenu :</label><br>
	<textarea name="content"></textarea>
	<br><br>

	<label for="autor">Auteur :</label>
	<input type="text" name="autor" value=""/>
	<br><br>

	<input type="submit" value="Valider" />
</form>

<?php require VIEWS_LAYOUT_FOLDER_PATH."footer.view.php"; ?>
