<form id="loginForm" class="login-page-form" method="POST" action="<?=HOST?>login" novalidate>
	<div class="login-page-form__header">Вход на сайт</div>
	<div class="registration-page-form__row">
		<div class="error hidden"></div>
	</div>

	<div class="login-page-form__row">
		<input id="email" name="email" class="input" type="email" placeholder="E-mail" />
	</div>
	<div class="login-page-form__row">
		<input id="password" name="password" class="input" type="password" placeholder="Пароль" />
	</div>
	<div class="login-page-form__footer">
		<input id="enter" name="enter" type="submit" class="button button--enter" value="Войти" />
	</div>
</form>
