<?php

function logo_slider( $atts ) {

	$options = shortcode_atts(array(
		'visible' => 8,
		'prev' => 'logo-prev',
		'next' => 'logo-next',
		'speed' => 500
	), $atts);

	$args = array('post_type' => 'sponsor_logo', 'posts_per_page' => -1);

	$logos = new WP_Query($args);

	if ($logos->have_posts()) :

		$output = '';

		$output .= '<div class="logo-slider">';

		$output .= '<div class="logo-slider__prev ' . $options['prev'] . '"><div class="flex flex--center"><span class="sprite arrow arrow--prev">Prev</span></div></div>';

		$output .= '<div class="logo-slider__slideshow">';

		$output .= '<div class="slick-slideshow" />';

		while ($logos->have_posts()) :

			$logos->the_post();

			$img = get_the_post_thumbnail(get_the_ID());

			$output .= '<div class="logo-slider__slide" data-slide-id="' . get_the_ID() . '">';

			$link = get_post_meta(get_the_ID(), 'sponsor_link', true);

			$target = get_post_meta(get_the_ID(), 'sponsor_link_target', true);

			$output .= '<a href="' . $link . '" target="' . $target . '">';

			$output .= $img;

			$output .= '</a></div>';

		endwhile;

		$output .= '</div>';

		$output .= '</div>';

		$output .= '<div class="logo-slider__next ' . $options['next'] . '"><div class="flex flex--center"><span class="sprite arrow arrow--next">Next</span></div></div>';

		$output .= '</div>';

		$output .= '<script>(function($) { $(document).ready(function() { $(".slick-slideshow").slick({ prevArrow: $(".logo-slider .logo-slider__prev"), nextArrow: $(".logo-slider .logo-slider__next"), dots: false, infinite: true, speed: ' . $options['speed'] . ', slidesToShow: 4, autoplay: true, autoplaySpeed: 1000, slidesToScroll: 1, responsive: [ { breakpoint: 767, settings: { slidesToShow: 4 } } ] }); }); })(jQuery);</script>';

	else :

		$output = '<div class="logo-slider-empty"><p class="alert alert-danger">';
		$output .= _e('No logos have been added!', 'swarm');
		$output .= '</p></div>';

	endif;

	wp_reset_postdata();

	return $output;

}

add_shortcode('logo_slider', 'logo_slider');

function post_grid( $atts ) {

	$options = shortcode_atts(array(
		'post_type' => 'post',
		'total_posts' => -1,
		'meta_tags' => ''
	), $atts);

	$args = array('post_type' => $options['post_type'], 'posts_per_page' => $options['total_posts']);

	$posts = new WP_Query($args);

	if ($posts->have_posts()) :

		$output = '';

		$output .= '<div class="post-grid">';

		$counter = 0;

		while ($posts->have_posts()) : $posts->the_post();

			if ($counter % 3 == 0) $output .= '<div class="row">';

			$output .= '<div class="col-md-4">';

			$id = get_post_thumbnail_id(get_the_ID());

			$srcset = wp_get_attachment_image_srcset($id);

			$large = wp_get_attachment_image_src($id, 'large');

			$thumb = get_the_post_thumbnail(get_the_ID());

			$output .= '<a class="post-grid__link" href="' . $large[0] . '" data-srcset="' . $srcset . '" data-fancybox >';

			$output .= $thumb;

			$output .= '</a>';

			$output .= '<span class="post-grid__name">' . get_the_title() . '</span>';

			if ($options['meta_tags'] != '') :

				$meta_tags = explode(',', $options['meta_tags']);

				foreach($meta_tags as $meta_tag) :

					$meta = get_post_meta(get_the_ID(), $meta_tag, true);

					$output .= '<span class="post-grid__meta">' . $meta . '</span>';

				endforeach;

			endif;

			$output .= '</div>';

			$counter++;

			if ($counter % 3 == 0) $output .= '</div>';

		endwhile;

		if ($counter % 3 != 0) $output .= '</div>';

		$output .= '</div>';

	endif;

	wp_reset_postdata();

	return $output;

}

add_shortcode('post_grid', 'post_grid');