<?php require VIEWS_LAYOUT_FOLDER_PATH."header.view.php"; ?>

<h1><?php echo $data['article']['title'] ?></h1>

<p><?php echo $data['article']['content'] ?></p>

<p>Créé par <?php echo $data['article']['autor'] ?></p>
<p>Le <?php echo $data['article']['created_at'] ?></p>

<a title="Editer <?php echo $data['article']['title'] ?>" 
	href="<?php echo APP_BASE_PATH."article/edit/".$data['article']['id'] ?>">
	Editer
</a>
<a title="Editer <?php echo $data['article']['title'] ?>" 
	href="<?php echo APP_BASE_PATH."article/remove/".$data['article']['id'] ?>">
	Supprimer
</a>

<?php foreach ($data['comment'] as $comment): ?>
  <h2>Titre : <?php echo $comment['title'] ?></h2>
  <p>Auteur : <?php echo $comment['autor'] ?></p>
  <p>Auteur : <?php echo $comment['content'] ?></p>
  <p>Créé le  <?php echo $comment['created_at'] ?></p>
<?php endforeach; ?>

<?php require VIEWS_LAYOUT_FOLDER_PATH."footer.view.php"; ?>
