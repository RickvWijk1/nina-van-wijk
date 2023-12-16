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
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('video-vlog-list-item'); ?>>
	<div class="video-vlog-item video-vlog-text-list shadow-sm mb-5 <?php if (has_post_thumbnail()) : ?>has-thumbnail<?php endif; ?>">
		<div class="row">
			<?php if (has_post_thumbnail()) : ?>
				<div class="col-lg-6">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail('medium_large'); ?>
					</a>
				</div>
				<div class="col-lg-6">
				<?php else : ?>
					<div class="col-lg-12 pb-3 pt-3">
					<?php endif; ?>
					<div class="video-vlog-text p-3">
						<div class="video-vlog-text-inner">
							<div class="grid-head">
								<span class="ghead-meta list-meta">
									<?php if ('post' === get_post_type() && !empty($video_vlog_category)) : ?>
										<a href="<?php echo esc_url(get_category_link($video_vlog_category)); ?>"><?php echo esc_html($video_vlog_category->name . ' - '); ?></a>
									<?php endif; ?>
									<?php echo esc_html(get_the_date()); ?>
								</span>
								<?php the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>'); ?>
								<?php if ('post' === get_post_type()) :
								?>
									<div class="list-meta list-author">
										<?php video_vlog_posted_by(); ?>
									</div><!-- .entry-meta -->
								<?php endif; ?>
								<?php the_excerpt(); ?>
							</div>

						</div>
					</div>
					</div>
				</div>

		</div>
</article><!-- #post-<?php the_ID(); ?> -->