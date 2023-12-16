<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Video Vlog
 */
$video_vlog_blog_style = get_theme_mod('video_vlog_blog_style', 'grid');
if ($video_vlog_blog_style == 'grid' && !is_single()) :
	get_template_part('template-parts/content', 'grid');
elseif ($video_vlog_blog_style == 'list' && !is_single()) :
	get_template_part('template-parts/content', 'list');
else :

	$video_vlog_categories = get_the_category();
	if ($video_vlog_categories) {
		$video_vlog_category = $video_vlog_categories[mt_rand(0, count($video_vlog_categories) - 1)];
	} else {
		$video_vlog_category = '';
	}

?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('myf-classic'); ?>>
		<div class="xpost-item pb-4 mb-5">
			<?php video_vlog_post_thumbnail(); ?>
			<div class="xpost-text p-3">
				<header class="entry-header pb-4">
					<?php
					if (is_singular()) :
						the_title('<h1 class="entry-title">', '</h1>');
					else :
						the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
					endif;


					if ('post' === get_post_type()) :
					?>
						<div class="entry-meta">
							<?php if (!empty($video_vlog_category) && !is_single()) : ?>
								<a class="blog-categrory" href="<?php echo esc_url(get_category_link($video_vlog_category)); ?>"><?php echo esc_html($video_vlog_category->name); ?></a>
							<?php endif; ?>
							<?php video_vlog_posted_on(); ?>
						</div><!-- .entry-meta -->
					<?php endif; ?>
				</header><!-- .entry-header -->

				<div class="entry-content">
					<?php
					if (is_single()) {
						the_content(
							sprintf(
								wp_kses(
									/* translators: %s: Name of current post. Only visible to screen readers */
									__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'video-vlog'),
									array(
										'span' => array(
											'class' => array(),
										),
									)
								),
								wp_kses_post(get_the_title())
							)
						);

						wp_link_pages(
							array(
								'before' => '<div class="page-links">' . esc_html__('Pages:', 'video-vlog'),
								'after'  => '</div>',
							)
						);
					} else {
						the_excerpt();
					?>
						<a class="read-more-btn" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More ', 'video-vlog'); ?></a>
					<?php
					}

					?>
				</div><!-- .entry-content -->
				<?php if (is_single()) : ?>
					<footer class="entry-footer">
						<?php video_vlog_entry_footer(); ?>
					</footer><!-- .entry-footer -->
				<?php endif; ?>
			</div>
		</div>
	</article><!-- #post-<?php the_ID(); ?> -->
<?php endif; ?>