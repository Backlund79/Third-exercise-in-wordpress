
<!-- Template som styr hero till forntpage.php -->

<section class="hero" style="background-image: url('<?php the_sub_field('hero_bild')?>');">
	<div class="container">
		<div class="row">
			<div class="col-xs-12 column">
				<div class="text">

					<h1><?php the_sub_field('hero_titel'); ?></h1>

					<p><?php the_sub_field('hero_text'); ?></p>
				</div>
			</div>
		</div>
	</div>
</section>