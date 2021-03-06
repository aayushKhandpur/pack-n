<?php
/**
 *
 * @package leetheme
 */
ob_start();
if ( ! isset( $content_width ) ) $content_width = 1000; /* pixels */


require_once(get_template_directory() . '/admin/index.php');

/* Check if WooCommerce is active */
define( 'LEE_WOOCOMMERCE_ACTIVED', in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) );

global $ros_opt;
$ros_opt = $smof_data;


/************ Plugin recommendations **********/
require_once (get_template_directory() . '/includes/class-tgm-plugin-activation.php');
add_action( 'tgmpa_register', 'leetheme_register_required_plugins' );
function leetheme_register_required_plugins() {

	$plugins = array(


		array(
			'name'     				=> 'WooCommerce', 
			'slug'     				=> 'woocommerce',
			'source'   				=> get_template_directory() . '/includes/plugins/woocommerce.zip', 
			'required' 				=> true,
			'version' 				=> '2.4.6', 
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),
		array(
			'name'     				=> 'Revolution Slider',
			'slug'     				=> 'revslider',
			'source'   				=> get_template_directory() . '/includes/plugins/revslider.zip',
			'required' 				=> true,
			'version' 				=> '4.6.0',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),
		array(
			'name'     				=> 'Lee Framework',
			'slug'     				=> 'lee_framework',
			'source'   				=> get_template_directory() . '/includes/plugins/lee_framework.zip',
			'required' 				=> true,
			'version' 				=> '1.0',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),
		array(
			'name'     				=> 'WPBakery Visual Composer',
			'slug'     				=> 'js_composer',
			'source'   				=> get_template_directory() . '/includes/plugins/js_composer.zip',
			'required' 				=> true,
			'version' 				=> '4.7.4',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),
		array(
			'name'     				=> 'Ninja Forms',
			'slug'     				=> 'ninja-forms',
			'source'   				=> get_template_directory() . '/includes/plugins/ninja-forms.zip',
			'required' 				=> true,
			'version' 				=> '2.9.27',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),
		
		array(
			'name'     				=> 'Taxonomy Metadata',
			'slug'     				=> 'taxonomy-metadata',
			'source'   				=> get_template_directory() . '/includes/plugins/taxonomy-metadata.zip',
			'required' 				=> true,
			'version' 				=> '0.4',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),
		
		array(
			'name'     				=> 'Unlimited Sidebars Woosidebars',
			'slug'     				=> 'woosidebars',
			'source'   				=> get_template_directory() . '/includes/plugins/woosidebars.zip',
			'required' 				=> true,
			'version' 				=> '1.4.2',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),
		
		array(
			'name'     				=> 'YITH WooCommerce Ajax Search',
			'slug'     				=> 'yith-woocommerce-ajax-search',
			'source'   				=> get_template_directory() . '/includes/plugins/yith-woocommerce-ajax-search.zip',
			'required' 				=> true,
			'version' 				=> '1.3.6',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),
			array(
			'name'     				=> 'YITH WooCommerce Wishlist',
			'slug'     				=> 'yith-woocommerce-wishlist',
			'source'   				=> get_template_directory() . '/includes/plugins/yith-woocommerce-wishlist.zip',
			'required' 				=> true,
			'version' 				=> '2.0.10',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),
			array(
			'name'     				=> 'YITH WooCommerce Compare',
			'slug'     				=> 'yith-woocommerce-compare',
			'source'   				=> get_template_directory() . '/includes/plugins/yith-woocommerce-compare.zip',
			'required' 				=> true,
			'version' 				=> '2.0.3',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),
		array(
			'name'     				=> 'My Custom Code',
			'slug'     				=> 'my-custom-code',
			'source'   				=> get_template_directory() . '/includes/plugins/my-custom-code.zip',
			'required' 				=> true,
			'version' 				=> '',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),
		array(
			'name'     				=> 'Regenerate Thumbnails',
			'slug'     				=> 'regenerate-thumbnails',
			'source'   				=> get_template_directory() . '/includes/plugins/regenerate-thumbnails.zip',
			'required' 				=> true,
			'version' 				=> '2.2.4',
			'force_activation' 		=> false,
			'force_deactivation' 	=> false,
			'external_url' 			=> '',
		),
	);

	$config = array(
		'domain'       		=> 'ltheme_domain',         	// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
		'parent_slug' 	=> 'themes.php', 				// Default parent menu slug
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> false,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		'strings'      		=> array(
			'page_title'                       			=> __( 'Install Required Plugins', '' ),
			'menu_title'                       			=> __( 'Install Plugins', 'ltheme_domain' ),
			'installing'                       			=> __( 'Installing Plugin: %s', 'ltheme_domain' ), // %1$s = plugin name
			'oops'                             			=> __( 'Something went wrong with the plugin API.', 'ltheme_domain' ),
			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'                           			=> __( 'Return to Required Plugins Installer', 'ltheme_domain' ),
			'plugin_activated'                 			=> __( 'Plugin activated successfully.', 'ltheme_domain' ),
			'complete' 									=> __( 'All plugins installed and activated successfully. %s', 'ltheme_domain' ), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa( $plugins, $config );
}

/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
add_action( 'vc_before_init', 'your_prefix_vcSetAsTheme' );
function your_prefix_vcSetAsTheme() {
	/* Hide update notice */
    vc_set_as_theme( $disable_updater = false );
}


if ( ! function_exists( 'leetheme_setup' ) ) :
function leetheme_setup() {

	require( get_template_directory() . '/includes/dynamic-css.php' );

	require( get_template_directory() . '/includes/theme-functions.php' );

	require( get_template_directory() . '/includes/images.php' );

	require( get_template_directory() . '/includes/theme-options.php' );

	require( get_template_directory() . '/includes/metabox/lee-metabox.php');

	require_once(get_template_directory() . '/includes/lee_mega_menu/lee_mega_menu.php');
	

	load_theme_textdomain( 'ltheme_domain', get_template_directory() . '/languages' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'automatic-feed-links' );

	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-background' );
	add_theme_support( 'custom-header' );

	add_image_size( 'normal-thumb', 750, 250, true );
	add_image_size( 'list-thumb', 250, 200, true );
	add_image_size( 'grid-thumb', 300, 300, true );

	register_nav_menus( array(
		'primary' => __( 'Main Menu', 'ltheme_domain' ),
		'top_bar_nav' => __( 'Top bar Menu', 'ltheme_domain' ),
		'my_account' => __('My Account', 'ltheme_domain'),
		'footer_menu' => __('Footer Menu', 'ltheme_domain'),
	) );


	add_filter( 'wp_nav_menu_items', 'add_loginout_link', 10, 2 );
	function add_loginout_link( $items, $args ){
		if (is_user_logged_in() && $args->theme_location == 'top_bar_nav'){
			$items .= '<li class="menu-item"><a href="'.esc_url(home_url('/')).'my-account/" title="">'.__('My Account','ltheme_domain').'</a></li>';
			$items .= '<li class="menu-item"><a class="nav-top-link" href="'.wp_logout_url().'">'.__('Log Out','ltheme_domain').'</a></li>';
		}
		elseif (!is_user_logged_in() && $args->theme_location == 'top_bar_nav') {
	        $items .= '<li class="menu-item color"><a href="'.get_permalink( get_option('woocommerce_myaccount_page_id') ).'" title="">'.__('Sign in','ltheme_domain').'</a></li>';
	        $items .= '<li class="menu-item">'.__('Or','ltheme_domain').'</li>';
	        $items .= '<li class="menu-item color"><a href="'.get_permalink( get_option('woocommerce_myaccount_page_id') ).'" title="">'.__('Register','ltheme_domain').'</a></li>';
	 	}
	return $items;
	}

}
endif; 
add_action( 'after_setup_theme', 'leetheme_setup' );


function leetheme_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'ltheme_domain' ),
		'id'            => 'sidebar-main',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
	) );


	register_sidebar( array(
		'name'          => __( 'Shop Sidebar', 'ltheme_domain' ),
		'id'            => 'shop-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
	) );

	register_sidebar( array(
		'name'          => __( 'Product Sidebar', 'ltheme_domain' ),
		'id'            => 'product-sidebar',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
	) );

	register_sidebar( array(
		'name'          => __( 'Mega Menu Widget', 'ltheme_domain' ),
		'id'            => 'mega-menu',
		'before_widget' => '<aside class="mega-menu">',
		'after_widget'  => '</aside>',
	) );

	register_sidebar( array(
		'name'          => __( 'Home Sidebar', 'ltheme_domain' ),
		'id'            => 'home-sidebar',
		'before_widget' => '<aside id="%1$s" class="home-sidebar">',
		'after_widget'  => '</aside>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer', 'ltheme_domain' ),
		'id'            => 'sidebar-footer',
		'before_widget' => '<div id="%1$s" class="large-3 columns widget left %2$s">',
		'after_widget'  => '</div>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'ltheme_domain' ),
		'id'            => 'footer-1',
		'before_widget' => '<aside id="%1$s" class="widget">',
		'after_widget'  => '</aside>',
		'before_title'	=> '',
		'after_title'	=> ''
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 2', 'ltheme_domain' ),
		'id'            => 'footer-2',
		'before_widget' => '<aside id="%1$s" class="widget">',
		'after_widget'  => '</aside>',
		'before_title'	=> '',
		'after_title'	=> ''
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 3', 'ltheme_domain' ),
		'id'            => 'footer-3',
		'before_widget' => '<aside id="%1$s" class="widget">',
		'after_widget'  => '</aside>',
		'before_title'	=> '',
		'after_title'	=> ''
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 4', 'ltheme_domain' ),
		'id'            => 'footer-4',
		'before_widget' => '<aside id="%1$s" class="widget">',
		'after_widget'  => '</aside>',
		'before_title'	=> '',
		'after_title'	=> ''
	) );

}
add_action( 'widgets_init', 'leetheme_widgets_init' );


