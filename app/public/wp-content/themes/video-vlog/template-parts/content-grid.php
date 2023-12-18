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
$video_vlog_blog_layout = get_theme_mod('video_vlog_blog_layout', 'rightside');

if (is_active_sidebar('sidebar-1') && $video_vlog_blog_layout != 'fullwidth') {
	$video_vlog_grid_column = 'col-lg-6';
} else {
	$video_vlog_grid_column = 'col-lg-4';
}
$video_vlog_video_url = video_vlog_get_first_youtube_url(get_the_ID());
$video_vlog_content_imgurl = video_vlog_get_first_image_from_content();

?>
<div class="<?php echo esc_attr($video_vlog_grid_column); ?> mb-4">
	<article id="post-<?php the_ID(); ?>" <?php post_class('video-vlog-list-item'); ?>>
		<div class="grid-blog-item">
			<?php if ($video_vlog_video_url) : ?>
				<div class="iframe-container">
					<iframe class="responsive-iframe" src="<?php echo esc_url($video_vlog_video_url); ?>" frameborder="0" allowfullscreen></iframe>
				</div>
			<?php elseif (has_post_thumbnail()) : ?>
				<div class="grid-img">
					<?php video_vlog_post_thumbnail(); ?>
				</div>
			<?php elseif ($video_vlog_content_imgurl) : ?>
				<div class="grid-img">
					<img src="<?php echo esc_url($video_vlog_content_imgurl); ?>" alt="<?php echo esc_html(get_the_title()); ?>">
				</div>
			<?php endif; ?>
			<div class="grid-deatls p-3">
				<div class="ghead-deatls">
					<?php video_vlog_author_img('40'); ?>
					<div class="ghead-dinner">
						<?php the_title('<h2 class="entry-title grid-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
						if ('post' === get_post_type()) :
						?>
							<div class="entry-meta">
								<?php if (!empty($video_vlog_category) && !is_single()) : ?>
									<a class="blog-categrory" href="<?php echo esc_url(get_category_link($video_vlog_category)); ?>"><?php echo esc_html($video_vlog_category->name); ?></a>
								<?php endif; ?>
								<?php video_vlog_posted_on(); ?>
							</div><!-- .entry-meta -->
						<?php endif; ?>
					</div>

				</div>

			</div>
		</div>
	</article><!-- #post-<?php the_ID(); ?> -->
</div>