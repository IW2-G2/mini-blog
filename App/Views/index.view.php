<?php require VIEWS_LAYOUT_FOLDER_PATH."header.view.php"; ?>

<h1>Bienvenue sur l'index</h1>

<?php foreach ($data['articles'] as $article): ?>
  <h2>Titre : <?php echo $article['title'] ?></h2>
  <p>Auteur : <?php echo $article['autor'] ?></p>
  <p>Créé le <?php echo $article['created_at'] ?></p>
<?php endforeach; ?>



<?php require VIEWS_LAYOUT_FOLDER_PATH."footer.view.php"; ?>
