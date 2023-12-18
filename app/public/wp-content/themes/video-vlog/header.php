<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Video Vlog
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<?php
	$video_vlog_header_style = get_theme_mod('video_vlog_header_style', 'style2');
	?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'video-vlog'); ?></a>
		<header id="masthead" class="site-header px-h<?php echo esc_attr($video_vlog_header_style); ?>">
			<?php if (has_header_image()) : ?>
				<div class="header-img">
					<?php the_header_image_tag(); ?>
				</div>
			<?php endif; ?>
			<?php do_action('video_vlog_mobile_menu'); ?>
			<div class="menu-deskbar">
				<?php

				if ($video_vlog_header_style == 'style1') {
					do_action('video_vlog_header_style_one');
				} else {
					do_action('video_vlog_header_style_two');
				}
				?>
			</div>

		</header><!-- #masthead -->

		<?php
		if (is_home() || is_front_page()) {
			do_action('video_vlog_profile_intro');
		}

		?>