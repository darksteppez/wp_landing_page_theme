<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package swarm
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<div class="col-lg-6">
				<div class="social-footer">
					<span class="social-callout"><?php _e('Stay Connected', 'swarm') ?></span>
					<ul class="social-footer__list">
						<li class="social-footer__item"><a href="https://twitter.com/" title="Follow us on Twitter" target="_blank"><span class="social-footer__logo fa fa-twitter fa-2x"></span></a></li>
						<li class="social-footer__item"><a href="https://www.facebook.com/" title="Like us on Facebook" target="_blank"><span class="social-footer__logo fa fa-facebook fa-2x"></span></a></li>
						<li class="social-footer__item"><a href="https://www.instagram.com/" title="Check out our Instagram" target="_blank"><span class="social-footer__logo fa fa-instagram fa-2x"></span></a></li>
						<li class="social-footer__item"><a href="#" data-toggle="modal" data-target="#footerContactModal" title="Email Us"><span class="social-footer__logo fa fa-envelope-o fa-2x"></span></a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-6">
				<p class="copyright"><span class="copyright__year">&copy; <?php echo date('Y') ?></span> <a href="http://localhost/" target="_blank"><img class="img-responsive" src="<?php echo get_template_directory_uri() ?>/img/logo.png" width="76" height="25" alt="Copyright Title"></a> <span class="copyright__tag">Copyright Title</span></p>
			</div>
		</div>
	</footer><!-- #colophon -->

	<!-- contact form modal -->
	<div class="modal fade" id="footerContactModal" tabindex="-1" role="dialog">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel"><?php _e('Contact Us', 'swarm') ?></h4>
				</div>
				<div class="modal-body">
					<?php echo do_shortcode('[contact-form-7 id="27" title="Contact form 1"]') ?>
				</div>
			</div>
		</div>
	</div>

	<!-- newsletter modal -->
	<div class="modal fade" id="footerNewsletterModal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title text-center"><?php _e('CALL TO ACTION TITLE', 'swarm') ?></h4>
					<img class="img-responsive image-center" src="<?php echo get_template_directory_uri() ?>/img/logo.png" alt="<?php bloginfo('name') ?>" width="272" height="147">
				</div>
				<div class="modal-body">
					<form id="newsletter-modal" name="newsletter-modal" class="newsletter" action="http://promo.swarmmail.com/u/register.php">
						<div class="newsletter__input-group">
							<input type="email" name="inp_3" class="newsletter__email" placeholder="Your Email">
							<input type="hidden" name="CID" value="765075744">
							<input type="hidden" name="SID" value="">
							<input type="hidden" name="UID" value="">
							<input type="hidden" name="f" value="1052">
							<input type="hidden" name="p" value="2">
							<input type="hidden" name="a" value="r">
							<input type="hidden" name="el" value="">
							<input type="hidden" name="endlink" value="<?php echo site_url() ?>/success/">
							<input type="hidden" name="llid" value="">
							<input type="hidden" name="c" value="">
							<input type="hidden" name="counted" value="">
							<input type="hidden" name="RID" value="">
							<input type="hidden" name="mailnow" value="">
							<input type="hidden" name="beer_festivals" value="Yes">
							<input type="submit" name="newsletter__submit" class="newsletter__submit" value="UNLOCK">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
