<?php

namespace App\Controllers;

use App\Models\ArticleModel;

class ArticleController {

	public function viewAction($params)
  {
		$data = [];
    $ArticleModel = new ArticleModel();
		$data['article'] = $ArticleModel->getOneArticle($params[0]);

		require VIEWS_FOLDER_PATH."article.view.php";
	}

	public function editAction($params)
  {
		  echo "Welcome";
	}

	public function createAction($params)
  {
		  echo "Welcome";
	}

	public function removeAction($params)
  {
		  echo "Welcome";
	}

}
