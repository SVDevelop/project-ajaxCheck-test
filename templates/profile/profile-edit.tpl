<div class="container">
	<div class="row">
		<div class="col-xl-10 offset-1">
			<div class="title-1 m-0 pt-60">Редактировать профиль</div>

			<?php require ROOT . "templates/_parts/_errors.tpl" ?>

			<form enctype="multipart/form-data" action="<?=HOST?>profile-edit" method="POST" class="form mb-100 pb-20 pt-35">
				<div class="row fieldset">
					<div class="col-4">
						<label>
							<div class="fieldset__title">Имя</div>
							<input name="name" class="input" placeholder="Введите имя" value="<?=$currentUser->name?>" />
						</label>
					</div>
				</div>
				<div class="row fieldset">
					<div class="col-4">
						<label>
							<div class="fieldset__title">Логин</div>
							<input name="login" class="input" placeholder="Введите логин" value="<?=$currentUser->login?>" />
						</label>
					</div>
				</div>
				<div class="row fieldset">
					<div class="col-4">
						<label>
							<div class="fieldset__title">Email</div>
							<input class="input" name="email" type="email" placeholder="Введите email" value="<?=$currentUser->email?>" />
						</label>
					</div>
				</div>
				<div class="row fieldset">
					<div class="col-4">
						<label>
							<div class="fieldset__title">Телефон</div>
							<input name="tell" class="input" placeholder="Введите Телефон" value="<?=$currentUser->tell?>" />
						</label>
					</div>
				</div>
				<div class="row">
					<div class="col-md-auto pr-10">
						<input class="button button--save" type="submit" name="profile-update" value="Сохранить" />
					</div>
					<div class="col-md-auto pl-10">
						<a class="button" href="<?=HOST?>profile">Отмена</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
