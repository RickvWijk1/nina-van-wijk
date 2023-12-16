<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Video Vlog
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function video_vlog_body_classes($classes)
{
	// Adds a class of hfeed to non-singular pages.
	if (!is_singular()) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if (!is_active_sidebar('sidebar-1')) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter('body_class', 'video_vlog_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function video_vlog_pingback_header()
{
	if (is_singular() && pings_open()) {
		printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
	}
}
add_action('wp_head', 'video_vlog_pingback_header');


function video_vlog_get_youtube_video_id($url)
{
	$video_id = '';
	parse_str(parse_url($url, PHP_URL_QUERY), $query_params);
	if (isset($query_params['v'])) {
		$video_id = $query_params['v'];
	} elseif (preg_match('/youtu\.be\/([\w-]+)/', $url, $matches)) {
		$video_id = $matches[1];
	}
	return $video_id;
}


function video_vlog_get_first_youtube_url($id)
{
	$youtube_url = '';
	$post_content = get_the_content($id);
	// Regular expression pattern to match YouTube URLs
	$pattern = '/https?:\/\/(?:www\.)?(?:youtube\.com\/watch\?v=|youtu\.be\/)([\w-]+)/';
	// Perform the regular expression match
	preg_match($pattern, $post_content, $matches);

	// Check if a match was found
	if (isset($matches[0])) {
		// The first YouTube URL found in the content
		$video_id = video_vlog_get_youtube_video_id($matches[0]);
		$youtube_url = '//www.youtube.com/embed/' . $video_id;
	}
	return $youtube_url;
}
