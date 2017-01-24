<?php

namespace App\Controllers;

use App\Models\ArticleModel;
use App\Models\CommentModel;

class ArticleController {

	public function viewAction($params)
	{
		$data = [];
		$ArticleModel = new ArticleModel();
		$data['article'] = $ArticleModel->getOneArticle($params[0]);
		$CommentModel = new CommentModel();
		$data['comment'] = $CommentModel->getListOfComment($params[0]);

		require VIEWS_FOLDER_PATH."article.view.php";
	}

	public function editAction($params)
	{
		// Si on reçoit des informations après un POST, on les enregistre
		if ( isset($params[0]) && isset($_POST['title']) && isset($_POST['content']) ) {
			$id=$params[0];
			$title=$_POST['title'];
			$content=$_POST['content'];
			$ArticleModel = new ArticleModel();
			$ArticleModel->saveArticle($id, $title, $content);
			// Et on redirige vers l'article en lecture
			$this->viewAction($params);
			return;
		} else {
			// Sinon on récupère l'article et on l'affiche en modification
			$data = [];
			$ArticleModel = new ArticleModel();
			$data['article'] = $ArticleModel->getOneArticle($params[0]);
			require VIEWS_FOLDER_PATH."article.edit.php";
		}
	}

	public function createAction($params)
	{		
		// Si on reçoit des informations après un POST, on les enregistre
		if ( isset($_POST['title']) && isset($_POST['content']) && isset($_POST['autor'])) {
			$title=$_POST['title'];
			$content=$_POST['content'];
			$autor=$_POST['autor'];
			$ArticleModel = new ArticleModel();
			$ArticleModel->createArticle($title, $content, $autor);
			$index = new IndexController();
			$index->indexAction($params);
			return;
		}

		require VIEWS_FOLDER_PATH."article.create.php";
	}

	public function removeAction($params)
	{
		if ( isset($params[0]) && isset($_POST['remove']) ) {
			if ($_POST['remove'] == 1) {
				$id=$params[0];
				$ArticleModel = new ArticleModel();
				$ArticleModel->removeArticle($id);
				$index = new IndexController();
				$index->indexAction($params);
				return;
			}
		}
		$data = [];
		$ArticleModel = new ArticleModel();
		$data['article'] = $ArticleModel->getOneArticle($params[0]);
		require VIEWS_FOLDER_PATH."article.remove.php";	
	}

}
