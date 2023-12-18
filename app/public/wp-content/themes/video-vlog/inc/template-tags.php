<?php

/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Video Vlog
 */

if (!function_exists('video_vlog_posted_on')) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function video_vlog_posted_on()
	{
		if (!empty(get_the_modified_date())) {
			$time_string = '<time class="updated" datetime="%3$s">%4$s</time>';
		} else {
			$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr(get_the_date(DATE_W3C)),
			esc_html(get_the_date()),
			esc_attr(get_the_modified_date(DATE_W3C)),
			esc_html(get_the_modified_date())
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x('- %s', 'post date', 'video-vlog'),
			'<a href="' . esc_url(get_permalink()) . '" rel="bookmark">' . $time_string . '</a>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if (!function_exists('video_vlog_posted_by')) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function video_vlog_posted_by()
	{
		$byline = sprintf(
			'<span class="author vcard"><a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . esc_html(get_the_author()) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if (!function_exists('video_vlog_entry_footer')) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function video_vlog_entry_footer()
	{
		// Hide category and tag text for pages.
		if ('post' === get_post_type()) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list(esc_html__(', ', 'video-vlog'));
			if ($categories_list) {
				/* translators: 1: list of categories. */
				printf('<span class="cat-links">' . esc_html__('Posted in: %1$s', 'video-vlog') . '</span>', $categories_list); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', 'video-vlog'));
			if ($tags_list) {
				/* translators: 1: list of tags. */
				printf('<span class="tags-links">' . esc_html__('Tagged: %1$s', 'video-vlog') . '</span>', $tags_list); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

		if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__('Leave a Comment<span class="screen-reader-text"> on %s</span>', 'video-vlog'),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post(get_the_title())
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__('Edit <span class="screen-reader-text">%s</span>', 'video-vlog'),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post(get_the_title())
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if (!function_exists('video_vlog_post_thumbnail')) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function video_vlog_post_thumbnail()
	{
		if (post_password_required() || is_attachment() || !has_post_thumbnail()) {
			return;
		}

		if (is_singular()) :
?>

			<div class="post-thumbnail mb-3">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>">
				<?php
				the_post_thumbnail(
					'post-thumbnail',
					array(
						'alt' => the_title_attribute(
							array(
								'echo' => false,
							)
						),
					)
				);
				?>
			</a>

	<?php
		endif; // End is_singular().
	}
endif;



if (!function_exists('video_vlog_author_img')) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function video_vlog_author_img($size = 100, $link = true)
	{
		$allowed_html = array(
			'img' => array(
				'src' => true,
				'alt' => true,
				'srcset' => true,
				'width' => true,
				'height' => true,
				'loading' => true,
				'decoding' => true,
				'class' => true
			)
		);
		$author_id = get_the_author_meta('ID');
		$author_avatar = get_avatar($author_id, $size);
		$author_archive_link = get_author_posts_url($author_id);
		echo '<div class="author-avatar">';
		if ($link == true) {
			echo '<a href="' . esc_url($author_archive_link) . '">' . wp_kses($author_avatar, $allowed_html) . '</a>';
		} else {
			echo wp_kses($author_avatar, $allowed_html);
		}
		echo '</div>';
	}
endif;

if (!function_exists('wp_body_open')) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open()
	{
		do_action('wp_body_open');
	}
endif;



function video_vlog_search_form($cid = 'vh-search')
{
	?>
	<div id="<?php echo esc_attr($cid); ?>" class="vh-search">
		<?php get_search_form(); ?>
	</div>



<?php
}


function video_vlog_get_first_image_from_content()
{
	$content = get_the_content();
	// Get all image tags from the post content
	preg_match_all('/<img[^>]+>/i', $content, $matches);

	if (isset($matches[0][0])) {
		preg_match('/src="([^"]+)"/', $matches[0][0], $image_src);
		if (isset($image_src[1])) {
			return $image_src[1];
		}
	}

	return '';
}
