<?php

/**
 * Add inline css 
 *
 * 
 */
if (!function_exists('video_vlog_inline_css')) :
  function video_vlog_inline_css()
  {
    $video_vlog_intro_show = get_theme_mod('video_vlog_intro_show');

    $video_vlog_intro_img = get_theme_mod('video_vlog_intro_img');
    $style = '';

    if ($video_vlog_intro_img && $video_vlog_intro_show) {
      $style .= '.tx-has-banner-img{background-image:url(' . esc_url($video_vlog_intro_img) . ');}';
    }


    wp_add_inline_style('video-vlog-main-style', $style);
  }
  add_action('wp_enqueue_scripts', 'video_vlog_inline_css');
endif;
