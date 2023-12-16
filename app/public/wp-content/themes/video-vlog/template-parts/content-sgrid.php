<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Video Vlog
 */
$video_vlog_categories = get_the_category();
if ($video_vlog_categories) {
	$video_vlog_category = $video_vlog_categories[mt_rand(0, count($video_vlog_categories) - 1)];
} else {
	$video_vlog_category = '';
}
$video_vlog_video_url = video_vlog_get_first_youtube_url(get_the_ID());
$video_vlog_blog_layout = get_theme_mod('video_vlog_blog_layout', 'rightside');

if (is_active_sidebar('sidebar-1') || $video_vlog_blog_layout != 'fullwidth') {
	$video_vlog_grid_column = 'col-lg-6';
} else {
	$video_vlog_grid_column = 'col-lg-4';
}
?>
<div class="<?php echo esc_attr($video_vlog_grid_column); ?> mb-4">
	<article id="post-<?php the_ID(); ?>" <?php post_class('myf-classic'); ?>>
		<div class="xpost-item py-4 mb-4">
			<div class="xpost-text p-3">
				<header class="entry-header pb-4 text-center">
					<?php if ('post' === get_post_type() && !empty($video_vlog_category) && !is_single()) : ?>
						<a class="blog-categrory" href="<?php echo esc_url(get_category_link($video_vlog_category)); ?>"><?php echo esc_html($video_vlog_category->name); ?></a>
					<?php endif; ?>
					<?php
					the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');

					if ('post' === get_post_type()) :
					?>
						<div class="entry-meta">
							<?php video_vlog_posted_on(); ?>
						</div><!-- .entry-meta -->
					<?php endif; ?>
				</header><!-- .entry-header -->
				<?php if ($video_vlog_video_url) : ?>
					<div class="iframe-container mb-3">
						<iframe class="responsive-iframe" src="<?php echo esc_url($video_vlog_video_url); ?>" frameborder="0" allowfullscreen></iframe>
					</div>
				<?php elseif (has_post_thumbnail()) : ?>
					<div class="grid-img">
						<a href="<?php the_permalink(); ?>">
							<?php video_vlog_post_thumbnail(); ?>
						</a>
					</div>
				<?php endif; ?>

				<div class="entry-content sgrid-content">
					<?php the_excerpt(); ?>
					<a class="read-more-btn" href="<?php the_permalink(); ?>"><?php esc_html_e('View Details', 'video-vlog'); ?></a>
				</div><!-- .entry-content -->
			</div>
		</div>
	</article><!-- #post-<?php the_ID(); ?> -->
</div>