include_once(get_template_directory() .'/includes/widgets/recent-posts.php');
include_once(get_template_directory() .'/includes/widgets/contact-us.php');
include_once(get_template_directory() .'/includes/widgets/flickr.php');
include_once(get_template_directory() .'/includes/widgets/lee-product-categories.php');

/**
 * Enqueue scripts and styles
 */
function leetheme_scripts() {
	
	global $ros_opt;

	wp_enqueue_style( 'leetheme-icons', get_template_directory_uri() .'/css/fonts.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'leetheme-animations', get_template_directory_uri() .'/css/animations.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'leetheme-animate', get_template_directory_uri() .'/css/animate.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'owlcarousel', get_template_directory_uri() .'/css/owl.carousel.css', array(), '1.0', 'all');

	wp_enqueue_style( 'leetheme-style', get_stylesheet_uri(), array(), '1.8', 'all');

	wp_enqueue_script( 'leetheme-cookie', get_template_directory_uri() .'/js/min/jquery.cookie.min.js', array(), false, true );
	wp_enqueue_script( 'leetheme-modernizer', get_template_directory_uri() .'/js/modernizr.js', array(), false, true );
 	wp_enqueue_script( 'leetheme-scrollTo', get_template_directory_uri() .'/js/min/jquery.scrollTo.min.js', array(), false, true );
 	wp_enqueue_script( 'leetheme-JRespond', get_template_directory_uri() .'/js/min/jquery.jRespond.min.js', array(), false, true );
 	wp_enqueue_script( 'leetheme-hoverIntent', get_template_directory_uri() .'/js/min/jquery.hoverIntent.min.js', array(), false, true );
 	wp_enqueue_script( 'leetheme-jpanelmenu', get_template_directory_uri() .'/js/min/jquery.jpanelmenu.min.js', array(), false, true );
 	wp_enqueue_script( 'leetheme-waypoints', get_template_directory_uri() .'/js/min/jquey.waypoints.js', array(), false, true );
 	wp_enqueue_script( 'leetheme-packer', get_template_directory_uri() .'/js/min/jquery.packer.js', array(), false, true );
 	wp_enqueue_script( 'leetheme-tipr', get_template_directory_uri() .'/js/min/jquery.tipr.min.js', array(), false, true );
 	wp_enqueue_script( 'leetheme-variations', get_template_directory_uri() .'/js/min/jquery.variations.min.js', array(), false, true );
	wp_enqueue_script( 'leetheme-magnific-popup', get_template_directory_uri() .'/js/min/jquery.magnific-popup.js', array(), false, true );
	wp_enqueue_script( 'leetheme-bxslider', get_template_directory_uri() .'/js/min/jquery.bxslider.min.js', array(), false, true );
	wp_enqueue_script( 'leetheme-owlcarousel', get_template_directory_uri() .'/js/min/owl.carousel.min.js', array(), false, true );
	wp_enqueue_script( 'leetheme-parallax', get_template_directory_uri() .'/js/min/jquery.stellar.min.js', array(), false, true );
	wp_enqueue_script( 'leetheme-countdown', get_template_directory_uri() .'/js/min/countdown.min.js', array(), false, true );
	wp_enqueue_script( 'leetheme-easyzoom', get_template_directory_uri() .'/js/min/jquery.easyzoom.min.js', array(), false, true );
	
	wp_enqueue_script( 'leetheme-theme-js', get_template_directory_uri() .'/js/min/main.min.js', array(), '1.8', true );
	
	wp_enqueue_script( 'leetheme-wow-js', get_template_directory_uri() .'/js/min/wow.min.js', array(), false, true );

	wp_deregister_style('yith-wcwl-font-awesome');
	wp_deregister_style('yith-wcwl-font-awesome-ie7');
	wp_deregister_style('yith-wcwl-main');
	wp_deregister_style('nextend_fb_connect_stylesheet');
	
	
	if ( ! is_admin() ) {
	wp_deregister_style('woocommerce-layout');	
	wp_deregister_style('woocommerce-smallscreen');	
	wp_deregister_style('woocommerce-general');	
	}


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

}
add_action( 'wp_enqueue_scripts', 'leetheme_scripts' );

//* Enqueue script to activate WOW.js
add_action('wp_enqueue_scripts', 'sk_wow_init_in_footer');
function sk_wow_init_in_footer() {
	add_action( 'print_footer_scripts', 'wow_init' );
}

//* Add JavaScript before </body>
function wow_init() { ?>
	<script type="text/javascript">
		new WOW().init();
	</script>
<?php }



/* UNREGISTRER DEFAULT WOOCOMMERCE HOOKS */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_breadcrumb', 20);
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_login_form', 10 );
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_show_messages', 10 );

remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form', 10 );

add_filter('widget_text', 'do_shortcode');

add_filter('the_excerpt', 'do_shortcode');

add_action('init', 'leetheme_post_type_support');
function leetheme_post_type_support() {
	add_post_type_support( 'page', 'excerpt' );
}

include_once( get_template_directory() . '/includes/google-fonts.php' );

include_once( get_template_directory() . '/includes/importer/importer.php' );



include_once(get_template_directory() . '/includes/shortcodes/buttons.php');
include_once(get_template_directory() . '/includes/shortcodes/grid.php');
include_once(get_template_directory() . '/includes/shortcodes/carousel.php');
include_once(get_template_directory() . '/includes/shortcodes/share.php');
include_once(get_template_directory() . '/includes/shortcodes/latest_post.php');
include_once(get_template_directory() . '/includes/shortcodes/banners.php');
include_once(get_template_directory() . '/includes/shortcodes/google_maps.php');
include_once(get_template_directory() . '/includes/shortcodes/messages.php');
include_once(get_template_directory() . '/includes/shortcodes/search.php');
include_once(get_template_directory() . '/includes/shortcodes/widget_to_shortcode.php');
include_once(get_template_directory() . '/includes/shortcodes/others.php');

include_once(get_template_directory() . '/includes/shortcodes/product_categories.php');
include_once(get_template_directory() . '/includes/shortcodes/lee_products.php');
include_once(get_template_directory() . '/includes/shortcodes/lee_brands.php');
include_once(get_template_directory() . '/includes/shortcodes/lee_menu_vertical.php');
include_once(get_template_directory() . '/includes/shortcodes/team_members.php');

include_once(get_template_directory() . '/includes/vc.php');
require_once(get_template_directory() . '/includes/lee_mega_menu/lee_mega_menu_frontend.php' );


require get_template_directory() . '/includes/class-wc-product-data-fields.php';
require get_template_directory() . '/includes/custom-wc-fields.php';


if(isset($ros_opt['products_pr_page'])){
	$products = $ros_opt['products_pr_page'];
	add_filter( 'loop_shop_per_page', create_function( '$cols', "return $products;" ), 20 );
}



// Visual Composer plugin
if ( is_plugin_active( 'js_composer/js_composer.php' ) ) {
	add_filter( 'vc_shortcodes_css_class', 'leetheme_customize_vc_rows_columns', 10, 2 );
}

/**

* Add new register fields for WooCommerce registration.

*

* @return string Register fields HTML.

*/

function wooc_extra_register_fields() {

       ?>



       <p class="form-row form-row-first">

       <label for="reg_billing_first_name"><?php _e( 'First name', 'woocommerce' ); ?><span class="required">*</span></label>

       <input type="text" class="input-text" name="billing_first_name" id="reg_billing_first_name" value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) esc_attr_e( $_POST['billing_first_name'] ); ?>" />

       </p>



       <p class="form-row form-row-last">

       <label for="reg_billing_last_name"><?php _e( 'Last name', 'woocommerce' ); ?><span class="required">*</span></label>

       <input type="text" class="input-text" name="billing_last_name" id="reg_billing_last_name" value="<?php if ( ! empty( $_POST['billing_last_name'] ) ) esc_attr_e( $_POST['billing_last_name'] ); ?>" />

       </p>



       <div class="clear"></div>



       <p class="form-row form-row-wide">

       <label for="reg_billing_phone"><?php _e( 'Phone', 'woocommerce' ); ?><span class="required">*</span></label>

       <input type="text" class="input-text" name="billing_phone" id="reg_billing_phone" value="<?php if ( ! empty( $_POST['billing_phone'] ) ) esc_attr_e( $_POST['billing_phone'] ); ?>" />

       </p>



       <?php

}



add_action( 'woocommerce_register_form_start', 'wooc_extra_register_fields' );


/**

* Validate the extra register fields.

*

* @param string $username         Current username.

* @param string $email             Current email.

* @param object $validation_errorsWP_Error object.

*

* @return void

*/

function wooc_validate_extra_register_fields( $username, $email, $validation_errors ) {

       if ( isset( $_POST['billing_first_name'] ) && empty( $_POST['billing_first_name'] ) ) {

              $validation_errors->add( 'billing_first_name_error', __( '<strong>Error</strong>: First name is required!', 'woocommerce' ) );

       }



       if ( isset( $_POST['billing_last_name'] ) && empty( $_POST['billing_last_name'] ) ) {

              $validation_errors->add( 'billing_last_name_error', __( '<strong>Error</strong>: Last name is required!.', 'woocommerce' ) );

       }





       if ( isset( $_POST['billing_phone'] ) && empty( $_POST['billing_phone'] ) ) {

              $validation_errors->add( 'billing_phone_error', __( '<strong>Error</strong>: Phone is required!.', 'woocommerce' ) );

       }

}



add_action( 'woocommerce_register_post', 'wooc_validate_extra_register_fields', 10, 3 );

?>