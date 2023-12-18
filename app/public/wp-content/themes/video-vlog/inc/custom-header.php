<?php

/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Video Vlog
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses video_vlog_header_style()
 */
function video_vlog_custom_header_setup()
{
	add_theme_support(
		'custom-header',
		apply_filters(
			'video_vlog_custom_header_args',
			array(
				'default-image'      => '',
				'default-text-color' => '000000',
				'width'              => 1800,
				'height'             => 250,
				'flex-height'        => true,
			)
		)
	);
}
add_action('after_setup_theme', 'video_vlog_custom_header_setup');