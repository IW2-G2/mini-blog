<?php
header("HTTP/1.0 404 Not Found");
/**
 * Created by PhpStorm.
 * User: kuben
 * Date: 20/01/17
 * Time: 14:55
 */
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Erreur 404 : Page introuvable</title>
  </head>
  <body>
	<p> Erreur 404! </p>
	<p> La page que vous avez demandé se cache ailleurs... </p>
	=> <a href="<?php echo SERVER_URL; ?>">Retourner à l'accueil</a> <=
  </body>
</html>
