<div class="container">
	<div class="row align-items-center mt-40">
		<div class="col offset-md-1">
			<div class="title-1 color">Профиль</div>
		</div>
		<div class="col text-right mr-70">
			<a class="button button" href="<?=HOST?>profile-edit">Редактировать</a>
		</div>
	</div>
	<div class="row offset-md-1">
		<div class="col">
			<?php if($currentUser->name != "") { ?>
			<div class="user-info">
				<div class="user-info__title">Имя</div>
				<div class="user-info__desc">
					<?=$currentUser->name?>
				</div>
			</div>
			<?php } ?>
			<div class="user-info">
				<div class="user-info__title">Логин</div>
				<div class="user-info__desc">
					<?=$currentUser->login?>
				</div>
			</div>
			<div class="user-info">
				<div class="user-info__title">Email</div>
				<div class="user-info__desc">
					<a href="mailto:google.com">
						<?=$currentUser->email?>
					</a>
				</div>
			</div>
			<?php if($currentUser->tell != "") { ?>
			<div class="user-info">
				<div class="user-info__title">Телефон</div>
				<div class="user-info__desc">
					<?=$currentUser->tell?>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
</div>
