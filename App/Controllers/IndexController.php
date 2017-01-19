<?php

namespace App\Controllers;

use App\Models\ArticleModel;

class IndexController {

	public function indexAction($params)
  {
      $ArticleModel = new ArticleModel();

			require VIEWS_FOLDER_PATH."index.view.php";
	}

	public function welcomeAction($params)
  {
		  echo "Welcome";
	}

}
