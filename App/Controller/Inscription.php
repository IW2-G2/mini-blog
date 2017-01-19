<?php
// pour l'exemple
session_start();
require_once dirname(dirname(__FILE__)) . '/manager/manager.class.php';

$errors = [];
$manager = new Manager();

if(empty($_POST['nom']) || $_POST['nom'] == ''){
	$errors['nom'] = " Vous n'avez pas renseigné votre nom";
}
if(empty($_POST['prenom']) || $_POST['prenom'] == ''){
	$errors['prenom'] = " Vous n'avez pas renseigné votre prénom";
}
if(empty($_POST['email']) || $_POST['email'] == ''){
	$errors['email'] = " Vous n'avez pas renseigné une adresse électronique valide ";
}
if(!$manager->getCheckMail($_POST['email'])){
	$errors['email'] = " Cette email est déjà pris ";
}
if(empty($_POST['password']) || $_POST['password'] == ''){
	$errors['password'] = " Vous n'avez pas renseigné votre mot de passe";
}
if(empty($_POST['confirm']) || $_POST['confirm'] != $_POST['password']){
	$errors['samePwd'] = " Les 2 mots de passe sont differents";
}

if(!empty($errors)){
	$_SESSION['errors'] = $errors;
	$_SESSION['inputs'] = $_POST;
	header('Location: ../index.php');
} else {

	$user = [
		'nom' => $_POST['nom'],
		'prenom' => $_POST['prenom'],
		'email' => $_POST['email'],
		'password' => sha1($_POST['password'])
	];

	$manager->setNewUser($user);
	$_SESSION['success'] = ["rdv" => "Vous avez bien été enregister"];
	syslog(LOG_INFO, "Un nouveau user c'est inscrit :  " . $_POST['email']);
	mail($_POST['email'], 'Inscription a mariage', 'Vous avez bien été inscrit au site des cotisation des cadeaux de mariage');
	header('Location: ./login.php?password=' . $_POST['password'] . '&email='. $_POST['email']);

}