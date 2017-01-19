<?php
// pour l'exemple
session_start();
require_once dirname(dirname(__FILE__)) . '/manager/manager.php';

//Permet de ce connecter à la base de données
$manager = new Manager();
$errors = [];

if (isset($_GET['deco']) && $_GET['deco'] == 'yes') {
	session_destroy();
	header('Location: ../index.php');
}

if(empty($_POST['email']) && empty($_GET['email']) ){
	$errors['email'] = " Vous n'avez pas renseigné votre mail";
}
if(empty($_POST['password']) && empty($_GET['password']) ){
	$errors['password'] = " Vous n'avez pas renseigné votre Mdp";
}

if(!empty($errors)){
	$_SESSION['errors'] = $errors;
	header('Location: ../index.php');
} else {

	if ($_SERVER['REQUEST_METHOD'] == 'GET') {

		if($user = $manager->getCheckConnexion($_GET['email'], sha1($_GET['password']))){
			$_SESSION['username'] =  $user['email'];
			$_SESSION['id'] =  $user['id'];
		} else{
		 	$_SESSION['errors']  = ["user" => "Vos login ou mot de passe sont faux"];
		}

	} else if($_SERVER['REQUEST_METHOD'] == 'POST'){

		if($user = $manager->getCheckConnexion($_POST['email'], sha1($_POST['password']))){
			$_SESSION['username'] =  $user['email'];
			$_SESSION['id'] =  $user['id'];
		} else{
		 	$_SESSION['errors']  = ["user" => "Vos login ou mot de passe sont faux"];
		}
		
	}
	
	header('Location: ../index.php');
};