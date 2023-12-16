<?php

/**
 * Video Vlog Theme Customizer
 *
 * @package Video Vlog
 */



/**
 * Add refresh support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function video_vlog_customize_register($wp_customize)
{
    $wp_customize->get_setting('blogname')->transport         = 'refresh';
    $wp_customize->get_setting('blogdescription')->transport  = 'refresh';
    $wp_customize->get_setting('header_textcolor')->transport = 'refresh';

    //select sanitization function
    function video_vlog_sanitize_select($input, $setting)
    {
        $input = sanitize_key($input);
        $choices = $setting->manager->get_control($setting->id)->choices;
        return (array_key_exists($input, $choices) ? $input : $setting->default);
    }
    function video_vlog_sanitize_image($file, $setting)
    {
        $mimes = array(
            'jpg|jpeg|jpe' => 'image/jpeg',
            'gif'          => 'image/gif',
            'png'          => 'image/png',
            'bmp'          => 'image/bmp',
            'tif|tiff'     => 'image/tiff',
            'ico'          => 'image/x-icon'
        );
        //check file type from file name
        $file_ext = wp_check_filetype($file, $mimes);
        //if file has a valid mime type return it, otherwise return default
        return ($file_ext['ext'] ? $file : $setting->default);
    }

    $wp_customize->add_setting('video_vlog_site_tagline_show', array(
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'default'       =>  '',
        'sanitize_callback' => 'absint',
        'transport'     => 'refresh',
    ));
    $wp_customize->add_control('video_vlog_site_tagline_show', array(
        'label'      => __('Hide Site Tagline Only? ', 'video-vlog'),
        'section'    => 'title_tagline',
        'settings'   => 'video_vlog_site_tagline_show',
        'type'       => 'checkbox',

    ));

    $wp_customize->add_panel('video_vlog_settings', array(
        'priority'       => 50,
        'title'          => __('Video Vlog Theme settings', 'video-vlog'),
        'description'    => __('All Video Vlog theme settings', 'video-vlog'),
    ));
    $wp_customize->add_section('video_vlog_header', array(
        'title' => __('Video Vlog Header Settings', 'video-vlog'),
        'capability'     => 'edit_theme_options',
        'description'     => __('Video Vlog theme header settings', 'video-vlog'),
        'panel'    => 'video_vlog_settings',

    ));
    $wp_customize->add_setting('video_vlog_header_style', array(
        'default'        => 'style2',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'video_vlog_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('video_vlog_header_style', array(
        'label'      => __('Header Style', 'video-vlog'),
        'description' => __('You can set the menu style one or two. ', 'video-vlog'),
        'section'    => 'video_vlog_header',
        'settings'   => 'video_vlog_header_style',
        'type'       => 'select',
        'choices'    => array(
            'style1' => __('Style One', 'video-vlog'),
            'style2' => __('Style Two', 'video-vlog'),
        ),
    ));
    // Header image text
    $wp_customize->add_setting('video_vlog_header_sicons_show', array(
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'default'       =>  0,
        'sanitize_callback' => 'absint',
        'transport' => 'refresh',

    ));
    $wp_customize->add_control('video_vlog_header_sicons_show', array(
        'label'      => __('Display header social icons', 'video-vlog'),
        'description'     => __('You can show header social by click the checkbox.', 'video-vlog'),
        'section'    => 'video_vlog_header',
        'settings'   => 'video_vlog_header_sicons_show',
        'type'       => 'checkbox',
    ));
    $wp_customize->add_setting('video_vlog_youtube', array(
        'default' =>  '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('video_vlog_youtube', array(
        'label'      => __('Youtube url', 'video-vlog'),
        'section'    => 'video_vlog_header',
        'settings'   => 'video_vlog_youtube',
        'type'       => 'url',
    ));
    $wp_customize->add_setting('video_vlog_facebook', array(
        'default' =>  '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('video_vlog_facebook', array(
        'label'      => __('Facebook url', 'video-vlog'),
        'section'    => 'video_vlog_header',
        'settings'   => 'video_vlog_facebook',
        'type'       => 'url',
    ));
    $wp_customize->add_setting('video_vlog_insta', array(
        'default' =>  '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('video_vlog_insta', array(
        'label'      => __('instagram url', 'video-vlog'),
        'section'    => 'video_vlog_header',
        'settings'   => 'video_vlog_insta',
        'type'       => 'url',
    ));
    $wp_customize->add_setting('video_vlog_vimeo_url', array(
        'default' =>  '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('video_vlog_vimeo_url', array(
        'label'      => __('Vimeo url', 'video-vlog'),
        'section'    => 'video_vlog_header',
        'settings'   => 'video_vlog_vimeo_url',
        'type'       => 'url',
    ));
    $wp_customize->add_setting('video_vlog_dailymotion_url', array(
        'default' =>  '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('video_vlog_dailymotion_url', array(
        'label'      => __('Dailymotion url', 'video-vlog'),
        'section'    => 'video_vlog_header',
        'settings'   => 'video_vlog_dailymotion_url',
        'type'       => 'url',
    ));

    $wp_customize->add_setting('video_vlog_twitter', array(
        'default' =>  '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('video_vlog_twitter', array(
        'label'      => __('Twitter url', 'video-vlog'),
        'section'    => 'video_vlog_header',
        'settings'   => 'video_vlog_twitter',
        'type'       => 'url',
    ));

    //Video Vlog Home intro
    $wp_customize->add_section('video_vlog_intro', array(
        'title' => __('Home Intro Settings', 'video-vlog'),
        'capability'     => 'edit_theme_options',
        'description'     => __('Portfoli profile Intro Settings', 'video-vlog'),
        'panel'    => 'video_vlog_settings',

    ));
    $wp_customize->add_setting('video_vlog_intro_show', array(
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'default'       =>  '',
        'sanitize_callback' => 'absint',
        'transport'     => 'refresh',
    ));
    $wp_customize->add_control('video_vlog_intro_show', array(
        'label'      => __('Show Header Intro? ', 'video-vlog'),
        'section'    => 'video_vlog_intro',
        'settings'   => 'video_vlog_intro_show',
        'type'       => 'checkbox',

    ));
    $wp_customize->add_setting('video_vlog_intro_img', array(
        'capability'        => 'edit_theme_options',
        'default'           => '',
        'sanitize_callback' => 'video_vlog_sanitize_image',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'video_vlog_intro_img',
        array(
            'label'    => __('Upload Profile Image', 'video-vlog'),
            'description'    => __('Image size should be 1800px width & 700px height for better view.', 'video-vlog'),
            'section'  => 'video_vlog_intro',
            'settings' => 'video_vlog_intro_img',
        )
    ));
    $wp_customize->add_setting('video_vlog_intro_subtitle', array(
        'default' => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('video_vlog_intro_subtitle', array(
        'label'      => __('Intro Subtitle', 'video-vlog'),
        'section'    => 'video_vlog_intro',
        'settings'   => 'video_vlog_intro_subtitle',
        'type'       => 'text',
    ));
    $wp_customize->add_setting('video_vlog_intro_title', array(
        'default' => __('Video Vlog', 'video-vlog'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('video_vlog_intro_title', array(
        'label'      => __('Intro Title', 'video-vlog'),
        'section'    => 'video_vlog_intro',
        'settings'   => 'video_vlog_intro_title',
        'type'       => 'text',
    ));
    $wp_customize->add_setting('video_vlog_intro_highlighted_title', array(
        'default' => __('Best WordPress Vlog Theme', 'video-vlog'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('video_vlog_intro_highlighted_title', array(
        'label'      => __('Highlighted Title', 'video-vlog'),
        'section'    => 'video_vlog_intro',
        'settings'   => 'video_vlog_intro_highlighted_title',
        'type'       => 'text',
    ));
    $wp_customize->add_setting('video_vlog_intro_desc', array(
        'default' => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'wp_kses_post',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('video_vlog_intro_desc', array(
        'label'      => __('Intro Description', 'video-vlog'),
        'section'    => 'video_vlog_intro',
        'settings'   => 'video_vlog_intro_desc',
        'type'       => 'textarea',
    ));
    $wp_customize->add_setting('video_vlog_btn_text_one', array(
        'default' => __('Explore Now', 'video-vlog'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('video_vlog_btn_text_one', array(
        'label'      => __('Button one text', 'video-vlog'),
        'section'    => 'video_vlog_intro',
        'settings'   => 'video_vlog_btn_text_one',
        'type'       => 'text',
    ));

    $wp_customize->add_setting('video_vlog_btn_url_one', array(
        'default' => '#primary',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('video_vlog_btn_url_one', array(
        'label'      => __('Button one url', 'video-vlog'),
        'description'      => __('Keep url empty for hide this button', 'video-vlog'),
        'section'    => 'video_vlog_intro',
        'settings'   => 'video_vlog_btn_url_one',
        'type'       => 'url',
    ));
    $wp_customize->add_setting('video_vlog_btn_text_two', array(
        'default'     => __('View Details', 'video-vlog'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('video_vlog_btn_text_two', array(
        'label'      => __('Button two text', 'video-vlog'),
        'section'    => 'video_vlog_intro',
        'settings'   => 'video_vlog_btn_text_two',
        'type'       => 'text',
    ));

    $wp_customize->add_setting('video_vlog_btn_url_two', array(
        'default' => '',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('video_vlog_btn_url_two', array(
        'label'      => __('Button two url', 'video-vlog'),
        'description'      => __('Keep url empty for hide this button', 'video-vlog'),
        'section'    => 'video_vlog_intro',
        'settings'   => 'video_vlog_btn_url_two',
        'type'       => 'text',
    ));

    //Video Vlog blog settings
    $wp_customize->add_section('video_vlog_blog', array(
        'title' => __('Video Vlog Blog Settings', 'video-vlog'),
        'capability'     => 'edit_theme_options',
        'description'     => __('Video Vlog theme blog settings', 'video-vlog'),
        'panel'    => 'video_vlog_settings',

    ));
    $wp_customize->add_setting('video_vlog_blog_container', array(
        'default'        => 'container',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'video_vlog_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('video_vlog_blog_container', array(
        'label'      => __('Container type', 'video-vlog'),
        'description' => __('You can set standard container or full width container. ', 'video-vlog'),
        'section'    => 'video_vlog_blog',
        'settings'   => 'video_vlog_blog_container',
        'type'       => 'select',
        'choices'    => array(
            'container' => __('Standard Container', 'video-vlog'),
            'container-fluid' => __('Full width Container', 'video-vlog'),
        ),
    ));
    $wp_customize->add_setting('video_vlog_blog_layout', array(
        'default'        => 'rightside',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'video_vlog_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('video_vlog_blog_layout', array(
        'label'      => __('Select Blog Layout', 'video-vlog'),
        'description' => __('Right and Left sidebar only show when sidebar widget is available. ', 'video-vlog'),
        'section'    => 'video_vlog_blog',
        'settings'   => 'video_vlog_blog_layout',
        'type'       => 'select',
        'choices'    => array(
            'rightside' => __('Right Sidebar', 'video-vlog'),
            'leftside' => __('Left Sidebar', 'video-vlog'),
            'fullwidth' => __('No Sidebar', 'video-vlog'),
        ),
    ));
    $wp_customize->add_setting('video_vlog_blog_style', array(
        'default'        => 'grid',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'video_vlog_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('video_vlog_blog_style', array(
        'label'      => __('Select Blog Style', 'video-vlog'),
        'section'    => 'video_vlog_blog',
        'settings'   => 'video_vlog_blog_style',
        'type'       => 'select',
        'choices'    => array(
            'classic' => __('Classic Style', 'video-vlog'),
            'grid' => __('Grid Style', 'video-vlog'),
            'list' => __('List Style', 'video-vlog'),
        ),
    ));
    //Video Vlog page settings
    $wp_customize->add_section('video_vlog_page', array(
        'title' => __('Video Vlog Page Settings', 'video-vlog'),
        'capability'     => 'edit_theme_options',
        'description'     => __('Video Vlog theme blog settings', 'video-vlog'),
        'panel'    => 'video_vlog_settings',

    ));
    $wp_customize->add_setting('video_vlog_page_container', array(
        'default'        => 'container',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'video_vlog_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('video_vlog_page_container', array(
        'label'      => __('Page Container type', 'video-vlog'),
        'description' => __('You can set standard container or full width container for page. ', 'video-vlog'),
        'section'    => 'video_vlog_page',
        'settings'   => 'video_vlog_page_container',
        'type'       => 'select',
        'choices'    => array(
            'container' => __('Standard Container', 'video-vlog'),
            'container-fluid' => __('Full width Container', 'video-vlog'),
        ),
    ));
    $wp_customize->add_setting('video_vlog_page_header', array(
        'default'        => 'show',
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'video_vlog_sanitize_select',
        'transport' => 'refresh',
    ));
    $wp_customize->add_control('video_vlog_page_header', array(
        'label'      => __('Show Page header', 'video-vlog'),
        'section'    => 'video_vlog_page',
        'settings'   => 'video_vlog_page_header',
        'type'       => 'select',
        'choices'    => array(
            'show' => __('Show all pages', 'video-vlog'),
            'hide-home' => __('Hide Only Front Page', 'video-vlog'),
            'hide' => __('Hide All Pages', 'video-vlog'),
        ),
    ));




    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial(
            'blogname',
            array(
                'selector'        => '.site-title a',
                'render_callback' => 'video_vlog_customize_partial_blogname',
            )
        );
        $wp_customize->selective_refresh->add_partial(
            'blogdescription',
            array(
                'selector'        => '.site-description',
                'render_callback' => 'video_vlog_customize_partial_blogdescription',
            )
        );
    }
}
add_action('customize_register', 'video_vlog_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function video_vlog_customize_partial_blogname()
{
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function video_vlog_customize_partial_blogdescription()
{
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function video_vlog_customize_preview_js()
{
    wp_enqueue_script('video-vlog-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array('customize-preview'), VIDEO_VLOG_VERSION, true);
}
add_action('customize_preview_init', 'video_vlog_customize_preview_js');
