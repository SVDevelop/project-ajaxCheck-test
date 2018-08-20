<div class="header-user__block ml-auto">

	<div class="header-user__profil-block ml-auto">
		<div class="header-user__name">
			<?=$_SESSION['logged_user']['name']?>
				<?=$_SESSION['logged_user']['login']?>
		</div>

		<div class="header-user__rank">Пользователь</div>
		<div class="header-user__buttons-group">
			<div class="header-user__buttons-signout">
				<a class="button button--profile" href="<?=HOST?>logout"> Выход</a>
			</div>
		</div>
	</div>
</div>
