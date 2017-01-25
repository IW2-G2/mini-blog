<?php require VIEWS_LAYOUT_FOLDER_PATH."header.view.php"; ?>

<h1>Bienvenue sur l'index</h1>

<?php foreach ($data['articles'] as $article): ?>
<div class="article">
	<a title="<?php echo $article['title'] ?>" href="<?php echo $data['urlArticle'].$article['id'] ?>">
		<h1>
			<img src="<?php echo APP_BASE_PATH ?>/images/picto/eye.png" alt="Voir" height="24" width="24" border="0">
			<?php echo $article['title'] ?>
		</h1>
	</a>
	<p>Créé par <?php echo $article['autor'] ?></p>
	<p>Le <?php echo $article['created_at'] ?></p>
	
		
	
</div>
<?php endforeach; ?>



<?php require VIEWS_LAYOUT_FOLDER_PATH."footer.view.php"; ?>
