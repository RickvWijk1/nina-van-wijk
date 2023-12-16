<?php
/*
*
* Home intro section for Video Vlog section
*
*
*/



function video_vlog_intro_section_output()
{
  $video_vlog_intro_show = get_theme_mod('video_vlog_intro_show');
  if (!$video_vlog_intro_show) {
    return;
  }

  $video_vlog_intro_img = get_theme_mod('video_vlog_intro_img');
  $video_vlog_intro_subtitle = get_theme_mod('video_vlog_intro_subtitle');
  $video_vlog_intro_title = get_theme_mod('video_vlog_intro_title', __('Video Vlog', 'video-vlog'));
  $video_vlog_intro_highlighted_title = get_theme_mod('video_vlog_intro_highlighted_title', __('Best WordPress Vlog Theme', 'video-vlog'));
  $video_vlog_intro_desc = get_theme_mod('video_vlog_intro_desc');
  $video_vlog_btn_text_one = get_theme_mod('video_vlog_btn_text_one', __('Explore Now', 'video-vlog'));
  $video_vlog_btn_url_one = get_theme_mod('video_vlog_btn_url_one', '#primary');
  $video_vlog_btn_text_two = get_theme_mod('video_vlog_btn_text_two', __('View Details', 'video-vlog'));
  $video_vlog_btn_url_two = get_theme_mod('video_vlog_btn_url_two');

  if ($video_vlog_intro_img) {
    $video_vlog_intro_hasimg = 'has-banner-img';
  } else {
    $video_vlog_intro_hasimg = 'no-banner-img';
  }

?>
  <!-- home -->
  <section class="home tx-hbanner tx-<?php echo esc_attr($video_vlog_intro_hasimg); ?>" id="home">
    <div class="container">
      <div class="home-all-content">
        <div class="content">
          <?php if ($video_vlog_intro_subtitle) : ?>
            <h5><?php echo esc_html($video_vlog_intro_subtitle); ?></h5>
          <?php endif; ?>
          <?php if ($video_vlog_intro_title) : ?>
            <h1><?php echo esc_html($video_vlog_intro_title); ?> <br><span id="type1"><?php echo esc_html($video_vlog_intro_highlighted_title); ?></span></h1>
          <?php endif; ?>
          <?php if ($video_vlog_intro_desc) : ?>
            <p><?php echo esc_html($video_vlog_intro_desc); ?></p>
          <?php endif; ?>
          <?php if ($video_vlog_btn_url_one || $video_vlog_btn_url_two) : ?>
            <div class="pc-intro-btns">
              <?php if ($video_vlog_btn_url_one) : ?>

                <a href="<?php echo esc_url($video_vlog_btn_url_one); ?>" class="btn btn-hero hero-btn1"><?php echo esc_html($video_vlog_btn_text_one); ?></a>
              <?php endif; ?>
              <?php if ($video_vlog_btn_url_two) : ?>
                <a href="<?php echo esc_url($video_vlog_btn_url_two); ?>" class="btn btn-hero hero-btn2"><?php echo esc_html($video_vlog_btn_text_two); ?></a>
              <?php endif; ?>
            </div>
          <?php endif; ?>
        </div>

      </div>
    </div>
  </section>

<?php
}
add_action('video_vlog_profile_intro', 'video_vlog_intro_section_output');
