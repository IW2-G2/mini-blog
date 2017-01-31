<?php

namespace App\Controllers;

use App\Models\ArticleModel;
use App\Models\CommentModel;

class ArticleController {

	public function viewAction($params)
	{
		if(empty($params)) {
			require VIEWS_FOLDER_PATH."404.view.php";
			return;
		}	
		$ArticleModel = new ArticleModel();
		$CommentModel = new CommentModel();

		$data = [];
		$data['article'] = $ArticleModel->getOneArticle($params[0]);
		$data['comment'] = $CommentModel->getListOfComment($params[0]);

		require VIEWS_FOLDER_PATH."article.view.php";
	}

	public function editAction($params)
	{
		if(empty($params)) {
			require VIEWS_FOLDER_PATH."404.view.php";
			return;
		}
		// Si on reçoit des informations après un POST, on les enregistre
		if ( isset($params[0]) && isset($_POST['title']) && isset($_POST['content']) ) {
			$id = $params[0];
			$title = $_POST['title'];
			$content = $_POST['content'];
			$ArticleModel = new ArticleModel();
			$ArticleModel->saveArticle($id, $title, $content);
			// Et on redirige vers l'article en lecture
			header('location: ..' .DS. '..' .DS. 'index');
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
			header('location: ..' .DS. '..' .DS. 'index');
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
				header('location: ..' .DS. '..' .DS. 'index');
				return;
			}
		}
		$data = [];
		$ArticleModel = new ArticleModel();
		$data['article'] = $ArticleModel->getOneArticle($params[0]);
		require VIEWS_FOLDER_PATH."article.remove.php";
	}

}
