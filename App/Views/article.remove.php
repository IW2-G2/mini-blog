<?php require VIEWS_LAYOUT_FOLDER_PATH."header.view.php"; ?>

<h1><?php echo $data['article']['title'] ?></h1>

<p><?php echo $data['article']['content'] ?></p>

<p>Créé par <?php echo $data['article']['autor'] ?></p>
<p>Le <?php echo $data['article']['created_at'] ?></p>
<br><br>

<form method="POST" action="">
	<label for="title">Confirmer la suppression de cet article :</label>
	<input type="hidden" name="remove" value="1" />
	<input type="submit" value="Valider" />
</form>

<?php require VIEWS_LAYOUT_FOLDER_PATH."footer.view.php"; ?>
