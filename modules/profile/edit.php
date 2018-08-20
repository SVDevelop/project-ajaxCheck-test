<?php 
if ( !isLoggedIn() ) {
	header("Location: ". HOST."login");
	exit();
}
$title = "Редактировать профиль";
$currentUser = $_SESSION['logged_user'];
$user = R::load('users', $currentUser->id);

if ( isset($_POST['profile-update']) ) {
	$user = R::findOne('users', 'id = ?', array($currentUser->id) );
	if ( trim($_POST['email']) == '' ) {
		$errors[] = ['title' => 'Введите Email' ];
	}

	if ( trim($_POST['name']) == '') {
		$errors[] = ['title' => 'Введите Имя' ];
	}

	if ( trim($_POST['login']) == '') {
		$errors[] = ['title' => 'Введите логин' ];
	}

	if ( empty($errors)	) {
		if ( !(R::count('users', 'email = ?', array($_POST['email']) ) > 0 && $user->email != $_POST['email'] ) ) {
		$user->name = htmlentities($_POST['name']);
		$user->login = htmlentities($_POST['login']);
		$user->email = htmlentities($_POST['email']);
		$user->tell = htmlentities($_POST['tell']);

		R::store($user);
		$_SESSION['logged_user'] = $user;
		header("Location: ". HOST."profile");
		exit();
		} else {
			$errors[]  = [ 
		 				'title' => 'Пользователь с там email уже зарегистрирован', 
						'desc' => '<p>Используйте другой Email адрес</p>', 
		 				];
		}
	}
}

// Готовим контент для центральной части
ob_start();
include ROOT . "templates/profile/profile-edit.tpl";
$content = ob_get_contents();
ob_end_clean();

// Выводим шаблоны
include ROOT . "templates/_parts/_head.tpl";
include ROOT . "templates/template.tpl";
include ROOT . "templates/_parts/_foot.tpl";

?>