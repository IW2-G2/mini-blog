<?php

namespace App\Controllers;

use App\Models\CommentModel;

class CommentController {

	public function viewAction($params)
	{
		if(empty($params)) {
			require VIEWS_FOLDER_PATH."404.view.php";
			return;
		}	
		$CommentModel = new CommentModel();

		$data = [];
		$data['comment'] = $CommentModel->getComment($params[0]);
		$comment = $data['comment'][0];
		require VIEWS_FOLDER_PATH."comment.view.php";
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
			$CommentModel = new CommentModel();
			$CommentModel->saveComment($id, $title, $content);
			// Et on redirige vers la page d'accueil
			header('location: '.SERVER_URL);
			return;
		} else {
			// Sinon on récupère l'article et on l'affiche en modification
			$data = [];
			$CommentModel = new CommentModel();
			$data['comment'] = $CommentModel->getComment($params[0]);
			$comment = $data['comment'][0];
			require VIEWS_FOLDER_PATH."comment.edit.php";
		}
	}

	public function removeAction($params)
	{
		if ( isset($params[0]) && isset($_POST['remove']) ) {
			if ($_POST['remove'] == 1) {
				$id=$params[0];
				$CommentModel = new CommentModel();
				$CommentModel->removeComment($id);
				header('location: '.SERVER_URL);
				return;
			}
		}
		$data = [];
		$CommentModel = new CommentModel();
		$data['comment'] = $CommentModel->getComment($params[0]);
		$comment = $data['comment'][0];
		require VIEWS_FOLDER_PATH."comment.remove.php";
	}
}
