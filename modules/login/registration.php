<?php 

$title = "Регистрация";

// Если форма отправлена - то делаем регистрацию
if ( isset($_POST['register'])) {

	if ( trim($_POST['login']) == '' ) {
		$errors[] = ['title' => 'Введите логин', 'desc' => '<p>Логин обязателен для регистрации на сайте</p>' ];
	}
	if ( trim($_POST['email']) == '' ) {
		$errors[] = ['title' => 'Введите Email', 'desc' => '<p>Email обязателен для регистрации на сайте</p>' ];
	}

	if ( trim($_POST['password']) == '') {
		$errors[] = ['title' => 'Введите Пароль' ];
	}
	if ( !(checkEmail($_POST['email'])) ) {
		$errors[]  = [ 'title' => 'Введите корректный email' ];
	}

	// Проверка пользователя
	if ( R::count('users', 'email = ?', array($_POST['email']) ) > 0 ) {
		$errors[]  = [ 
						'title' => 'Пользователь с там email уже зарегистрирован', 
						'desc' => '<p>Используйте другой Email адрес, или воспользуйтесь восстановлением пароля.</p>', 
					];
	}
	if ( R::count('users', 'login = ?', array($_POST['login']) ) > 0 ) {
		$errors[]  = [ 
						'title' => 'Пользователь с там логином уже зарегистрирован', 
						'desc' => '<p>Используйте другой логин, или воспользуйтесь восстановлением пароля.</p>', 
					];
	}

	if ( empty($errors) ) {

		$user = R::dispense('users');
		$user->name = htmlentities($_POST['name']);
		$user->login = htmlentities($_POST['login']);
		$user->email = htmlentities($_POST['email']);
		$user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
		$user->tell = htmlentities($_POST['tell']);

		$_SESSION['logged_user'] = $user;
		$_SESSION['authorization'] = true;

		R::store($user);
		header("Location: ". HOST . "profile-edit");
		exit();

	}

}

// Готовим контент для центральной части
ob_start();
include ROOT . "templates/login/form-registration.tpl";
$content = ob_get_contents();
ob_end_clean();

include ROOT . "templates/_parts/_head.tpl";
include ROOT . "templates/login/login-page.tpl";
include ROOT . "templates/_parts/_foot.tpl";

?>