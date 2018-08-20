<?php
if (isset($_POST) && count($_POST) > 1) {
	include ROOT."modules/login/check-login.php";
} else {
	$title = "Вход на сайт";

	// Готовим контент для центральной части
	ob_start();
	include ROOT . "templates/login/form-login.tpl";
	$content = ob_get_contents();
	ob_end_clean();

	include ROOT . "templates/_parts/_head.tpl";
	include ROOT . "templates/login/login-page.tpl";
	include ROOT . "templates/_parts/_foot.tpl";
}
?>