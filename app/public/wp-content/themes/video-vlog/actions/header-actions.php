<?php

/**
 * The file for header all actions
 *
 *
 * @package Video Vlog
 */


function video_vlog_header_logo_output()
{
	$video_vlog_site_tagline_show = get_theme_mod('video_vlog_site_tagline_show');

?>

	<?php if (has_custom_logo()) : ?>
		<div class="site-branding brand-logo">
			<?php
			the_custom_logo();
			?>
		</div>
	<?php endif; ?>
	<?php
	if (display_header_text() == true || (display_header_text() == true && is_customize_preview())) : ?>
		<div class="site-branding brand-text">
			<?php if (display_header_text() == true || (display_header_text() == true && is_customize_preview())) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
				<?php
				$video_vlog_description = get_bloginfo('description', 'display');
				if (($video_vlog_description || is_customize_preview()) && empty($video_vlog_site_tagline_show)) :
				?>
					<p class="site-description"><?php echo $video_vlog_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped 
												?></p>
				<?php endif; ?>
			<?php endif; ?>

		</div><!-- .site-branding -->
	<?php endif; ?>

<?php
}
add_action('video_vlog_header_logo', 'video_vlog_header_logo_output');




// header style one
function video_vlog_header_style_two()
{

	$video_vlog_header_sicons_show = get_theme_mod('video_vlog_header_sicons_show', 1);
	$video_vlog_youtube = get_theme_mod('video_vlog_youtube');
	$video_vlog_facebook = get_theme_mod('video_vlog_facebook');
	$video_vlog_insta = get_theme_mod('video_vlog_insta');
	$video_vlog_vimeo = get_theme_mod('video_vlog_vimeo_url');
	$video_vlog_dailymotion = get_theme_mod('video_vlog_dailymotion_url');
	$video_vlog_twitter = get_theme_mod('video_vlog_twitter');

?>
	<div class="pxm-style2">
		<div class="logobar">
			<div class="container">
				<div class="d-flex topbar-row">
					<div class="pxms1-logo">
						<?php do_action('video_vlog_header_logo'); ?>
					</div>
					<?php video_vlog_search_form(); ?>
					<?php if ($video_vlog_header_sicons_show) : ?>
						<ul class="vh-social">
							<?php if ($video_vlog_youtube) : ?>
								<li><a href="<?php echo esc_url($video_vlog_youtube); ?>" target="_blank"><i class="fab fa-youtube"></i></a></li>
							<?php endif; ?>
							<?php if ($video_vlog_facebook) : ?>
								<li><a href="<?php echo esc_url($video_vlog_facebook); ?>" target="_blank"><i class="fab fa-facebook"></i></a></li>
							<?php endif; ?>
							<?php if ($video_vlog_insta) : ?>
								<li><a href="<?php echo esc_url($video_vlog_insta); ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
							<?php endif; ?>
							<?php if ($video_vlog_vimeo) : ?>
								<li><a href="<?php echo esc_url($video_vlog_vimeo); ?>" target="_blank"><i class="fab fa-vimeo"></i></a></li>
							<?php endif; ?>
							<?php if ($video_vlog_dailymotion) : ?>
								<li><a href="<?php echo esc_url($video_vlog_dailymotion); ?>" target="_blank"><i class="fab fa-dailymotion"></i></a></li>
							<?php endif; ?>
							<?php if ($video_vlog_twitter) : ?>
								<li><a href="<?php echo esc_url($video_vlog_twitter); ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
							<?php endif; ?>

						</ul>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<div class="vhs1-navigation">
			<div class="container">
				<div class="pxms1-menu ms-auto">
					<?php do_action('video_vlog_main_menu'); ?>
				</div>
			</div>
		</div>
	</div>


<?php
}
add_action('video_vlog_header_style_two', 'video_vlog_header_style_two');

// header style one
function video_vlog_header_style_one()
{

?>
	<div class="video-vlog-logo-section">
		<div class="container">
			<div class="head-logo-sec">
				<?php do_action('video_vlog_header_logo'); ?>
			</div>
		</div>
	</div>

	<div class="menu-bar text-center">
		<div class="container">
			<div class="video-vlog-container menu-inner">
				<?php do_action('video_vlog_main_menu'); ?>
			</div>
		</div>
	</div>
<?php
}
add_action('video_vlog_header_style_one', 'video_vlog_header_style_one');

// Video Vlog mene style
function video_vlog_header_menu_output()
{
?>
	<nav id="site-navigation" class="main-navigation">
		<?php
		wp_nav_menu(array(
			'theme_location' => 'main-menu',
			'menu_id'        => 'video-vlog-menu',
			'menu_class'        => 'video-vlog-menu',
		));
		?>
	</nav><!-- #site-navigation -->
<?php
}
add_action('video_vlog_main_menu', 'video_vlog_header_menu_output');

// Video Vlog mobile mene style
function video_vlog_mobile_menu_output()
{
?>
	<div class="mobile-menu-bar">
		<div class="container">
			<div class="mbar-inner">
				<div class="mlogo">
					<?php do_action('video_vlog_header_logo'); ?>
				</div>
				<div class="menu-search">
					<nav id="mobile-navigation" class="mobile-navigation">
						<button id="mmenu-btn" class="menu-btn" aria-expanded="false">
							<span class="mopen"><?php esc_html_e('Menu', 'video-vlog'); ?></span>
							<span class="mclose"><?php esc_html_e('Close', 'video-vlog'); ?></span>
						</button>
						<?php
						wp_nav_menu(array(
							'theme_location' => 'main-menu',
							'menu_id'        => 'wsm-menu',
							'menu_class'        => 'wsm-menu',
						));
						?>
					</nav><!-- #site-navigation -->
					<div id="miSearch" class="mi-search" tabindex="0" role="button"><i class="fas fa-search"></i></div>
				</div>
			</div>
			<div id="vhSearch" class="vsearch-hide">
				<?php video_vlog_search_form(); ?>
				<i id="miRSearch" class="fas fa-times" tabindex="0" role="button"></i>
			</div>
		</div>
	</div>

<?php
}
add_action('video_vlog_mobile_menu', 'video_vlog_mobile_menu_output');
