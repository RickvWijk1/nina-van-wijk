<?php

/**
 * About setup
 *
 * @package Video Vlog
 */

require_once trailingslashit(get_template_directory()) . 'inc/about/class.about.php';

if (!function_exists('video_vlog_about_setup')) :

	/**
	 * About setup.
	 *
	 * @since 1.0.0
	 */
	function video_vlog_about_setup()
	{
		$theme = wp_get_theme();
		$xtheme_name = $theme->get('Name');
		$xtheme_domain = $theme->get('TextDomain');




		$config = array(
			// Menu name under Appearance.
			'menu_name'               => sprintf(esc_html__('%s Info', 'video-vlog'), $xtheme_name),
			// Page title.
			'page_name'               => sprintf(esc_html__('%s Info', 'video-vlog'), $xtheme_name),
			/* translators: Main welcome title */
			'welcome_title'         => sprintf(esc_html__('Welcome to %s! - Version ', 'video-vlog'), $theme['Name']),
			// Main welcome content
			// Welcome content.
			'welcome_content' => sprintf(esc_html__('%1$s is now installed and ready to use. We want to make sure you have the best experience using the theme and that is why we gathered here all the necessary information for you. Thanks for using our theme!', 'video-vlog'), $theme['Name']),

			// Tabs.
			'tabs' => array(
				'getting_started' => esc_html__('Getting Started', 'video-vlog'),
				'recommended_actions' => esc_html__('Recommended Actions', 'video-vlog'),
				'useful_plugins'  => esc_html__('Useful Plugins', 'video-vlog'),
				'free_pro'  => esc_html__('Free Vs Pro', 'video-vlog'),
			),

			// Quick links.
			'quick_links' => array(
				'xmagazine_url' => array(
					'text'   => esc_html__('UPGRADE Video Vlog PRO', 'video-vlog'),
					'url'    => 'https://wpthemespace.com/product/video-vlog-pro/?add-to-cart=10361',
					'button' => 'danger',
				),
				'update_url' => array(
					'text'   => esc_html__('View demo', 'video-vlog'),
					'url'    => 'https://wpthemespace.com/video-vlog-demo/',
					'button' => 'primery',
				),

			),

			// Getting started.
			'getting_started' => array(
				'one' => array(
					'title'       => esc_html__('Demo Content', 'video-vlog'),
					'icon'        => 'dashicons dashicons-layout',
					'description' => sprintf(esc_html__('Demo content is pro feature. To import sample demo content, %1$s plugin should be installed and activated. After plugin is activated, visit Import Demo Data menu under Appearance.', 'video-vlog'), esc_html__('One Click Demo Import', 'video-vlog')),
					'button_text' => esc_html__('UPGRADE For  Demo Content', 'video-vlog'),
					'button_url'  => 'https://wpthemespace.com/product/video-vlog-pro/?add-to-cart=10361',
					'button_type' => 'primary',
					'is_new_tab'  => true,
				),

				'two' => array(
					'title'       => esc_html__('Theme Options', 'video-vlog'),
					'icon'        => 'dashicons dashicons-admin-customizer',
					'description' => esc_html__('Theme uses Customizer API for theme options. Using the Customizer you can easily customize different aspects of the theme.', 'video-vlog'),
					'button_text' => esc_html__('Customize', 'video-vlog'),
					'button_url'  => wp_customize_url(),
					'button_type' => 'primary',
				),
				'three' => array(
					'title'       => esc_html__('Show Video', 'video-vlog'),
					'icon'        => 'dashicons dashicons-layout',
					'description' => sprintf(esc_html__('You may show Video Vlog short video for better understanding', 'video-vlog'), esc_html__('One Click Demo Import', 'video-vlog')),
					'button_text' => esc_html__('Show video', 'video-vlog'),
					'button_url'  => 'https://www.youtube.com/watch?v=ATu84uap_bc',
					'button_type' => 'primary',
					'is_new_tab'  => true,
				),
				'five' => array(
					'title'       => esc_html__('Set Widgets', 'video-vlog'),
					'icon'        => 'dashicons dashicons-tagcloud',
					'description' => esc_html__('Set widgets in your sidebar, Offcanvas as well as footer.', 'video-vlog'),
					'button_text' => esc_html__('Add Widgets', 'video-vlog'),
					'button_url'  => admin_url() . '/widgets.php',
					'button_type' => 'link',
					'is_new_tab'  => true,
				),
				'six' => array(
					'title'       => esc_html__('Theme Preview', 'video-vlog'),
					'icon'        => 'dashicons dashicons-welcome-view-site',
					'description' => esc_html__('You can check out the theme demos for reference to find out what you can achieve using the theme and how it can be customized. Theme demo only work in pro theme', 'video-vlog'),
					'button_text' => esc_html__('View Demo', 'video-vlog'),
					'button_url'  => 'https://wpthemespace.com/video-vlog-demo/',
					'button_type' => 'link',
					'is_new_tab'  => true,
				),
				'seven' => array(
					'title'       => esc_html__('Contact Support', 'video-vlog'),
					'icon'        => 'dashicons dashicons-sos',
					'description' => esc_html__('Got theme support question or found bug or got some feedbacks? Best place to ask your query is the dedicated Support forum for the theme.', 'video-vlog'),
					'button_text' => esc_html__('Contact Support', 'video-vlog'),
					'button_url'  => 'https://wpthemespace.com/support/',
					'button_type' => 'link',
					'is_new_tab'  => true,
				),
			),

			'useful_plugins'        => array(
				'description' => esc_html__('Theme supports some helpful WordPress plugins to enhance your site. But, please enable only those plugins which you need in your site. For example, enable WooCommerce only if you are using e-commerce.', 'video-vlog'),
				'already_activated_message' => esc_html__('Already activated', 'video-vlog'),
				'version_label' => esc_html__('Version: ', 'video-vlog'),
				'install_label' => esc_html__('Install and Activate', 'video-vlog'),
				'activate_label' => esc_html__('Activate', 'video-vlog'),
				'deactivate_label' => esc_html__('Deactivate', 'video-vlog'),
				'content'                   => array(
					array(
						'slug' => 'magical-addons-for-elementor',
						'icon' => 'svg',
					),
					array(
						'slug' => 'magical-products-display'
					),
					array(
						'slug' => 'magical-posts-display'
					),
					array(
						'slug' => 'click-to-top'
					),
					array(
						'slug' => 'gallery-box',
						'icon' => 'svg',
					),
					array(
						'slug' => 'magical-blocks'
					),
					array(
						'slug' => 'easy-share-solution',
						'icon' => 'svg',
					),
					array(
						'slug' => 'wp-edit-password-protected',
						'icon' => 'svg',
					),
				),
			),
			// Required actions array.
			'recommended_actions'        => array(
				'install_label' => esc_html__('Install and Activate', 'video-vlog'),
				'activate_label' => esc_html__('Activate', 'video-vlog'),
				'deactivate_label' => esc_html__('Deactivate', 'video-vlog'),
				'content'            => array(
					'magical-blocks' => array(
						'title'       => __('Magical Posts Display', 'video-vlog'),
						'description' => __('Now you can add or update your site elements very easily by Magical Products Display. Supercharge your Elementor block with highly customizable Magical Blocks For WooCommerce.', 'video-vlog'),
						'plugin_slug' => 'magical-products-display',
						'id' => 'magical-posts-display'
					),
					'go-pro' => array(
						'title'       => '<a target="_blank" class="activate-now button button-danger" href="https://wpthemespace.com/product/video-vlog-pro/?add-to-cart=10361">' . __('UPGRADE Video Vlog PRO', 'video-vlog') . '</a>',
						'description' => __('You will get more frequent updates and quicker support with the Pro version.', 'video-vlog'),
						//'plugin_slug' => 'x-instafeed',
						'id' => 'go-pro'
					),

				),
			),
			// Free vs pro array.
			'free_pro'                => array(
				'free_theme_name'     => $xtheme_name,
				'pro_theme_name'      => $xtheme_name . __(' Pro', 'video-vlog'),
				'pro_theme_link'      => 'https://wpthemespace.com/product/video-vlog-pro/',
				/* translators: View link */
				'get_pro_theme_label' => sprintf(__('Get %s', 'video-vlog'), 'Video Vlog Pro'),
				'features'            => array(
					array(
						'title'       => esc_html__('Daring Design for Devoted Readers', 'video-vlog'),
						'description' => esc_html__('Video Vlog \'s design helps you stand out from the crowd and create an experience that your readers will love and talk about. With a flexible home page you have the chance to easily showcase appealing content with ease.', 'video-vlog'),
						'is_in_lite'  => 'true',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Mobile-Ready For All Devices', 'video-vlog'),
						'description' => esc_html__('Video Vlog makes room for your readers to enjoy your articles on the go, no matter the device their using. We shaped everything to look amazing to your audience.', 'video-vlog'),
						'is_in_lite'  => 'true',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Youtube Video Vlog', 'video-vlog'),
						'description' => esc_html__('You can easily create awesome Youtube video vlog with Video Vlog theme', 'video-vlog'),
						'is_in_lite'  => 'true',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Vimeo Video Vlog', 'video-vlog'),
						'description' => esc_html__('You can easily create awesome Vimeo video vlog with Video Vlog theme', 'video-vlog'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('DailyMotion Video Vlog', 'video-vlog'),
						'description' => esc_html__('You can easily create awesome Vimeo video vlog with Video Vlog theme', 'video-vlog'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Widgetized Sidebars To Keep Attention', 'video-vlog'),
						'description' => esc_html__('Video Vlog comes with a widget-based flexible system which allows you to add your favorite widgets over the Sidebar as well as on offcanvas too.', 'video-vlog'),
						'is_in_lite'  => 'true',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Auto Set-up Feature', 'video-vlog'),
						'description' => esc_html__('You can import demo site only one click so you can setup your site like demo very easily.', 'video-vlog'),
						'is_in_lite'  => 'ture',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Multiple Header Layout', 'video-vlog'),
						'description' => esc_html__('Video Vlog gives you extra ways to showcase your header with miltiple layout option you can change it on the basis of your requirement', 'video-vlog'),
						'is_in_lite'  => 'true',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('One Click Demo install', 'video-vlog'),
						'description' => esc_html__('You can import demo site only one click so you can setup your site like demo very easily.', 'video-vlog'),
						'is_in_lite'  => 'ture',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Extra Drag and drop support', 'video-vlog'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Advanced Portfolio Filter', 'video-vlog'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Testimonial Carousel', 'video-vlog'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Diffrent Style Blog', 'video-vlog'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Flexible Home Page Design', 'video-vlog'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Pro Service Section', 'video-vlog'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Animation Home Text', 'video-vlog'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Advance Customizer Options', 'video-vlog'),
						'description' => esc_html__('Advance control for each element gives you different way of customization and maintained you site as you like and makes you feel different.', 'video-vlog'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('Advance Pagination', 'video-vlog'),
						'description' => esc_html__('Multiple Option of pagination via customizer can be obtained on your site like Infinite scroll, Ajax Button On Click, Number as well as classical option are available.', 'video-vlog'),
						'is_in_lite'  => 'ture',
						'is_in_pro'   => 'true',
					),

					array(
						'title'       => esc_html__('Premium Support and Assistance', 'video-vlog'),
						'description' => esc_html__('We offer ongoing customer support to help you get things done in due time. This way, you save energy and time, and focus on what brings you happiness. We know our products inside-out and we can lend a hand to help you save resources of all kinds.', 'video-vlog'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
					array(
						'title'       => esc_html__('No Credit Footer Link', 'video-vlog'),
						'description' => esc_html__('You can easily remove the Theme: Video Vlog by Video Vlog copyright from the footer area and make the theme yours from start to finish.', 'video-vlog'),
						'is_in_lite'  => 'false',
						'is_in_pro'   => 'true',
					),
				),
			),

		);

		video_vlog_About::init($config);
	}

endif;

add_action('after_setup_theme', 'video_vlog_about_setup');

/**
 * Pro notice text
 *
 */
function video_vlog_pnotice_output()
{
?>
	<div class="mgadin-hero">
		<div class="mge-info-content">
			<div class="mge-info-hello">
				<?php
				$current_theme = wp_get_theme();
				$current_theme_name = $current_theme->get('Name');
				$current_user = wp_get_current_user();

				$demo_link = esc_url('https://wpthemespace.com/product/video-vlog-pro/');
				$pro_link = esc_url('https://wpthemespace.com/product/video-vlog-pro/?add-to-cart=10361');


				esc_html_e('Hello, ', 'video-vlog');
				echo esc_html($current_user->display_name);
				?>

				<?php esc_html_e('👋🏻', 'video-vlog'); ?>
			</div>
			<div class="mge-info-desc">
				<div><?php printf(esc_html__('Attention, don\'t miss out Pro version! 🚨 🚀 Introducing our premium version, designed for text & video bloggers! With Video Vlog Pro, you get YouTube, Vimeo, and Dailymotion integration, taking your vlogs to the next level and enjoy SEO-friendly and lightweight design, lightning-fast speed optimization, more secure, premade demos, effortless one-click demo imports, and exclusive custom Elementor premium widgets. With the pro version, you can take your website to the next level and truly stand out from the competition.', 'video-vlog'), $current_theme_name); ?></div>
				<div class="mge-offer"><?php printf(esc_html__('🚀Make your video vlog or text blog website stand out like never before! 🔐✨ Don\'t miss out, upgrade now ', 'video-vlog'), $current_theme_name); ?></div>
			</div>
			<div class="mge-info-actions">
				<a href="<?php echo esc_url($pro_link); ?>" target="_blank" class="button button-primary upgrade-btn">
					<?php esc_html_e('Upgrade Pro', 'video-vlog'); ?>
				</a>
				<a href="<?php echo esc_url($demo_link); ?>" target="_blank" class="button button-primary demo-btn">
					<?php esc_html_e('View Details', 'video-vlog'); ?>
				</a>
				<button class="button button-info btnend"><?php esc_html_e('Dismiss this notice', 'video-vlog') ?></button>
			</div>

		</div>

	</div>
<?php
}
//Admin notice 
function video_vlog_new_optins_texts()
{
	$hide_date = get_option('video_vlog_info_hit');
	if (!empty($hide_date)) {
		$clickhide = round((time() - strtotime($hide_date)) / 24 / 60 / 60);
		if ($clickhide < 25) {
			return;
		}
	}
?>
	<div class="mgadin-notice notice notice-info mgadin-theme-dashboard mgadin-theme-dashboard-notice mge is-dismissible meis-dismissible">
		<?php video_vlog_pnotice_output(); ?>
	</div>
<?php

}
add_action('admin_notices', 'video_vlog_new_optins_texts');

function video_vlog_new_optins_texts_init()
{
	if (isset($_GET['xbnotice']) && $_GET['xbnotice'] == 1) {
		update_option('video_vlog_info_hit', current_time('mysql'));
	}
}
add_action('init', 'video_vlog_new_optins_texts_init');
