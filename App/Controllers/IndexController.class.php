<?php

namespace App\Controllers;

require MODELS_FOLDER_PATH."ArticleModel.class.php";

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
