<?php

/**
 * The template for Custom search style
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy
 *
 * @package Video Vlog
 */

?>
<form method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
	<label>
		<span class="screen-reader-text"><?php esc_html_e('Search for:', 'video-vlog'); ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Search...', 'placeholder', 'video-vlog'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	</label>
	<button type="submit" class="search-submit"><i class="fas fa-search"></i></button>
</form>