<?php

namespace App\Controllers;

use App\Models\ArticleModel;

class IndexController {

	public function indexAction($params)
  {
		$data = [];
    $ArticleModel = new ArticleModel();
		$data['articles'] = $ArticleModel->getListOfArticles();

		require VIEWS_FOLDER_PATH."index.view.php";
	}

	public function welcomeAction($params)
  {
		  echo "Welcome";
	}

}
