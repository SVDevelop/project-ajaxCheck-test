<div class="registration-page-content">
	<div class="registration-page__container">
		<div class="registration-page-header">
			
			<div class="header-user mt-45 mr-45 ml-auto">
				<?php if ( $uri[0] == 'registration' ) {  ?>
				<a class="login-page__links" href="<?=HOST?>login">Вход</a>
				<?php } else { ?>
				<a class="login-page__links" href="<?=HOST?>registration">Регистрация</a>
				<?php } ?>
			</div>

		</div>

		<?=$content?>


	</div>
</div>
