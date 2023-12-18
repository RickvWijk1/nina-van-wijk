<?php

/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Video Vlog
 */

$video_vlog_blog_container = get_theme_mod('video_vlog_blog_container', 'container');
$video_vlog_blog_layout = get_theme_mod('video_vlog_blog_layout', 'rightside');
if (is_active_sidebar('sidebar-1') && $video_vlog_blog_layout != 'fullwidth') {
	$video_vlog_blog_column = 'col-lg-9';
} else {
	$video_vlog_blog_column = 'col-lg-12';
}
get_header();
?>

<div class="<?php echo esc_attr($video_vlog_blog_container); ?> mt-5 mb-5 pt-2 pb-2">
	<div class="row">
		<?php if (is_active_sidebar('sidebar-1') && $video_vlog_blog_layout == 'leftside') : ?>
			<div class="col-lg-3">
				<?php get_sidebar(); ?>
			</div>
		<?php endif; ?>
		<div class="<?php echo esc_attr($video_vlog_blog_column); ?>">
			<main id="primary" class="site-main">
				<?php if (have_posts()) : ?>

					<header class="page-header search-header p-2 mb-5">
						<h1 class="page-title">
							<?php
							/* translators: %s: search query. */
							printf(esc_html__('Search Results for: %s', 'video-vlog'), '<span>' . get_search_query() . '</span>');
							?>
						</h1>
					</header><!-- .page-header -->
					<div class="row" data-masonry='{"percentPosition": true }'>
						<?php
						/* Start the Loop */
						while (have_posts()) :
							the_post();

							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							get_template_part('template-parts/content', 'grid');

						endwhile;
						?>
					</div>
				<?php

					the_posts_pagination();

				else :

					get_template_part('template-parts/content', 'none');

				endif;
				?>

			</main><!-- #main -->
		</div>
		<?php if (is_active_sidebar('sidebar-1') && $video_vlog_blog_layout == 'rightside') : ?>
			<div class="col-lg-3">
				<?php get_sidebar(); ?>
			</div>
		<?php endif; ?>
	</div>
</div>

<?php
get_footer();