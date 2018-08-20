
<div class="container">
	<?php if (!empty($works) ) { ?>
	<div class="title-1 mb-25">Новые
		<a href="<?=HOST?>works">работы</a>
	</div>
	<div class="row">
		<!-- <div class="row pb-100"> -->
		<?php foreach ($works as $work) { ?>
		<?php include ROOT . "templates/works/_work-card.tpl" ?>
		<?php } ?>
		<!-- </div> -->
		<!-- <div class="col-md-4">
			<div class="card card-portfolio">
				<img class="card-portfolio__img" src="../img/img-cards/portfolio-preview.png" alt="" />
				<div class="card-portfolio__body">
					<div class="title-4">Верстка Landing Page</div>
					<a class="button" href="#">Смотреть кейс</a>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card card-portfolio">
				<img class="card-portfolio__img" src="../img/img-cards/kauf-ui-web-kit-demo.png" alt="" />
				<div class="card-portfolio__body">
					<div class="title-4">Верстка UI набора</div>
					<a class="button" href="#">Смотреть кейс</a>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card card-portfolio">
				<img class="card-portfolio__img" src="../img/img-cards/internet-store.png" alt="" />
				<div class="card-portfolio__body">
					<div class="title-4">Верстка интернет магазина</div>
					<a class="button" href="#">Смотреть кейс</a>
				</div>
			</div>
		</div> -->
	</div>
	<?php } ?>
	<?php if (!empty($posts)) { ?>
	<div class="title-1 mt-70 mb-35">Новые записи в
		<a href="<?=HOST?>blog">блоге</a>
	</div>
	<div class="row pb-100">
		<?php foreach ($posts as $post) { ?>
		<?php include ROOT . "templates/_parts/_blog-card.tpl" ?>
		<?php } ?>
	</div>
	<?php } ?>
</div>
