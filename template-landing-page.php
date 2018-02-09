<?php
/**
 * Template Name: Landing Page
 *
 * The template for the main landing page
 *
 * @package swarm
 */

get_header(); ?>

	<div class="content-area newsletter-wrapper wood-bg">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<?php get_template_part('template-parts/content', 'newsletter') ?>
					<div class="up-arrow"></div>
				</div>
			</div>
		</div>
	</div><!-- #primary -->

	<div class="content-area mission-statement">
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<h4 class="mission-statement__headline"><?php _e('this is a headline title', 'swarm') ?></h4>
					<p class="mission-statement__content"><?php _e('Gumbo beet greens corn soko endive gumbo gourd. Parsley shallot courgette tatsoi pea sprouts fava bean collard greens dandelion okra wakame tomato. Dandelion cucumber earthnut pea peanut soko zucchini.', 'swarm') ?></p>
				</div>
			</div>
		</div>
	</div>

	<div class="content-area wood-bg wood-bg--fixed benefits">
		<div class="container">
			<div class="row benefits__row">
				<div class="col-md-4">
					<img class="img-responsive benefits__img" src="<?php echo get_template_directory_uri() ?>/img/florida-breweries.jpg" alt="Local Florida Breweries">
					<h4 class="benefits__headline"><?php _e('Lorem Ipsum', 'swarm') ?></h4>
					<p class="benefits__content"><?php _e('Gumbo beet greens corn soko endive gumbo gourd. Parsley shallot courgette tatsoi pea sprouts fava bean collard greens dandelion okra wakame tomato. Dandelion cucumber earthnut pea peanut soko zucchini.', 'swarm') ?></p>
				</div>
				<div class="col-md-4">
					<img class="img-responsive benefits__img" src="<?php echo get_template_directory_uri() ?>/img/beer-games.jpg" alt="Beer Games">
					<h4 class="benefits__headline"><?php _e('Lorem Ipsum', 'swarm') ?></h4>
					<p class="benefits__content"><?php _e('Gumbo beet greens corn soko endive gumbo gourd. Parsley shallot courgette tatsoi pea sprouts fava bean collard greens dandelion okra wakame tomato. Dandelion cucumber earthnut pea peanut soko zucchini.', 'swarm') ?></p>
				</div>
				<div class="col-md-4">
					<img class="img-responsive benefits__img" src="<?php echo get_template_directory_uri() ?>/img/kitchen-lab.jpg" alt="Kitchen Lab">
					<h4 class="benefits__headline"><?php _e('Lorem Ipsum', 'swarm') ?></h4>
					<p class="benefits__content"><?php _e('Gumbo beet greens corn soko endive gumbo gourd. Parsley shallot courgette tatsoi pea sprouts fava bean collard greens dandelion okra wakame tomato. Dandelion cucumber earthnut pea peanut soko zucchini.', 'swarm') ?></p>
				</div>
			</div>
		</div>
	</div>

	<div class="content-area sponsors">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h4 class="logo-header"><?php _e('Lorem ipsum <span class="text-highlight">Sprung</span>', 'swarm') ?></h4>
					<?php echo do_shortcode("[logo_slider]") ?>
				</div>
			</div>
		</div>
	</div>

<?php
get_footer();
