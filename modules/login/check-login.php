<?php 
if ($_POST['email'] == '') echo json_encode('введите email');
if ($_POST['password'] == '') echo json_encode('введите пароль');
if ($_POST['email'] != '' && $_POST['password'] != '') {
	if ( preg_match("/\A[^@]+@([^@\.]+\.)+[^@\.]+\z/", $_POST['email']) != "1" ) {
		echo json_encode("Не корректный email");
	} else {
		$user = R::findOne('users', 'email = ?', array($_POST['email']) );
		if ( isset($user) ) {
			if ( password_verify( $_POST['password'], $user->password ) ) {
				$_SESSION['logged_user'] = $user;
				$_SESSION['authorization'] = true;
				header("Location: ". HOST);
				exit();
			} else {
				// echo json_encode("Пароль введен неверно");
				echo json_encode("Введите верные данные");
			}
		} else {
			echo json_encode("Введите верные данные");
		}
	}
}
?>