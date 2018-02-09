<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package swarm
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-#######-1', 'auto');
  ga('send', 'pageview');

</script>

</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<!-- sticky ticket link -->
	<div class="ticket-sticky">
		<a class="ticket-sticky__link" href="https://localhost/" target="_blank"><?php _e('Buy Tickets') ?></a>
	</div>

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'swarm' ); ?></a>

	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">

			<!-- scrolling background -->
			<div class="hero-slider">
				<div class="hero-slide hero-slide--1"></div>
				<div class="hero-slide hero-slide--2"></div>
				<div class="hero-slide hero-slide--3"></div>
				<div class="hero-slide hero-slide--4"></div>
				<div class="hero-slide hero-slide--5"></div>
			</div>

			<style>
				.hero-slide--1 { background: url(<?php echo get_template_directory_uri() ?>/img/header-bg.jpg) center top no-repeat; background-size: cover; }
				.hero-slide--2 { background: url(<?php echo get_template_directory_uri() ?>/img/home-slide-2.jpg) center top no-repeat; background-size: cover; }
				.hero-slide--3 { background: url(<?php echo get_template_directory_uri() ?>/img/home-slide-3.jpg) center top no-repeat; background-size: cover; }
				.hero-slide--4 { background: url(<?php echo get_template_directory_uri() ?>/img/home-slide-4.jpg) center top no-repeat; background-size: cover; }
				.hero-slide--5 { background: url(<?php echo get_template_directory_uri() ?>/img/home-slide-5.jpg) center top no-repeat; background-size: cover; }
				
				/* mobile slides */
				@media(max-width:768px) { 
					.hero-slide--1 { background-image: url(<?php echo get_template_directory_uri() ?>/img/header-bg-mobile.jpg); background-size: auto; }
					.hero-slide--2 { background-image: url(<?php echo get_template_directory_uri() ?>/img/home-slide-2-mobile.jpg); background-size: auto; }
					.hero-slide--3 { background-image: url(<?php echo get_template_directory_uri() ?>/img/home-slide-3-mobile.jpg); background-size: auto; }
					.hero-slide--4 { background-image: url(<?php echo get_template_directory_uri() ?>/img/home-slide-4-mobile.jpg); background-size: auto; }
					.hero-slide--5 { background-image: url(<?php echo get_template_directory_uri() ?>/img/home-slide-5-mobile.jpg); background-size: auto; }
				}
			</style>

			<div class="hero-content container">

				<!-- header banner -->
				<div class="row">
					<div class="col-md-6 col-sm-8">
						<?php
						if ( is_front_page() || is_home() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img class="img-responsive image-inline" src="<?php echo get_template_directory_uri() ?>/img/logo.png" alt="<?php bloginfo('name') ?>" width="272" height="147"> <img class="img-responsive image-inline header-date" src="<?php echo get_template_directory_uri() ?>/img/date.png" alt="Saturday April 21st, 2017 in Wynwood" width="146" alt="74"></a></h1>
						<?php else : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img class="img-responsive image-inline" src="<?php echo get_template_directory_uri() ?>/img/logo.png" alt="<?php bloginfo('name') ?>" width="272" height="147"> <img class="img-responsive image-inline header-date" src="<?php echo get_template_directory_uri() ?>/img/date.png" alt="Saturday April 21st, 2017 in Wynwood" width="146" alt="74"></a></h1>
						<?php
						endif;
						?>
					</div>
					<div class="col-md-6 col-sm-4">
						<div class="onsale-banner">
							<a class="onsale-banner__link" href="https://igotsprung.eventbrite.com" target="_blank">
								<span class="onsale-banner__small"><?php _e('BUY TICKETS', 'swarm') ?></span>
								<!--<span class="onsale-banner__large"><?php _e('Tickets', 'swarm') ?></span>
								<span class="onsale-banner__small"><?php _e('On Sale', 'swarm') ?></span>
								<span class="onsale-banner__star"><i class="fa fa-star fa-3x"></i></span>-->
							</a>
						</div>
					</div>
				</div>
				<!-- / header banner -->

				<!-- statement -->
				<div class="row statement">
					<div class="col-md-6">
						<div class="black-white">
							<h2><?php _e('Call to Action', 'swarm') ?></h2>
						</div>
						<div class="black-white black-white--small">
							<p><?php _e('This would be another call to action', 'swarm') ?></p>
						</div>
					</div>
				</div>
				<!-- / statement -->

			</div>
		</div><!-- .site-branding -->

		<!--<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'swarm' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'menu_id' => 'primary-menu' ) ); ?>
		</nav>--><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
