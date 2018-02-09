<?php
/**
 * Template part for displaying page content in template-page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package swarm
 */

?>
<div class="content-area content-area--40">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="	entry-header">
						<?php the_title( '<h2 class="page-title">', '</h2>' ); ?>
					</header><!-- .entry-header -->

					<div class="entry-content">
					<?php
						the_content();

						wp_link_pages( array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'swarm' ),
							'after'  => '</div>',
						) );
					?>
					</div><!-- .entry-content -->
				</article><!-- #post-## -->
			</div>
		</div>
	</div>
</div>
