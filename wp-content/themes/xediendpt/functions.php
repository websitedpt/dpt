<?php
/**
 * Twenty Seventeen functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 */

/**
 * Twenty Seventeen only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function twentyseventeen_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentyseventeen
	 * If you're building a theme based on Twenty Seventeen, use a find and replace
	 * to change 'twentyseventeen' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'twentyseventeen' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	//add_image_size( 'twentyseventeen-featured-image', 2000, 1200, true );

	//add_image_size( 'twentyseventeen-thumbnail-avatar', 100, 100, true );

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'top'    => __( 'Top Menu', 'twentyseventeen' ),
		'social' => __( 'Social Links Menu', 'twentyseventeen' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', twentyseventeen_fonts_url() ) );

	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		'widgets' => array(
			// Place three core-defined widgets in the sidebar area.
			'sidebar-1' => array(
				'text_business_info',
				'search',
				'text_about',
			),

			// Add the core-defined business info widget to the footer 1 area.
			'sidebar-2' => array(
				'text_business_info',
			),

			// Put two core-defined widgets in the footer 2 area.
			'sidebar-3' => array(
				'text_about',
				'search',
			),
		),

		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts' => array(
			'home',
			'about' => array(
				'thumbnail' => '{{image-sandwich}}',
			),
			'contact' => array(
				'thumbnail' => '{{image-espresso}}',
			),
			'blog' => array(
				'thumbnail' => '{{image-coffee}}',
			),
			'homepage-section' => array(
				'thumbnail' => '{{image-espresso}}',
			),
		),

		// Create the custom image attachments used as post thumbnails for pages.
		'attachments' => array(
			'image-espresso' => array(
				'post_title' => _x( 'Espresso', 'Theme starter content', 'twentyseventeen' ),
				'file' => 'assets/images/espresso.jpg', // URL relative to the template directory.
			),
			'image-sandwich' => array(
				'post_title' => _x( 'Sandwich', 'Theme starter content', 'twentyseventeen' ),
				'file' => 'assets/images/sandwich.jpg',
			),
			'image-coffee' => array(
				'post_title' => _x( 'Coffee', 'Theme starter content', 'twentyseventeen' ),
				'file' => 'assets/images/coffee.jpg',
			),
		),

		// Default to a static front page and assign the front and posts pages.
		'options' => array(
			'show_on_front' => 'page',
			'page_on_front' => '{{home}}',
			'page_for_posts' => '{{blog}}',
		),

		// Set the front page section theme mods to the IDs of the core-registered pages.
		'theme_mods' => array(
			'panel_1' => '{{homepage-section}}',
			'panel_2' => '{{about}}',
			'panel_3' => '{{blog}}',
			'panel_4' => '{{contact}}',
		),

		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus' => array(
			// Assign a menu to the "top" location.
			'top' => array(
				'name' => __( 'Top Menu', 'twentyseventeen' ),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_blog',
					'page_contact',
				),
			),

			// Assign a menu to the "social" location.
			'social' => array(
				'name' => __( 'Social Links Menu', 'twentyseventeen' ),
				'items' => array(
					'link_yelp',
					'link_facebook',
					'link_twitter',
					'link_instagram',
					'link_email',
				),
			),
		),
	);

	/**
	 * Filters Twenty Seventeen array of starter content.
	 *
	 * @since Twenty Seventeen 1.1
	 *
	 * @param array $starter_content Array of starter content.
	 */
	$starter_content = apply_filters( 'twentyseventeen_starter_content', $starter_content );

	add_theme_support( 'starter-content', $starter_content );
}
add_action( 'after_setup_theme', 'twentyseventeen_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function twentyseventeen_content_width() {

	$content_width = $GLOBALS['content_width'];

	// Get layout.
	$page_layout = get_theme_mod( 'page_layout' );

	// Check if layout is one column.
	if ( 'one-column' === $page_layout ) {
		if ( twentyseventeen_is_frontpage() ) {
			$content_width = 644;
		} elseif ( is_page() ) {
			$content_width = 740;
		}
	}

	// Check if is single post and there is no sidebar.
	if ( is_single() && ! is_active_sidebar( 'sidebar-1' ) ) {
		$content_width = 740;
	}

	/**
	 * Filter Twenty Seventeen content width of the theme.
	 *
	 * @since Twenty Seventeen 1.0
	 *
	 * @param $content_width integer
	 */
	$GLOBALS['content_width'] = apply_filters( 'twentyseventeen_content_width', $content_width );
}
add_action( 'template_redirect', 'twentyseventeen_content_width', 0 );

/**
 * Register custom fonts.
 */
function twentyseventeen_fonts_url() {
	$fonts_url = '';

	/**
	 * Translators: If there are characters in your language that are not
	 * supported by Libre Franklin, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$libre_franklin = _x( 'on', 'Libre Franklin font: on or off', 'twentyseventeen' );

	if ( 'off' !== $libre_franklin ) {
		$font_families = array();

		$font_families[] = 'Libre Franklin:300,300i,400,400i,600,600i,800,800i';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return esc_url_raw( $fonts_url );
}

/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function twentyseventeen_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'twentyseventeen-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'twentyseventeen_resource_hints', 10, 2 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function twentyseventeen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'twentyseventeen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentyseventeen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'twentyseventeen' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'twentyseventeen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'twentyseventeen' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'twentyseventeen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'twentyseventeen_widgets_init' );

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @since Twenty Seventeen 1.0
 *
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function twentyseventeen_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}

	$link = sprintf( '<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'twentyseventeen_excerpt_more' );

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Seventeen 1.0
 */
function twentyseventeen_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'twentyseventeen_javascript_detection', 0 );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function twentyseventeen_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'twentyseventeen_pingback_header' );

/**
 * Display custom color CSS.
 */
function twentyseventeen_colors_css_wrap() {
	if ( 'custom' !== get_theme_mod( 'colorscheme' ) && ! is_customize_preview() ) {
		return;
	}

	require_once( get_parent_theme_file_path( '/inc/color-patterns.php' ) );
	$hue = absint( get_theme_mod( 'colorscheme_hue', 250 ) );
?>
	<style type="text/css" id="custom-theme-colors" <?php if ( is_customize_preview() ) { echo 'data-hue="' . $hue . '"'; } ?>>
		<?php echo twentyseventeen_custom_colors_css(); ?>
	</style>
<?php }
add_action( 'wp_head', 'twentyseventeen_colors_css_wrap' );

/**
 * Enqueue scripts and styles.
 */
function twentyseventeen_scripts() {
	// Add custom fonts, used in the main stylesheet.
	//wp_enqueue_style( 'twentyseventeen-fonts', twentyseventeen_fonts_url(), array(), null );

	// Theme stylesheet.
	wp_enqueue_style( 'twentyseventeen-style', get_stylesheet_uri() );

	// Load the dark colorscheme.
	if ( 'dark' === get_theme_mod( 'colorscheme', 'light' ) || is_customize_preview() ) {
		wp_enqueue_style( 'twentyseventeen-colors-dark', get_theme_file_uri( '/assets/css/colors-dark.css' ), array( 'twentyseventeen-style' ), '1.0' );
	}

	// Load the Internet Explorer 9 specific stylesheet, to fix display issues in the Customizer.
	if ( is_customize_preview() ) {
		wp_enqueue_style( 'twentyseventeen-ie9', get_theme_file_uri( '/assets/css/ie9.css' ), array( 'twentyseventeen-style' ), '1.0' );
		wp_style_add_data( 'twentyseventeen-ie9', 'conditional', 'IE 9' );
	}

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'twentyseventeen-ie8', get_theme_file_uri( '/assets/css/ie8.css' ), array( 'twentyseventeen-style' ), '1.0' );
	wp_style_add_data( 'twentyseventeen-ie8', 'conditional', 'lt IE 9' );

	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );

	/*wp_enqueue_script( 'twentyseventeen-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '1.0', true );*/

	$twentyseventeen_l10n = array(
		'quote'          => twentyseventeen_get_svg( array( 'icon' => 'quote-right' ) ),
	);

	if ( has_nav_menu( 'top' ) ) {
		//wp_enqueue_script( 'twentyseventeen-navigation', get_theme_file_uri( '/assets/js/navigation.js' ), array(), '1.0', true );
		$twentyseventeen_l10n['expand']         = __( 'Expand child menu', 'twentyseventeen' );
		$twentyseventeen_l10n['collapse']       = __( 'Collapse child menu', 'twentyseventeen' );
		$twentyseventeen_l10n['icon']           = twentyseventeen_get_svg( array( 'icon' => 'angle-down', 'fallback' => true ) );
	}

	/*wp_enqueue_script( 'twentyseventeen-global', get_theme_file_uri( '/assets/js/global.js' ), array( 'jquery' ), '1.0', true );*/

	/*wp_enqueue_script( 'jquery-scrollto', get_theme_file_uri( '/assets/js/jquery.scrollTo.js' ), array( 'jquery' ), '2.1.2', true );*/

	/*wp_localize_script( 'twentyseventeen-skip-link-focus-fix', 'twentyseventeenScreenReaderText', $twentyseventeen_l10n );*/

	/*if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}*/
}
add_action( 'wp_enqueue_scripts', 'twentyseventeen_scripts' );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function twentyseventeen_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	/*if ( 740 <= $width ) {
		$sizes = '(max-width: 706px) 89vw, (max-width: 767px) 82vw, 740px';
	}*/

	/*if ( is_active_sidebar( 'sidebar-1' ) || is_archive() || is_search() || is_home() || is_page() ) {
		if ( ! ( is_page() && 'one-column' === get_theme_mod( 'page_options' ) ) && 767 <= $width ) {
			 $sizes = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
		}
	}*/

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'twentyseventeen_content_image_sizes_attr', 10, 2 );

/**
 * Filter the `sizes` value in the header image markup.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $html   The HTML image tag markup being filtered.
 * @param object $header The custom header object returned by 'get_custom_header()'.
 * @param array  $attr   Array of the attributes for the image tag.
 * @return string The filtered header image HTML.
 */
function twentyseventeen_header_image_tag( $html, $header, $attr ) {
	if ( isset( $attr['sizes'] ) ) {
		$html = str_replace( $attr['sizes'], '100vw', $html );
	}
	return $html;
}
add_filter( 'get_header_image_tag', 'twentyseventeen_header_image_tag', 10, 3 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array $attr       Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size       Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function twentyseventeen_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( is_archive() || is_search() || is_home() ) {
		$attr['sizes'] = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
	} else {
		$attr['sizes'] = '100vw';
	}

	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'twentyseventeen_post_thumbnail_sizes_attr', 10, 3 );

/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function twentyseventeen_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'twentyseventeen_front_page_template' );

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );

/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path( '/inc/icon-functions.php' );

function remove_head_scripts() { 
	if(!is_admin()) {
		remove_action('wp_head', 'wp_print_scripts'); 
		remove_action('wp_head', 'wp_print_head_scripts', 9); 
		remove_action('wp_head', 'wp_enqueue_scripts', 1);

		add_action('wp_footer', 'wp_print_scripts', 5);
		add_action('wp_footer', 'wp_enqueue_scripts', 5);
		add_action('wp_footer', 'wp_print_head_scripts', 5); 
	}
} 
function remove_image_size_attributes($html){ return preg_replace( '/(width|height)="\d*"/', '', $html ); }
// Remove image size attributes from post thumbnails
add_filter( 'post_thumbnail_html', 'remove_image_size_attributes' );
// Remove image size attributes from images added to a WordPress post
add_filter( 'image_send_to_editor', 'remove_image_size_attributes' );
add_action('admin_head', 'my_custom_fonts');
function my_custom_fonts() {
  echo '<style>
  	.area-config-mymenu{
  		clear:both;
  		padding-left:15px;
  		padding-right:15px;
  		box-sizing: border-box;
  		margin-top:30px
  	}
  	.block-config-mymenu::before,.block-config-mymenu::after {
  		content:"";
  		display:table;
  		width:100%;
  		clear:both;
  	}
    .block-config-mymenu {
        margin: 0 -15px;
    }
    .h-w {
    	width: 50%;
    	float: left;
    	box-sizing: border-box;
    }
    .area-config-mymenu h2 {
    	text-transform: capitalize;
    	font-weight: bold;
    	margin-bottom:0
    }
    .px-15 {padding-left:15px;padding-right:15px;}
    @media(min-width: 1200px) {
    	.h-w{
    		width: 25%;
    	}
    }
    @media(max-width: 1024px) {
    	.h-w{
    		width: 33.33333333%;
    	}
    }
    @media(max-width: 767px) {
    	.block-config-mymenu {
    		width: 100%
    	}
    	.h-w{
    		width: 100%;
    	}
    }
  </style>';
}
add_action( 'admin_init', 'register_settings' );
function register_settings(){
    //đăng ký các fields dữ liệu cần lưu
    //register_setting( string $option_group, string $option_name, array $args = array() ) 
    register_setting( 'my-settings-group', 'address_company' ); // dòng 1 là group name, dòng 2 là option name , dòng 3 là phần mở rộng, mình chưa có nhé.
    register_setting( 'my-settings-group', 'phone_company' );
    register_setting( 'my-settings-group', 'mail_company' );
    register_setting( 'my-settings-group', 'address_company_2' );
    register_setting( 'my-settings-group', 'copy_right' );
    register_setting( 'my-settings-group', 'Hotline1' );
    register_setting( 'my-settings-group', 'Hotline2' );   
    register_setting( 'my-settings-group', 'fax_company' );
    register_setting( 'my-settings-group', 'facebook_company' );
    register_setting( 'my-settings-group', 'twitter_company' );
    register_setting( 'my-settings-group', 'youtube_company' );
    register_setting( 'my-settings-group', 'google_plus_company' );
    register_setting( 'my-settings-group', 'instagram_company' );    
}
function wpdocs_register_my_custom_menu_page(){
	 // add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
    add_menu_page('Config Page Custom Title','Cấu Hình Trang Tùy Chỉnh', 'manage_options', 'custompage','my_custom_menu_page','dashicons-admin-generic',90); 
}
add_action( 'admin_menu', 'wpdocs_register_my_custom_menu_page' );
if(!function_exists('my_custom_menu_page')){
function my_custom_menu_page() { ?>
	<div class="area-config-mymenu">
		<h2>Cấu Hình Chính</h2>
		<form id="landingOptions" method="post" action="options.php">
		<?php settings_fields( 'my-settings-group' ); ?>
			<div class="block-config-mymenu">
				<div class="px-15 h-w">
					 <p><label for="address_company">Địa chỉ công ty:</label><br/>
					 <input style="width:100%; height: 38px;" type="text" name="address_company" value="<?php echo get_option('address_company')?>" placeholder="Ví dụ: 51 đường 18 phường Phước Bình quận 9" /></p>			 	
				</div>
				<div class="px-15 h-w">
					 <p><label for="phone_company">Số điện thoại</label><br/>
					 <input style="width:100%; height: 38px;" type="text" name="phone_company" value="<?php echo get_option('phone_company')?>" /></p>
				</div>
				<div class="px-15 h-w">
					 <p><label for="fax_company">Số Fax</label><br/>
					 <input style="width:100%; height: 38px;" type="text" name="fax_company" value="<?php echo get_option('fax_company')?>" /></p>
				</div>
				<div class="px-15 h-w">
				 <p><label for="mail_company">Mail công ty</label><br/>
				 <input style="width:100%; height: 38px;" type="text" name="mail_company" value="<?php echo get_option('mail_company')?>" /></p>
				</div>
				<div class="px-15 h-w">
					<p><label for="copy_right">Copy Right</label><br/>
					<input style="width:100%; height: 38px;" type="text" name="copy_right" value="<?php echo get_option('copy_right')?>" /></p>
				</div>
				<div class="px-15 h-w">
				 <p><label for="Hotline1">Hotline 1</label><br/>
				 <input style="width:100%; height: 38px;" type="text" name="Hotline1" value="<?php echo get_option('Hotline1')?>" /></p>
				</div>
				<div class="px-15 h-w">
				 <p><label for="Hotline2">Hotline 2</label><br/>
				 <input style="width:100%; height: 38px;" type="text" name="Hotline2" value="<?php echo get_option('Hotline2')?>" /></p>
				</div>

				<div class="px-15 h-w">
				 <p><label for="facebook_company">Địa chỉ Facebook</label><br/>
				 <input style="width:100%; height: 38px;" type="text" name="facebook_company" value="<?php echo get_option('facebook_company')?>" /></p>
				</div>
				<div class="px-15 h-w">
				 <p><label for="twitter_company">Địa chỉ Twitter</label><br/>
				 <input style="width:100%; height: 38px;" type="text" name="twitter_company" value="<?php echo get_option('twitter_company')?>" /></p>
				</div>
				<div class="px-15 h-w">
				 <p><label for="youtube_company">Địa chỉ Youtube</label><br/>
				 <input style="width:100%; height: 38px;" type="text" name="youtube_company" value="<?php echo get_option('youtube_company')?>" /></p>
				</div>
				<div class="px-15 h-w">
				 <p><label for="google_plus_company">Địa chỉ Google Plus</label><br/>
				 <input style="width:100%; height: 38px;" type="text" name="google_plus_company" value="<?php echo get_option('google_plus_company')?>" /></p>
				</div>
				<div class="px-15 h-w">
				 <p><label for="instagram_company">Địa chỉ Instagram</label><br/>
				 <input style="width:100%; height: 38px;" type="text" name="instagram_company" value="<?php echo get_option('instagram_company')?>" /></p>
				</div>

				<div class="px-15" style="clear: both;">
				 <p class="submit">
				 <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
				 </p>
				</div>			 
			</div>
		</form>
	</div>
<?php } }
function breadcrumb() {
    global $post; ?>
    <div id="crumbs" class="list-crumb text-capitalize">
    <?php 
    	$name = 'Trang chủ'; 
		
		$home = get_bloginfo('url');
    	if (!is_home()) {
	    echo '<i class="fa fa-home" aria-hidden="true"></i><a href="'.$home.'">' . $name . '</a>';
	    if (is_category()) {
	        echo "<i class='fa fa-angle-double-right'></i>";
	        echo single_cat_title(); 
	        
	    } elseif(is_single() && !is_attachment()) {
	        $cat = get_the_category(); 	        
	        $cat = $cat[0];
	        echo "<i class='fa fa-angle-double-right'></i>";
	        echo get_category_parents($cat, TRUE, '<i class="fa fa-angle-double-right"></i>');
	        //echo get_category_parents($cat, TRUE);
	        //echo "<i class='fa fa-angle-double-right'></i>";
	        echo get_the_title();
	    }       
	    elseif (is_search()) {
	        echo "<i class='fa fa-angle-double-right'></i>" . cerca;
	    }       
	    elseif (is_page() && $post->post_parent) {
	        echo '<i class="fa fa-angle-double-right"></i> <a href="'.get_permalink($post->post_parent).'">';
	        echo get_the_title($post->post_parent);
	        echo "</a><i class='fa fa-angle-double-right'></i> ";
	        echo get_the_title();       
	    }
	    elseif (is_page() OR is_attachment()) {
	        echo "<i class='fa fa-angle-double-right'></i>"; 
	        echo get_the_title();
	    }
	    elseif (is_author()) {
	        echo wp_title('<i class="fa fa-angle-double-right"></i> Profilo');
	        echo "";
	    }
	    elseif (is_404()) {
	        echo "<i class='fa fa-angle-double-right'></i>"; 
	        echo errore_404;
	    }       
	    elseif (is_archive()) {
	    	$taxomy = get_queried_object();
	    	$term = get_term( $taxomy->parent, $taxomy->taxonomy );
	    	echo '<i class="fa fa-angle-double-right"></i>';
	    	if($taxomy->parent == 0) {
		    	echo $taxomy->name;		    	
		    } else {
		    	echo'<a href="'.get_term_link($taxomy->parent,$taxomy->taxonomy).'" title="'.$term->name.'">'.$term->name.'</a>';
		    	echo '<i class="fa fa-angle-double-right"></i>';
		    	echo $taxomy->name;

		    }
	        //echo wp_title('<i class="fa fa-angle-double-right"></i>');       
	    }
    }?>
	</div>
<?php }
function catalog_one_post($name_category = '') {
	$the_query = new WP_Query( array( 'category_name' => $name_category) );
	if ( $the_query->have_posts() ) {		
		$string .='<div class="one-post">';
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
			//$string .= '<h2 class="entry-title">	' .get_the_title() .'</h2>';
	        $string .= ''.get_the_content().'';
		}
	$string .= '</div>';
	}else{/*no posts found*/}
	return $string;
	/* Restore original Post Data */
	wp_reset_postdata();
}
add_action( 'wp_enqueue_scripts', 'remove_head_scripts' );
function tp_admin_logo() {
    echo '<br/> <img src="'. get_template_directory_uri() .'/assets/images/logo.png"/>';
}
add_action( 'admin_notices', 'tp_admin_logo' );
function tp_admin_footer_credits( $text ) {	
	$text='<p>Chào mừng bạn đến với website <a href="'.get_bloginfo( 'url' ).'"  title="'.get_bloginfo( 'name' ).'"><strong>'.get_bloginfo( 'name' ).'</strong></a></p>';
   	return $text;
}
add_filter( 'admin_footer_text', 'tp_admin_footer_credits' );
function custom_loginlogo() {
echo '<style type="text/css">
h1 a {background-image: url("'. get_template_directory_uri() .'/assets/images/logo.png") !important; background-size: contain  !important;width: auto !important;}
</style>';
}
add_action('login_head', 'custom_loginlogo');
// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
// Remove WP Version From Styles 
add_filter( 'style_loader_src', 'sdt_remove_ver_css_js', 9999 );
// Remove WP Version From Scripts
add_filter( 'script_loader_src', 'sdt_remove_ver_css_js', 9999 );
// Function to remove version numbers
function sdt_remove_ver_css_js( $src ) {
 if ( strpos( $src, 'ver=' ) )
  $src = remove_query_arg( 'ver', $src );
 return $src;
}

// add_filter( 'wp_nav_menu_items','add_search_box', 9, 2 );
// function add_search_box( $items, $args ) {
//     $items .= '<li class="wrap-search">' . get_search_form( false ) . '</li>';
//     return $items;
// }
function trim_text_to_words($excerpt, $desired_length = 100){
  $excerpt = wp_strip_all_tags($excerpt);
  $desired_length = $desired_length?:100;
  if (strlen($excerpt) > $desired_length) {
	$excerpt = preg_replace('/\s+?(\S+)?$/', '', substr( $excerpt , 0, $desired_length+1));
  }
  return $excerpt."...";
}

function contactForm() { ?>
		<h5 class="mt-0 mb-4 text-capitalize color-red"><i class="fa fa-wpforms pr-2" aria-hidden="true"></i><strong>Gửi thông tin phản hồi</strong></h5>
        <form action="" method="post" accept-charset="utf-8">                                
          <div class="form-group">
            <input class="form-control style-i" type="text" name="your-name" required="" placeholder="Nhập họ và tên *">
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input class="form-control style-i" type="email" name="your-email" required="" placeholder="Nhập địa chỉ email *">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input class="form-control style-i" type="tel" name="your-tel" placeholder="Nhập số điện thoại">
              </div>
            </div>
          </div>
          <div class="form-group">
            <textarea name="your-message" cols="40" rows="7" class="form-control" placeholder="Nhập nội dung"></textarea>
          </div>
          <div class="form-group text-center">
            <input type="submit" value="Gửi Tin Nhắn" class="btn btn-send" name="btn-send">
          </div>         
        </form>
	<?php if(isset($_POST['btn-send']) ) { 
		$address_company = '';$phone_company = '';$mail_company = '';
		if(get_option('address_company') !='') {
			$address_company = get_option('address_company');
		}
		if(get_option('phone_company') !='') {
			$phone_company = get_option('phone_company');
		}
		if(get_option('mail_company') !='') {
			$mail_company = get_option('mail_company');
		}
		$yourName = trim($_POST['your-name']);
		$email = trim($_POST['your-email']);
		$yourTel = trim($_POST['your-tel']);
		$yourMessage = trim($_POST['your-message']);
		$result = array('status' => 0);
		require(get_stylesheet_directory().'/PHPMailer-5.2.16/PHPMailerAutoload.php');

		$mail  = new PHPMailer();
		$body = "";		
		$mail->IsSMTP();
		$mail->CharSet = "UTF-8";
		$mail->SMTPDebug  = 2;
		$mail->SMTPAuth   = true;
		$mail->Host       = "smtp.gmail.com";
		$mail->SMTPSecure = 'tls';
		$mail->Port       = 587;
		$mail->Username   = "automails123@gmail.com";
		$mail->Password   = "Khongthequen89";
		$mail->SetFrom('admin@gmail.com');
		$mail->addAddress($mail_company);
		$mail->addCC($email,'automails123@gmail.com');
		// $mail->addBCC('automails123@gmail.com');
		$mail->Subject    = "Nội Dung Từ Trang Liên Hệ -  ".get_bloginfo( 'name' )."";//address_company
		$body.="<div style='background-color:#ffffff;color:#000000;font-family:Arial,Helvetica,sans-serif;font-size:15px;margin:0 auto;padding:0'>
		<table align='center' border='0' cellpadding='0' cellspacing='0' style='padding:0;border-spacing:0px;table-layout:fixed;border-collapse:collapse;font-family:Arial,Helvetica,sans-serif;background-color:#f5f5f5;'>
		<tbody><tr><td style='padding:0;margin:0;font-family:Arial,Helvetica,sans-serif;padding-left:40px' bgcolor='#e4e6ea'></td></tr><tr>
			<td bgcolor='#f5f5f5' style='padding:0;margin:0;font-family:Arial,Helvetica,sans-serif'>
				<table border='0' cellpadding='0' cellspacing='0' width='688' align='center' style='padding:0;border-spacing:0px;table-layout:fixed;border-collapse:collapse;font-family:Arial,Helvetica,sans-serif'>
					<tbody>
					<tr>
						<td width='360' align='left' style='padding:0;margin:0;font-family:Arial,Helvetica,sans-serif;padding:10px 0 10px 10px'>
							<a href='".get_bloginfo( 'url' )."' title='".get_bloginfo( 'name' )."' style='text-decoration:none;font-family:Arial,Helvetica,sans-serif' target='_blank'>
								<img src='".get_template_directory_uri()."/assets/images/logo.png' style='border:0;max-width: 100%;height: auto' alt='".get_bloginfo( 'name' )."'>
							</a>
						</td>
						<td width='30' align='left' style='padding:0;margin:0;font-family:Arial,Helvetica,sans-serif'></td>
						<td width='90' align='left' style='padding:0;margin:0;font-family:Arial,Helvetica,sans-serif'><a title='".get_bloginfo( 'name' )."' href='".get_bloginfo( 'url' )."/gioi-thieu' style='text-decoration:none;font-family:Arial,Helvetica,sans-serif;color:#333333;font-size:12px;line-height:20px;display:inline-block' target='_blank'>Giới Thiệu</a></td>
						<td width='30' align='left' style='padding:0;margin:0;font-family:Arial,Helvetica,sans-serif'>
							<a title='".get_bloginfo( 'name' )."' href='".get_bloginfo( 'url' )."/san-pham' style='text-decoration:none;font-family:Arial,Helvetica,sans-serif' target='_blank'>
							</a>
						</td>
						<td width='90' align='left' style='padding:0;margin:0;font-family:Arial,Helvetica,sans-serif'><a title='".get_bloginfo( 'name' )."' href='".get_bloginfo( 'url' )."/lien-he' style='text-decoration:none;font-family:Arial,Helvetica,sans-serif;color:#333333;font-size:12px;line-height:20px;display:inline-block' target='_blank'>Liên Hệ</a></td>
					</tr>
					</tbody>
				</table>
			</td>
		</tr>
		<tr>
			<td style='padding:0;margin:0;font-family:Arial,Helvetica,sans-serif;padding-bottom: 30px'>
			<table align='center' border='0' cellpadding='0' cellspacing='0' width='600' style='border-collapse:collapse' bgcolor='#ffffff'>
				<tbody>
					<tr>
					<td bgcolor='#105aa6' width='100%' height='15px' valign='top'></td>
					</tr>
					<tr>
						<td>
							<table border='0' cellpadding='0' cellspacing='0' width='100%' bgcolor='#ffffff'>
								<tbody>
								<tr>
									<td style='background-color:#105aa6;width:16px;height:100%;padding:0;margin:0;line-height:0;border:none'></td>
									<td style='padding:0px 0 22px 0'>
										<table border='0' cellpadding='0' cellspacing='0' width='100%' style='padding:15px 0 0 0'>
											<tbody>
											<tr>
												<td style='padding:14px 10px 0 24px;font-family:Arial,Helvetica,sans-serif;font-size:15px;color:#1a7138'><b>Nội Dung Liên Hệ</b></td>
											</tr>
											<tr>
												<td style='padding:18px 10px 0 24px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666'>Cảm ơn quý khách ".$yourName." đã gửi nội dung sau tới ".get_bloginfo( 'name' ).":</td>
											</tr>
											<tr>
												<td style='padding:18px 10px 0 24px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666'>
												<div style='background-color: #eee;border:2px solid #f50; padding:20px;margin-bottom:15px'>
													<div style='margin-bottom:10px;'>Tên khách hàng: <b>".$yourName."</b></div>
													<div style='margin-bottom:10px;'>Email khách hàng: <b>".$email."</b></div>
													<div style='margin-bottom:10px;'>Số điện thoại: <b>".$yourTel."</b></div>
													<div>Nội dung: <b>".$yourMessage."</b></div>
												</div>
												</td>
											</tr>
																					
											<tr>
												<td style='padding:3px 10px 0 24px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666;margin-top:30px;'>► Email hỗ trợ: <a href='mailto:".$mail_company."' target='_blank'> <span style='color:#0388cd'>".$mail_company."</span></a> hoặc</td>
											</tr>
											<tr>
												<td style='padding:3px 10px 0 24px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666'>► Tổng đài Chăm sóc khách hàng: <span style='font-weight:bold'>".$phone_company."</span></td>
											</tr>
											<tr>
												<td style='padding:16px 10px 0 24px;font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666'><span style='font-weight:bold'>".get_bloginfo( 'name' )."</span> trân trọng cảm ơn và rất hân hạnh được phục vụ Quý khách.</td>
											</tr>
											<tr>
												<td style='padding:12px 10px 0 24px;font-family:Arial,Helvetica,sans-serif;font-size:11px;color:#666666;font-style:italic'>*Quý khách vui lòng không trả lời email này*.</td>
											</tr>
											</tbody>
										</table>
									</td>
									<td style='background-color:#105aa6;width:16px;height:100%;padding:0;margin:0;line-height:0;border:none'></td>
								</tr>
								</tbody>
							</table>
						</td>
					</tr>
					<tr>
						<td style='background-color:#105aa6;width:100%;height:15px'></td>
					</tr>
				</tbody>
			</table>
			</td>
		</tr>
		</tbody>
		</table>
		<table border='0' cellpadding='0' cellspacing='0' width='600' align='center' style='padding:0;border-spacing:0px;table-layout:fixed;border-collapse:collapse;font-family:Arial,Helvetica,sans-serif;'>
		<tbody>
			<tr>
			<td style='padding:0;margin:0;font-family:Arial,Helvetica,sans-serif;padding-bottom:20px'>
				<table border='0' cellpadding='0' cellspacing='0' width='100%' style='padding:0;border-spacing:0px;table-layout:fixed;border-collapse:collapse;font-family:Arial,Helvetica,sans-serif'>
				<tbody>
					<tr>
					<td style='margin:0;font-family:Arial,Helvetica,sans-serif;padding:20px 0'>
						<table border='0' cellpadding='0' cellspacing='0' width='100%' style='padding:0;border-spacing:0px;table-layout:fixed;border-collapse:collapse;font-family:Arial,Helvetica,sans-serif'>
						<tbody>
							<tr>
							<td style='padding:0;margin:0;font-family:Arial,Helvetica,sans-serif;color:#333333;font-size:15px;line-height:20px;text-transform:uppercase'><b>CÔNG TY TNHH ".get_bloginfo( 'name' )."</b></td>
							</tr>
							<tr>
							<td style='padding:0;margin:0;font-family:Arial,Helvetica,sans-serif;color:#333333;font-size:12px;line-height:20px'><b>Địa chỉ giao dịch:</b>&nbsp;".$address_company."</td> 
							</tr>
							<tr>
							<td style='padding:0;margin:0;font-family:Arial,Helvetica,sans-serif;color:#333333;font-size:12px;line-height:20px'><b>Hotline:</b> ".$phone_company." - Email: <b>".$mail_company."</b></td>
							</tr>				                   
						</tbody>
						</table>
					</td>
					</tr>
				</tbody>
				</table>
			</td>
			</tr>
		</tbody>
		</table>
		</div>";
		$mail->MsgHTML($body);	
		// if  update user return true then lets send user an email containing the new password

		if(!$mail->Send()) {
			echo "Mailer Error: " . $mail->ErrorInfo;
			$result['msg'] = 'There is an error, please check your input and try again';
			$result['debug'] = $mail->ErrorInfo;
		} else {
			$result['status'] = 1;
			echo '<script> window.alert("Cảm ơn Quý Khách đã gửi thông điệp tới '.get_bloginfo( 'name' ).'. '.get_bloginfo( 'name' ).' sẽ sớm phản hồi lại Quý khách hàng.");
					window.location = "'.get_bloginfo( 'url' ).'"</script>';		
		}
	}
}
function catalog_grid($name_category = '') {
	$the_query = new WP_Query( array( 'category_name' => $name_category,'paged' => get_query_var('paged')) );
	if ( $the_query->have_posts() ) {		
		$string ='<div class="row">';
		while ( $the_query->have_posts() ) {
			$the_query->the_post();		
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'full' );	
			if ( has_post_thumbnail() ) {	
				$string .= '<div class="col-12 col-sm-6 col-lg-4 mb-4">
		          <div class="overflow-hidden rounded item-block">
		            <a href="' . get_the_permalink() .'"  title="' . get_the_title() .'">
		              <div class="bg-img mb-3" style="background-image: url('.$thumb['0'].')"></div>
		            </a>    
		            <div class="p-2">
		              <div class="meta-date text-center">
		                <span class="date-time">'.get_the_date().'</span>
		                <span class="author-post">'.get_the_author().'</span>
		              </div>
		              <h3 class="title-h3 mt-2 mb-3 mb-md-2"><a href="' . get_the_permalink() .'"  title="' . get_the_title() .'">' . get_the_title() .'</a></h3>
		              <div class="descripton text-left">'. trim_text_to_words(get_the_content(), 120) .'</div>                  
		            </div>            
		          </div>              
		        </div>';
			} 
		}
	$string .= '</div>';
	}else{/*no posts found*/}
	return $string;
	/* Restore original Post Data */
	wp_reset_postdata();
}
function news_home($post_page = '3') {
	$args = array(
	'category_name' => 'tin-tuc',
	'post_type' => 'post',
	'post_status' => 'publish',
	'posts_per_page' => $post_page, 
	);
	$the_query = new WP_Query($args );
	if ($the_query->have_posts() ) {
		$string = '<div class="row">';	
		$stt=1;
		while ($the_query->have_posts() ) {
			$the_query->the_post();
			//$content = get_the_content();
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
				
				if($stt==1) { 									
			        $string .= '<div class="col-12 col-lg-6 mb-3 mb-md-4 first-post wow fadeInLeft">
			          <div class="overflow-hidden rounded item-block text-center">
			            <a href="' . get_the_permalink() .'"  title="' . get_the_title() .'">';
			            if ( has_post_thumbnail() ) {
			              $string .= '<div class="bg-img mb-3" style="background-image: url('.$thumb['0'].')"></div>';
			            } else {
			            	$string .= '<div class="bg-img mb-3 d-flex align-items-center justify-content-center no-img"><img src="'.get_template_directory_uri().'/assets/images/noimage.jpg" alt="Không có hình ảnh"></div>';
			            }
			            $string .= '</a>
			            <div class="p-3 pt-md-4 pb-md-5 px-md-5">
			              <div class="meta-date">
			                <span class="date-time">'.get_the_date().'</span>
			                <span class="author-post">'.get_the_author().'</span>
			              </div>
			              <h3 class="title-h3 mt-3 mb-3 mb-md-4 text-left"><a href="' . get_the_permalink() .'"  title="' . get_the_title() .'">' . get_the_title() .'</a></h3>
			              <div class="descripton text-left">'. trim_text_to_words(get_the_content(), 350) .'</div>                  
			            </div>            
			          </div>              
			        </div><div class="col-12 col-lg-6 wow fadeInRight">';
				} else { 
		            $string .= '<div class="row mb-3 mb-md-4">
			            <div class="col-sm-6 pr-sm-0">
				            <div class="overflow-hidden rounded-left item-block  text-center">
				                <a href="' . get_the_permalink() .'"  title="' . get_the_title() .'">';
				                if ( has_post_thumbnail() ) {
					              $string .= '<div class="bg-img mb-3" style="background-image: url('.$thumb['0'].')"></div>';
					            } else {
					            	$string .= '<div class="bg-img mb-3 d-flex align-items-center justify-content-center no-img"><img src="'.get_template_directory_uri().'/assets/images/noimage.jpg" alt="Không có hình ảnh"></div>';
					            }
				                  
				                $string .= '</a>
				            </div>  
			            </div>
			            <div class="col-sm-6 pl-sm-0 align-items-center">
			              <div class="p-3 p-md-4 item-block rounded-right h-100">
			                <div class="meta-date">
			                  <span class="date-time">'.get_the_date().'</span>
			                  <span class="author-post">'.get_the_author().'</span>
			                </div>
			                <h3 class="title-h3 mt-3 mb-3 mb-md-4"><a href="' . get_the_permalink() .'"  title="' . get_the_title() .'">' . get_the_title() .'</a></h3>
			                <div class="descripton text-left">'. trim_text_to_words(get_the_content(), 150) .'</div>                  
			              </div>  
			            </div>
			        </div>
		         ';
				}
				
			//}
			 $stt ++;
		}
		$string .= '</div></div><div class="text-center mt-5">
        <a href="'.get_site_url().'/tin-tuc/" class="read-more py-3 px-4 text-capitalize rounded" title="Tin tức">Xem thêm tin tức <i class="fa fa-angle-right pl-2" aria-hidden="true"></i></a>
      </div>';

	}
	return $string;
	/* Restore original Post Data */
	wp_reset_postdata();
}
function panigation() {
	if(paginate_links()!='') {
		echo "<div class='col-12'><div class='paginations text-center'>";		
			global $wp_query;
			$big = 999999999;
			echo paginate_links( array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'prev_text'    => __('<i class="fa fa-angle-left"></i>'),
				'next_text'    => __('<i class="fa fa-angle-right"></i>'),
				'current' => max( 1, get_query_var('paged') ),
				'total' => $wp_query->max_num_pages
			) );
		    
		echo "</div></div>";
	}
}
function get_products_home() {
	$idObj = get_category_by_slug('sanpham'); 
	$cat_id = $idObj->cat_ID;
	//var_dump($idObj);exit();
    $child_categories=get_categories(array( 'parent' => $cat_id ));
    if(count($child_categories) > 0 ) {
    	foreach ( $child_categories as $child ) {?> 
        	<div class="item-list">
                <a href="<?php echo site_url();?>/san-pham/<?php echo $child ->slug; ?>" title="<?php echo $child ->name; ?>">
                  <div class="table">
                    <div class="table-cell">
                      <?php echo $child ->description; ?>
                    </div>
                  </div>                
                  <div class="description">
                    <h3>Sản phẩm mới</h3>
                      <div class="text"><?php echo $child ->name; ?></div>
                  </div>
                </a>
            </div>
        <?php }
    } 
}
function slideshow_register() {
    register_post_type( 'slideshow',  	
		array(
		  'labels' => array(
		    'name' => __( 'Slider show' ),
		    'singular_name' => __( 'Slider show' )
		  ),
		  'hierarchical' => true,
		  'show_ui' => true, 
		  'taxonomies' => array('post_tag'),
		  'public' => true,
		  'has_archive' => true,
		  'menu_position' => 4,
		  'can_export' => true,
		  'capability_type' => 'post',
		  'rewrite' => array('slug' => 'slideshow'),
		  'menu_icon' => 'dashicons-camera', 
        'supports' => array('title','thumbnail'),
		)
	);
	register_taxonomy( 'slider-location', array( 'slideshow' ),
		array(
			'labels' => array(
				'name' => 'Slider Location',
				'menu_name' => 'Slider Location',
				'singular_name' => 'Slider Location',
				'all_items' => 'Slider Location'
			),
			'public' => true,
			'hierarchical' => true,
			'show_ui' => true,
			'rewrite' => array( 'slug' => 'slider-location', 'hierarchical' => true, 'with_front' => false ),
		)
	);

}
add_action('init', 'slideshow_register');
add_action("admin_init", "admin_init");
function admin_init(){
  add_meta_box("url-meta", "Slider Options", "url_meta", "slideshow", "side", "low");
}
function url_meta(){
  global $post;
  $custom = get_post_custom($post->ID);
  $url = $custom["url"][0];
  $url_open = $custom["url_open"][0];
  ?>
  <label>URL:</label>
  <input name="url" value="<?php echo $url; ?>" />
  <input type="checkbox" name="url_open"<?php if($url_open == "on"): echo " checked"; endif ?>>URL open in new window?<br />
  <?php
}

add_action('save_post', 'save_details');
function save_details(){
  global $post;

  if( $post->post_type == "slideshow" ) {
      if(!isset($_POST["url"])):
         return $post;
      endif;
      if($_POST["url_open"] == "on") {
        $url_open_checked = "on";
      } else {
        $url_open_checked = "off";
      }
      update_post_meta($post->ID, "url", $_POST["url"]);
      update_post_meta($post->ID, "url_open", $url_open_checked);
  }
}
function banner_meta_box() {
	add_meta_box( 'banner-info', 'Thông tin banner', 'banner_output', 'slideshow' );
}
add_action( 'add_meta_boxes', 'banner_meta_box' );

function banner_output($post) {
	$des_banner = get_post_meta($post->ID,'des_banner',true);
	wp_nonce_field( 'save_banner', 'banner_nonce' );?>
	<p>
		<label for="des_banner">Description: </label><br>
		<input type="text" style="height:38px;width: 100%" id="des_banner" name="des_banner" value="<?php echo esc_attr($des_banner); ?>"/>
 	</p>	
<?php }
function banner_save($post_id) {
	$banner_nonce = $_POST['banner_nonce'];
	if( !isset($banner_nonce ) ) { return; }
	// Kiểm tra nếu giá trị nonce không trùng khớp
	if( !wp_verify_nonce($banner_nonce, 'save_banner' ) ) { return; }
	$des_banner = sanitize_text_field($_POST['des_banner'] );	
	update_post_meta($post_id, 'des_banner', $des_banner);
}
add_action( 'save_post', 'banner_save' );

function getSliderBanner($post_page = '3') {  
  	$args = array(
    'post_type' => 'slideshow',
    'orderby' => 'date',
    'order' => 'ASC',
    'posts_per_page' => $post_page,
        // 'tax_query' => array(
        //     array(
        //         'taxonomy' => 'slider-location',
        //         'field' => 'slug',
        //         'terms' => 'homeslide-vi',//tên ở trong homslide
        //         'operator' => 'IN'
        //     )
        //  )
    );
    $listbanner = new WP_Query($args); 
    if ($listbanner->have_posts()) {
		while ($listbanner->have_posts() ) : $listbanner->the_post();
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );	
			$post_id = get_the_ID();		
			$des_banner = get_post_meta($post_id, 'des_banner', true );
			$custom = get_post_custom($post->ID);
		    $url = $custom["url"][0]; 
		    $url_open = $custom["url_open"][0];
		    $custom_title = "#".$post->ID; 
		    //if ($url != "") { 
		    ?>
		    	<div class="item" style="background-image: url('<?php echo $thumb['0']; ?>')"></div>	
		    <?php ?>
		<?php endwhile;
	}
	wp_reset_query(); 
}
function create_posttype_sanpham() {
	register_post_type( 'sanpham',  	
		array(
		  'labels' => array(
		    'name' => __( 'Sản Phẩm' ),
		    'singular_name' => __( 'sanpham' ),
        	'add_new_item'        => __( 'Thêm sản phẩm mới'),
        	'add_new'             => __( 'Thêm sản phẩm mới' ),
        	'update_item'         => __( 'Cập nhật sản phẩm' ),
        	'search_items'        => __( 'Tìm kiếm sản phẩm ' ),
	        'edit_item'           => __( 'Chỉnh sửa sản phẩm ' ),
		  ),
		  'hierarchical' => true,
		  'show_ui' => true, 
		  'taxonomies' => array('post_tag'),
		  'public' => true,
		  'has_archive' => true,
		  'menu_position' => 5,
		  'can_export' => true,
		  'capability_type' => 'post',
		  'rewrite' => array('slug' => 'san-pham'),
		  'menu_icon' => 'dashicons-admin-multisite', 
		  'show_in_nav_menus' => true,
		  'supports' => array('title','editor','thumbnail','comments','excerpt', 'custom-fields','author','trackbacks','post-formats','revisions') 
		)
	);
	register_taxonomy( 'danh-muc-san-pham', array( 'sanpham' ),
		array(
			'labels' => array(
				'name' => 'Danh mục Sản Phẩm',
				'menu_name' => 'Danh mục Sản Phẩm',
				'singular_name' => 'danh-muc-san-pham',
				'all_items' => 'Danh mục Sản Phẩm'
			),
			'public' => true,
			'hierarchical' => true,
			'show_ui' => true,
			'rewrite' => array( 'slug' => 'danh-muc-san-pham', 'hierarchical' => true, 'with_front' => false ),
		)
	);
}
add_action( 'init', 'create_posttype_sanpham' );

function get_custom_post_type_template($single_template) {
	global $post;
	if ($post->post_type == 'sanpham') {
		$single_template = dirname( __FILE__ ) . '/single-san-pham.php';
	}
	// if ($post->post_type == 'videos') {
	// 	$single_template = dirname( __FILE__ ) . '/single-videos.php';
	// }
	return $single_template;
}
add_filter( 'single_template', 'get_custom_post_type_template' );
flush_rewrite_rules(); 
function sanpham_meta_box() {
	add_meta_box( 'sanpham-info', 'Thông tin sản phẩm', 'sanpham_output', 'sanpham' );
}
add_action( 'add_meta_boxes', 'sanpham_meta_box' );

function sanpham_output($post) {
	$price = get_post_meta($post->ID,'price',true);
	$price_promo = get_post_meta($post->ID,'price_promo',true);
	
	$color = get_post_meta($post->ID,'color',true);
	$model = get_post_meta($post->ID,'model',true);
	$tinhtrang = get_post_meta($post->ID,'tinhtrang',true);
	$xuatxu = get_post_meta($post->ID,'xuatxu',true);
	$congsuat = get_post_meta($post->ID,'congsuat',true);
	$namsanxuat = get_post_meta($post->ID,'namsanxuat',true);
	$chongoi = get_post_meta($post->ID,'chongoi',true);
	$bodieukhien = get_post_meta($post->ID,'bodieukhien',true);
	$binhdien = get_post_meta($post->ID,'binhdien',true);
	$kichthuoc = get_post_meta($post->ID,'kichthuoc',true);
	$tocdotoida = get_post_meta($post->ID,'tocdotoida',true);
	$leodoc = get_post_meta($post->ID,'leodoc',true);
	$taitrong = get_post_meta($post->ID,'taitrong',true);
	$hangxe = get_post_meta($post->ID,'hangxe',true);
	$loaixe = get_post_meta($post->ID,'loaixe',true);
	$phamvivanchuyen = get_post_meta($post->ID,'phamvivanchuyen',true);
	
	wp_nonce_field( 'save_sanpham', 'sanpham_nonce' );?>

	<div class="block-config-mymenu">
		<div class="px-15 h-w">
			<p>
				<label for="price" style="color:#000;font-weight: bold">Giá: </label><br>		
				<input type="number" style="height:38px;width: 100%" id="price" name="price" placeholder="1.500.000" step="any" value="<?php echo esc_attr($price); ?>"/>
		 	</p>
		</div>
		<div class="px-15 h-w">			
		 	<p>
				<label for="price_promo" style="color:#000;font-weight: bold">Giá khuyến mãi: </label><br>		
				<input type="number" style="height:38px;width: 100%" id="price_promo" name="price_promo" placeholder="1.500.000" step="any" value="<?php echo esc_attr($price_promo); ?>"/>
		 	</p>
		</div>
		<div class="px-15 h-w">
			<p>
				<label for="color">Màu sắc: </label><br>
				<input type="text" style="height:38px;width: 100%" id="color" name="color" placeholder="đỏ" value="<?php echo esc_attr($color); ?>"/>
		 	</p>	
		</div>
		<div class="px-15 h-w">
			<p>
				<label for="model" style="color:#000;font-weight: bold">MODEL: </label><br>
				<input type="text" style="height:38px;width: 100%" id="model" name="model" value="<?php echo esc_attr($model); ?>"/>
		 	</p>
		</div>
		<div class="px-15 h-w">
		 	<p>
				<label for="tinhtrang" style="color:#000;font-weight: bold">TÌNH TRẠNG: </label><br>
		 		<select name="tinhtrang" class="select-auto" style="width: 100%">
					<option value="cũ"  <?php selected($tinhtrang, 'cũ' ); ?>>Cũ</option>
					<option value="mới"  <?php selected($tinhtrang, 'mới' ); ?>>Mới</option>
				</select>
		 	</p>
		</div>
		<div class="px-15 h-w">
		 	<p>
				<label for="xuatxu" style="color:#000;font-weight: bold">XUẤT XỨ: </label><br>
				<input type="text" style="height:38px;width: 100%" id="xuatxu" placeholder="USA" name="xuatxu" value="<?php echo esc_attr($xuatxu); ?>"/>
		 	</p>
		</div>
		<div class="px-15 h-w">
		 	<p>
				<label for="congsuat" style="color:#000;font-weight: bold">CÔNG SUẤT ĐỘNG CƠ: </label><br>
				<input type="text" style="height:38px;width: 100%" id="congsuat" placeholder="48 Vol/5 Kw Series" name="congsuat" value="<?php echo esc_attr($congsuat); ?>"/>
		 	</p>
		</div>
		<div class="px-15 h-w">
		 	<p>
				<label for="namsanxuat" style="color:#000;font-weight: bold">NĂM SẢN XUẤT: </label><br>
				<input type="text" style="height:38px;width: 100%" id="namsanxuat" placeholder="2019" name="namsanxuat" value="<?php echo esc_attr($namsanxuat); ?>"/>
		 	</p>
		</div>
		<div class="px-15 h-w">
		 	<p>
				<label for="chongoi" style="color:#000;font-weight: bold">SỐ CHỖ NGỒ: </label><br>
				<input type="text" style="height:38px;width: 100%" id="chongoi" placeholder="12" name="chongoi" value="<?php echo esc_attr($chongoi); ?>"/>
		 	</p>
		</div>
		<div class="px-15 h-w">
		 	<p>
				<label for="bodieukhien" style="color:#000;font-weight: bold">BỘ ĐIỀU KHIỂN: </label><br>
				<input type="text" style="height:38px;width: 100%" id="bodieukhien" placeholder="Curtis 1204M (400Ah)" name="bodieukhien" value="<?php echo esc_attr($bodieukhien); ?>"/>
		 	</p>
		</div>
		<div class="px-15 h-w">
		 	<p>
				<label for="binhdien" style="color:#000;font-weight: bold">BÌNH ĐIỆN/HỘP ĐIỆN: </label><br>
				<input type="text" style="height:38px;width: 100%" id="binhdien" placeholder="Trojan 8 Pcsx 6Vol (185Ah)" name="binhdien" value="<?php echo esc_attr($binhdien); ?>"/>
		 	</p>
		</div>
		<div class="px-15 h-w">
		 	<p>
				<label for="kichthuoc" style="color:#000;font-weight: bold">KÍCH THƯỚC XE (MM): </label><br>
				<input type="text" style="height:38px;width: 100%" id="kichthuoc" placeholder="5180 x 1630 x 1950" name="kichthuoc" value="<?php echo esc_attr($kichthuoc); ?>"/>
		 	</p>
		</div>
		<div class="px-15 h-w">
		 	<p>
				<label for="tocdotoida" style="color:#000;font-weight: bold">TỐC ĐỘ TỐI ĐA: </label><br>
				<input type="text" style="height:38px;width: 100%" id="tocdotoida" placeholder="30km/h" name="tocdotoida" value="<?php echo esc_attr($tocdotoida); ?>"/>
		 	</p>
		</div>
		<div class="px-15 h-w">
		 	<p>
				<label for="leodoc" style="color:#000;font-weight: bold">KHẢ NĂNG LEO DỐC: </label><br>
				<input type="text" style="height:38px;width: 100%" id="leodoc" name="leodoc" placeholder="15%" value="<?php echo esc_attr($leodoc); ?>"/>
		 	</p>
		</div>
		<div class="px-15 h-w">
		 	<p>
				<label for="taitrong" style="color:#000;font-weight: bold">TẢI TRỌNG CHO PHÉP: </label><br>
				<input type="text" style="height:38px;width: 100%" id="taitrong" placeholder="720" name="taitrong" value="<?php echo esc_attr($taitrong); ?>"/>
		 	</p>
		</div>
		<div class="px-15 h-w">
		 	<p>
				<label for="hangxe" style="color:#000;font-weight: bold">HÃNG XE: </label><br>
				<input type="text" style="height:38px;width: 100%" id="hangxe" placeholder="Xe Điện Eagles" name="hangxe" value="<?php echo esc_attr($hangxe); ?>"/>
		 	</p>
		</div>
		<div class="px-15 h-w">
		 	<p>
				<label for="loaixe" style="color:#000;font-weight: bold">LOẠI XE: </label><br>
				<input type="text" style="height:38px;width: 100%" id="loaixe" placeholder="Xe điện chở hàng" name="loaixe" value="<?php echo esc_attr($loaixe); ?>"/>
		 	</p>
		</div>
		<div class="px-15 h-w">
		 	<p>
				<label for="phamvivanchuyen" style="color:#000;font-weight: bold">PHẠM VI VẬN CHUYỂN: </label><br>
				<input type="text" style="height:38px;width: 100%" id="phamvivanchuyen" placeholder="100km" name="phamvivanchuyen" value="<?php echo esc_attr($phamvivanchuyen); ?>"/>
		 	</p>
		</div>
		
	</div>
 	
<?php }
function sanpham_save($post_id) {
	$sanpham_nonce = $_POST['sanpham_nonce'];
	// Kiểm tra nếu nonce chưa được gán giá trị
	if( !isset($sanpham_nonce ) ) { return; }
	// Kiểm tra nếu giá trị nonce không trùng khớp
	if( !wp_verify_nonce($sanpham_nonce, 'save_sanpham' ) ) { return; }
	
	$price = (isset($_POST["price"])) ? $_POST["price"] : '';
	update_post_meta($post_id, 'price', $price);
	//$features = sanitize_text_field($_POST['features'] );	
	$color = (isset($_POST["color"])) ? $_POST["color"] : '';
	update_post_meta($post_id, 'color', $color);
	//$remark = sanitize_text_field($_POST['remark'] );	
	$model = (isset($_POST["model"])) ? $_POST["model"] : '';
	update_post_meta($post_id, 'model', $model);
	$price_promo = (isset($_POST["price_promo"])) ? $_POST["price_promo"] : '';
	update_post_meta($post_id, 'price_promo', $price_promo);

	$tinhtrang = (isset($_POST["tinhtrang"])) ? $_POST["tinhtrang"] : '';
	update_post_meta($post_id, 'tinhtrang', $tinhtrang);
	$xuatxu = (isset($_POST["xuatxu"])) ? $_POST["xuatxu"] : '';
	update_post_meta($post_id, 'xuatxu', $xuatxu);
	$congsuat = (isset($_POST["congsuat"])) ? $_POST["congsuat"] : '';
	update_post_meta($post_id, 'congsuat', $congsuat);
	$namsanxuat = (isset($_POST["namsanxuat"])) ? $_POST["namsanxuat"] : '';
	update_post_meta($post_id, 'namsanxuat', $namsanxuat);
	$chongoi = (isset($_POST["chongoi"])) ? $_POST["chongoi"] : '';
	update_post_meta($post_id, 'chongoi', $chongoi);
	$bodieukhien = (isset($_POST["bodieukhien"])) ? $_POST["bodieukhien"] : '';
	update_post_meta($post_id, 'bodieukhien', $bodieukhien);
	$binhdien = (isset($_POST["binhdien"])) ? $_POST["binhdien"] : '';
	update_post_meta($post_id, 'binhdien', $binhdien);
	$kichthuoc = (isset($_POST["kichthuoc"])) ? $_POST["kichthuoc"] : '';
	update_post_meta($post_id, 'kichthuoc', $kichthuoc);

	$tocdotoida = (isset($_POST["tocdotoida"])) ? $_POST["tocdotoida"] : '';
	update_post_meta($post_id, 'tocdotoida', $tocdotoida);
	$leodoc = (isset($_POST["leodoc"])) ? $_POST["leodoc"] : '';
	update_post_meta($post_id, 'leodoc', $leodoc);
	$taitrong = (isset($_POST["taitrong"])) ? $_POST["taitrong"] : '';
	update_post_meta($post_id, 'taitrong', $taitrong);
	$hangxe = (isset($_POST["hangxe"])) ? $_POST["hangxe"] : '';
	update_post_meta($post_id, 'hangxe', $hangxe);
	$loaixe = (isset($_POST["loaixe"])) ? $_POST["loaixe"] : '';
	update_post_meta($post_id, 'loaixe', $loaixe);
	$phamvivanchuyen = (isset($_POST["phamvivanchuyen"])) ? $_POST["phamvivanchuyen"] : '';
	update_post_meta($post_id, 'phamvivanchuyen', $phamvivanchuyen);
	

}
add_action( 'save_post', 'sanpham_save' );

//https://pluginrepublic.com/adding-an-image-upload-field-to-categories/
add_action('init', 'my_category_module');
function my_category_module() {
	add_action( 'category_add_form_fields',  'add_category_image' , 10, 2 );
	add_action( 'created_category',  'save_category_image' , 10, 2 );
	add_action( 'category_edit_form_fields',  'update_category_image' , 10, 2 );
	add_action( 'edited_category',  'updated_category_image' , 10, 2 );

	// add_action( 'danh-muc-gallery_add_form_fields', 'add_category_image', 10, 2 ); 
	// add_action( 'created_danh-muc-gallery',  'save_category_image' , 10, 2 );
	// add_action( 'danh-muc-gallery_edit_form_fields',  'update_category_image' , 10, 2 );
	// add_action( 'edited_danh-muc-gallery',  'updated_category_image' , 10, 2 );

	add_action( 'danh-muc-san-pham_add_form_fields', 'add_category_image', 10, 2 ); 
	add_action( 'created_danh-muc-san-pham',  'save_category_image' , 10, 2 );
	add_action( 'danh-muc-san-pham_edit_form_fields',  'update_category_image' , 10, 2 );
	add_action( 'edited_danh-muc-san-pham',  'updated_category_image' , 10, 2 );

	add_action( 'admin_enqueue_scripts', 'load_media' );
	add_action( 'admin_footer',  'add_script' );
}
function load_media() {
 wp_enqueue_media();
}
function add_category_image ( $taxonomy ) { ?>
   <div class="form-field term-group">
     <label for="category-image-id"><?php _e('Image', 'hero-theme'); ?></label>
     <input type="hidden" id="category-image-id" name="category-image-id" class="custom_media_url" value="">
     <div id="category-image-wrapper"></div>
     <p>
       <input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button" name="ct_tax_media_button" value="<?php _e( 'Add Image', 'hero-theme' ); ?>" />
       <input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove" name="ct_tax_media_remove" value="<?php _e( 'Remove Image', 'hero-theme' ); ?>" />
    </p>
   </div>
<?php }
function save_category_image ( $term_id, $tt_id ) {
   if( isset( $_POST['category-image-id'] ) && '' !== $_POST['category-image-id'] ){
     $image = $_POST['category-image-id'];
     add_term_meta( $term_id, 'category-image-id', $image, true );
   }
}
function update_category_image ( $term, $taxonomy ) { ?>
   <tr class="form-field term-group-wrap">
     <th scope="row">
       <label for="category-image-id"><?php _e( 'Image', 'hero-theme' ); ?></label>
     </th>
     <td>
       <?php $image_id = get_term_meta ( $term -> term_id, 'category-image-id', true ); ?>
       <input type="hidden" id="category-image-id" name="category-image-id" value="<?php echo $image_id; ?>">
       <div id="category-image-wrapper">
         <?php if ( $image_id ) { ?>
           <?php echo wp_get_attachment_image ( $image_id, 'thumbnail' ); ?>
         <?php } ?>
       </div>
       <p>
         <input type="button" class="button button-secondary ct_tax_media_button" id="ct_tax_media_button" name="ct_tax_media_button" value="<?php _e( 'Add Image', 'hero-theme' ); ?>" />
         <input type="button" class="button button-secondary ct_tax_media_remove" id="ct_tax_media_remove" name="ct_tax_media_remove" value="<?php _e( 'Remove Image', 'hero-theme' ); ?>" />
       </p>
     </td>
   </tr>
<?php }
function updated_category_image ( $term_id, $tt_id ) {
   if( isset( $_POST['category-image-id'] ) && '' !== $_POST['category-image-id'] ){
     $image = $_POST['category-image-id'];
     update_term_meta ( $term_id, 'category-image-id', $image );
   } else {
     update_term_meta ( $term_id, 'category-image-id', '' );
   }
}
function add_script() { ?>
   <script>
     jQuery(document).ready( function($) {
       function ct_media_upload(button_class) {
         var _custom_media = true,
         _orig_send_attachment = wp.media.editor.send.attachment;
         $('body').on('click', button_class, function(e) {
           var button_id = '#'+$(this).attr('id');
           var send_attachment_bkp = wp.media.editor.send.attachment;
           var button = $(button_id);
           _custom_media = true;
           wp.media.editor.send.attachment = function(props, attachment){
             if ( _custom_media ) {
               $('#category-image-id').val(attachment.id);
               $('#category-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
               $('#category-image-wrapper .custom_media_image').attr('src',attachment.url).css('display','block');
             } else {
               return _orig_send_attachment.apply( button_id, [props, attachment] );
             }
            }
         wp.media.editor.open(button);
         return false;
       });
     }
     ct_media_upload('.ct_tax_media_button.button'); 
     $('body').on('click','.ct_tax_media_remove',function(){
       $('#category-image-id').val('');
       $('#category-image-wrapper').html('<img class="custom_media_image" src="" style="margin:0;padding:0;max-height:100px;float:none;" />');
     });
     // Thanks: http://stackoverflow.com/questions/15281995/wordpress-create-category-ajax-response
     $(document).ajaxComplete(function(event, xhr, settings) {
       var queryStringArr = settings.data.split('&');
       if( $.inArray('action=add-tag', queryStringArr) !== -1 ){
         var xml = xhr.responseXML;
         $response = $(xml).find('term_id').text();
         if($response!=""){
           // Clear the thumb image
           $('#category-image-wrapper').html('');
         }
       }
     });
   });
 </script>
<?php }
function gallery_enqueue_hook($hook) { 
    if ( 'post.php' == $hook || 'post-new.php' == $hook ) { 
		wp_enqueue_media();
		wp_enqueue_script('gallery-metabox', get_template_directory_uri() . '/assets/js/gallery-metabox.js', array('jquery', 'jquery-ui-sortable')); 
		wp_enqueue_script('gallery-metabox', get_template_directory_uri() . '/assets/js/ajax-upload.js'); 		
		wp_enqueue_style('gallery-metabox', get_template_directory_uri() . '/assets/css/gallery-metabox.css'); 
    } 
} 
add_action('admin_enqueue_scripts', 'gallery_enqueue_hook');
function add_gallery_metabox($post_type) {
	//$types = array('post','events','khoa_hoc','sanpham');
	$types = array('post','sanpham','gallery');
	if (in_array($post_type, $types)) {
  		add_meta_box('gallery-metabox','Slider Hình Ảnh','gallery_meta_callback',$post_type,'normal','high');}  
	}
add_action('add_meta_boxes', 'add_gallery_metabox');

function gallery_meta_callback($post) {
   wp_nonce_field( basename(__FILE__), 'gallery_meta_nonce' );
   $ids = get_post_meta($post->ID, 'tdc_gallery_id', true);
?>
 <table class="form-table" id="gallery-metabox">
   <tr><td>
      <a class="gallery-add button" href="#" data-uploader-title="Thêm hình ảnh" data-uploader-button-text="Thêm nhiều hình ảnh">Thêm nhiều hình ảnh</a>
      <ul id="gallery-metabox-list">
        <?php if ($ids) : foreach ($ids as $key => $value) : $image = wp_get_attachment_image_src($value); ?>
        <li>
           <input type="hidden" name="tdc_gallery_id[<?php echo $key; ?>]" value="<?php echo $value; ?>">
           <img class="image-preview" src="<?php echo $image[0]; ?>">
           <a class="change-image button button-small" href="#" data-uploader-title="Đổi hình khác" data-uploader-button-text="Đổi hình khác">Đổi hình khác</a><br>
           <small><a class="remove-image" href="#">Xóa hình</a></small>
        </li>
        <?php endforeach; endif; ?>
     </ul>
  </td></tr>
 </table>
 <?php }

function gallery_meta_save($post_id) {
  if (!isset($_POST['gallery_meta_nonce']) || !wp_verify_nonce($_POST['gallery_meta_nonce'], basename(__FILE__))) return;
  if (!current_user_can('edit_post', $post_id)) return;
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

  if(isset($_POST['tdc_gallery_id'])) {
    update_post_meta($post_id, 'tdc_gallery_id', $_POST['tdc_gallery_id']);
  } else {
    delete_post_meta($post_id, 'tdc_gallery_id');
  }
 }
add_action('save_post', 'gallery_meta_save');

function related_taxomy_posts($post_page='8') {
	global $post;
		    
	$taxonomies_curren_post = get_post_taxonomies($post->ID);
	$get_temr = get_the_terms($post->ID , $taxonomies_curren_post);
	$temr_id = $get_temr[0]->term_id;
	$taxomy_id = $get_temr[0]->taxonomy;
	$custom_taxterms = wp_get_object_terms($post->ID, $taxomy_id, array('fields' => 'ids') );
	$args = array(
	'post_type' => get_post_type($post->ID),
	'post_status' => 'publish',
	'posts_per_page' => $post_page, // you may edit this number
	'orderby' => 'rand',
	'tax_query' => array(
	    array(
	        'taxonomy' => $taxomy_id,
	        'field' => 'id',
	        'terms' => $temr_id,
	        'operator' => 'IN'
	    )
	),
	'post__not_in' => array ($post->ID),
	);
	$related_items = new WP_Query($args );
	// loop over query
	if ($related_items->have_posts()) :
		
			echo '<div data-related>';
				
		while ($related_items->have_posts() ) : $related_items->the_post();
			$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
            <div class="item px-1">
              <div class="my-3 box-1">
                <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>">
                  <div class="box-fix-h d-flex align-items-center justify-content-center p-3">
                   	<?php echo get_the_post_thumbnail( get_the_id(), 'full', array( 'class' =>'img-fluid mx-auto')); ?>
                  </div>
                  <h3 class="mt-3 mb-0 title-h3 text-capitalize py-2 px-1 d-flex align-items-center">
                    <span class="pr-2"><?php the_title(); ?></span>
                  <i class="ml-auto fa fa-angle-right" aria-hidden="true"></i>
                  </h3>
                </a>
              </div>              
            </div>
		<?php endwhile;
		echo '</div></div>';
	endif;
	// Reset Post Data
	wp_reset_postdata();
}
function getYoutubeEmbedUrl($url) {
    $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
	$longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

    if (preg_match($longUrlRegex, $url, $matches)) {
        $youtube_id = $matches[count($matches) - 1];
    }

    if (preg_match($shortUrlRegex, $url, $matches)) {
        $youtube_id = $matches[count($matches) - 1];
    }
    return 'https://www.youtube.com/embed/' . $youtube_id ;
}

function newsLetter() {?>
	<div class="new-letter">
		<form method="post" accept-charset="utf-8" enctype="multipart/form-data" id="subscribe-form"> 
	      <div class="pb-2">Đăng Ký Nhận Bản Tin</div>
	      <div class="position-relative">
	        <input type="email" required="" name="mail_subscribe" class="form-control mail_subscribe pr-4 pr-md-5" placeholder="Enter your Email">
	        <button class="btn" type="submit" name="btn-subscribe" id="btn-subscribe"><i class="fa fa-angle-right" aria-hidden="true"></i></button>                        
	      </div>                   
	    </form>
	    <div class="error-sub-mail mt-1"></div>	    
	</div>	
<?php }

function cptui_register_my_cpts() {
	/**
	 * Post type: News Letter.
	 */
	$labels = array(
		"name" => __( "Nhận Bản Tin", "xediendpt" ),
		"singular_name" => __( "Sub Email", "xediendpt" ),
	);

	$args = array(
		"label" => __( "Nhận Bản Tin", "xediendpt" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"exclude_from_search" => true,
		"capability_type" => "post",
		'menu_position' => 10,
		"map_meta_cap" => true,
		"hierarchical" => false,
		'menu_icon' => 'dashicons-email-alt', 
		"rewrite" => array( "slug" => "sub_email", "with_front" => true ),
		"query_var" => true,
		"supports" => array( "title", "thumbnail" ),
	);
	register_post_type( "sub_email", $args );
}
add_action( 'init', 'cptui_register_my_cpts' );
function submail_meta_box() {
	add_meta_box( 'sub-mail', 'Submail Infor', 'submail_output', 'sub_email' );
}
add_action( 'add_meta_boxes', 'submail_meta_box' );
function submail_output($post) {
	$email_sub = get_post_meta($post->ID,'email_sub',true);
	$status_sub = get_post_meta($post->ID,'status_sub',true);
	wp_nonce_field( 'save_submail', 'submail_nonce' );
?>	
	<table style="width: 100%">
		<tbody>
			<tr>
				<td>Email:</td>
				<td><input type="email" style="width: 100%" name="email_sub" value="<?php echo esc_attr($email_sub); ?>" /></td>
			</tr>
			<tr><td colspan="2">&nbsp;</td></tr>
			<tr>
				<td>Status:</td>
				<td>
					<select style="width: 100%" name="status_sub">
			 			<option value="Active" <?php selected($status_sub, 'Active' ); ?>>Active</option>
			 			<option value="InActive" <?php selected($status_sub, 'InActive' ); ?>>InActive</option>
			 		</select>
			 	</td>
			</tr>
		</tbody>
	</table> 	
<?php }
function submail_save($post_id) {
	$submail_nonce = $_POST['submail_nonce'];
	// Kiểm tra nếu nonce chưa được gán giá trị
	if( !isset($submail_nonce ) ) {
	return;
	}
	// Kiểm tra nếu giá trị nonce không trùng khớp
	if( !wp_verify_nonce($submail_nonce, 'save_submail' ) ) {
		return;
	}
	$email_sub = sanitize_text_field($_POST['email_sub'] );	
	$status_sub = sanitize_text_field($_POST['status_sub'] );	
	update_post_meta($post_id, 'email_sub', $email_sub);
	update_post_meta($post_id, 'status_sub', $status_sub);
}
add_action( 'save_post', 'submail_save' );


add_action( 'restrict_manage_posts', 'add_export_button' );
function add_export_button() {
    $screen = get_current_screen();

    //if (isset($screen->parent_file) && ('edit.php' == $screen->parent_file)) { add for post
    if($screen->post_type != 'sub_email' ) {
    	return;
    }
        ?>
        <input type="submit" name="export_all_email" id="export_all_email" class="button button-primary" value="Xuất Tất Cả Các Emails">
        <script type="text/javascript">
            jQuery(function($) {
                $('#export_all_email').insertAfter('#post-query-submit');
            });
        </script>
        <?php
}

//Export post type to excel file
add_action( 'init', 'func_export_all_email' );
function func_export_all_email() {
    if(isset($_GET['export_all_email'])) {
        $arg = array(
            'post_type' => 'sub_email',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'meta_input' => array(
			    'status_sub' => 'active'
			)
        );
        global $post;
				$arr_post = get_posts($arg);
        if ($arr_post) {
            header('Content-type: text/csv');
            header('Content-Disposition: attachment; filename="list-email.csv"');
            header('Pragma: no-cache');
            header('Expires: 0');
            $file = fopen('php://output', 'w');
            fputcsv($file, array('List Emails Newsletter'));
            foreach ($arr_post as $post) {
            	$email_text = get_post_meta($post->ID, 'email_sub', TRUE );
                setup_postdata($post);
                //fputcsv($file, array(get_the_title(), get_the_permalink()));
                fputcsv($file, array($email_text));
            }
            exit();
        }
    }
}

//if(!check_ajax_referer('thongbao', 'mail_subscribe-form')) wp_die();
add_action( 'wp_ajax_thongbao', 'thongbao_init' );
add_action( 'wp_ajax_nopriv_thongbao', 'thongbao_init' );
function thongbao_init() {
    //do bên js để dạng json nên giá trị trả về dùng phải encode
    $mail_subscribe= (isset($_POST['email_sub']))?esc_attr($_POST['email_sub']) : '';
     //wp_send_json_success($mail_subscribe);
    global $wpdb;

	$get_emial_loop = new WP_Query(
	  	array(
		    'post_type' => 'sub_email',
		    'meta_query' => array(
		        array(
		            'key' => 'email_sub',
		            'value' => $mail_subscribe,
		            'compare' => 'LIKE'
		        )
		    )
		)
	);

	if( $get_emial_loop->have_posts() ) {
		//echo "Email đã có trong hệ thống";
		// $response = 1;
		echo json_encode( array('success' => false) );
		die;
	} else {
	  	wp_insert_post(
	      	array(
		        'post_author' => $mail_subscribe,
		        'post_content' => $mail_subscribe,
		        'post_content_filtered' => '',
		        'post_title' => $mail_subscribe,
		        'post_excerpt' => '',
		        'post_status' => 'Publish',
		        'post_type' => 'sub_email',
		        'comment_status' => '',
		        'ping_status' => '',
		        'post_password' => '',
		        'to_ping' =>  '',
		        'pinged' => '',
		        'post_parent' => 0,
		        'menu_order' => 0,
		        'guid' => '',
		        'import_id' => 0,
		        'context' => '',
		        'meta_input' => array(
				    'email_sub' => $mail_subscribe,
				    'status_sub' => 'active'
				)
		    )
			);
		echo json_encode( array('success' => true) );
		die;
	}
//    die();//bắt buộc phải có khi kết thúc
}


function share_social() {?> 
	<ul class="nav socials mb-3 mt-3 pt-3">
		<li class="btn-goback"><a rel="nofollow" href="javascript:window.history.back(-1);">Quay lại<i class="fa fa-reply-all ml-1" aria-hidden="true"></i></a></li>
	        <li class="print pl-3"><a  onclick="javascript:window.print();" rel="nofollow" href="javascript:void(0)">In bài này<i class="fa fa-print ml-1" aria-hidden="true"></i></a></li>
		<li class="nav-item mr-4 ml-4"><strong>Chia Sẻ:</strong></li>
		<li class="nav-item"><a class="pr-4" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>&title=<?php echo get_the_title(get_the_ID()); ?>" target="_blank" title="Share on facebook"><i class="fa fa-facebook-square"></i></a></li>
		<li class="nav-item"><a class="pr-4" href="https://telegram.me/share/url?url=<?php echo urlencode(get_permalink()); ?>" target="_blank" title="Share on telegram"><i class="fa fa-telegram"></i></a></li>
		<li class="nav-item"><a class="pr-4" href="https://twitter.com/intent/tweet?text=<?php echo urlencode(get_the_title()); ?>+<?php echo get_permalink(); ?>" target="_blank" title="Share on twitter"><i class="fa fa-twitter"></i></a></li>
		<li class="nav-item"><a class="pr-4" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo urlencode(get_permalink()); ?>&title=<?php echo get_the_title(get_the_ID()); ?>" target="_blank" title="Share on LinkedIn"><i class="fa fa-linkedin"></i></a></li>
		<li class="nav-item"><a href="https://reddit.com/submit?url=<?php echo urlencode(get_permalink()); ?>&title=<?php echo get_the_title(get_the_ID()); ?>" target="_blank" title="Share on Reddit"><i class="fa fa-reddit-square"></i></a></li>
	</ul>
<?php }

function create_posttype_review() {
	register_post_type( 'review',  	
		array(
		  'labels' => array(
		    'name' => __( 'Đánh giá Khách hàng' ),
		    'singular_name' => __( 'Custom review' )
		  ),
		  'hierarchical' => true,
		  'show_ui' => true, 
		  'taxonomies' => array('post_tag'),
		  'public' => true,
		  'has_archive' => true,
		  'menu_position' => 9,
		  'can_export' => true,
		  'capability_type' => 'post',
		  'rewrite' => array('slug' => 'review'),
		  'menu_icon' => 'dashicons-book', 
		  'supports' => array('title','editor','thumbnail','comments','excerpt', 'custom-fields','author','trackbacks','post-formats','revisions') 
		)
	);
}
add_action( 'init', 'create_posttype_review' );

function review_meta_box() {
	add_meta_box( 'review-info', 'Thông tin đánh giá', 'review_output', 'review' );
}
add_action( 'add_meta_boxes', 'review_meta_box' );

function review_output($post) {
	$chucvu = get_post_meta($post->ID,'chucvu',true);
	$name_review = get_post_meta($post->ID,'name_review',true);
	//$content_review = get_post_meta($post->ID,'content_review',true);
	wp_nonce_field( 'save_review', 'review_nonce' );?>
	<p>
		<label for="name_review">Tên người đánh giá: </label><br>
		<input type="text" style="height:38px;width: 100%" id="name_review" placeholder="Nhập tên người đánh giá" name="name_review" value="<?php echo esc_attr($name_review); ?>"/>
 	</p>	
	<p>
		<label for="chucvu">Nghề nghiệp </label><br>
		<input type="text" style="height:38px;width: 100%" id="chucvu" placeholder="Nhập nghề nghiệp" name="chucvu" value="<?php echo esc_attr($chucvu); ?>"/>
 	</p>
 	
<?php }
function review_save($post_id) {
	$review_nonce = $_POST['review_nonce'];
	if( !isset($review_nonce ) ) { return; }
	// Kiểm tra nếu giá trị nonce không trùng khớp
	if( !wp_verify_nonce($review_nonce, 'save_review' ) ) { return; }
	$chucvu = sanitize_text_field($_POST['chucvu'] );	
	update_post_meta($post_id, 'chucvu', $chucvu);
	$name_review = sanitize_text_field($_POST['name_review'] );	
	update_post_meta($post_id, 'name_review', $name_review);
	
}
add_action( 'save_post', 'review_save' );

function create_posttype_showroom() {
	register_post_type( 'showroom',  	
		array(
		  'labels' => array(
		    'name' => __( 'Hệ thống show room' ),
		    'singular_name' => __( 'Hệ thống show room' )
		  ),
		  'hierarchical' => true,
		  'show_ui' => true, 
		  'taxonomies' => array('post_tag'),
		  'public' => true,
		  'has_archive' => true,
		  'menu_position' => 9,
		  'can_export' => true,
		  'capability_type' => 'post',
		  'rewrite' => array('slug' => 'showroom'),
		  'menu_icon' => 'dashicons-store', 
		  'supports' => array('title','thumbnail','post-formats','revisions') 
		)
	);
}
add_action( 'init', 'create_posttype_showroom' );

function showroom_meta_box() {
	add_meta_box( 'Thông tin showroom', 'Thông tin Showroom', 'showroom_output', 'showroom' );
}
add_action( 'add_meta_boxes', 'showroom_meta_box' );

function showroom_output($post) {
	$addres_room = get_post_meta($post->ID,'addres_room',true);	
	//$content_review = get_post_meta($post->ID,'content_review',true);
	wp_nonce_field( 'showroom_review', 'showroom_nonce' );?>
	<p>
		<label for="addres_room">Địa chỉ </label><br>
		<input type="text" style="height:38px;width: 100%" id="addres_room" placeholder="Nhập địa chỉ" name="addres_room" value="<?php echo esc_attr($addres_room); ?>"/>
 	</p>
 	
<?php }
function showroom_save($post_id) {
	$showroom_nonce = $_POST['showroom_nonce'];
	if( !isset($showroom_nonce ) ) { return; }
	// Kiểm tra nếu giá trị nonce không trùng khớp
	if( !wp_verify_nonce($showroom_nonce, 'showroom_review' ) ) { return; }
	$addres_room = sanitize_text_field($_POST['addres_room'] );	
	update_post_meta($post_id, 'addres_room', $addres_room);
	
}
add_action( 'save_post', 'showroom_save' );
function login_redirect($redirect_to, $request, $user ) {
    if (isset($user->roles) && is_array($user->roles)) {
    	if (in_array('administrator', $user->roles)) {
            $redirect_to =  home_url().'/wp-admin';
        } else {
        	$redirect_to =  home_url().'/thong-tin-ca-nhan/';
    	}
    }
    return $redirect_to;
}
add_filter( 'login_redirect', 'login_redirect', 10, 3 );

function add_fields_user($profile_fields){
	$profile_fields['phone'] = 'Số điện thoại';
	$profile_fields['user_address'] = 'Địa chỉ';
	// $profile_fields['facebook'] = 'Facebook profile URL';
	return $profile_fields;
}
add_filter('user_contactmethods', 'add_fields_user');





/* Upload img Avarta */
function my_custom_scripts(){
	wp_enqueue_media();
	wp_enqueue_script('my-custom-jquery', get_stylesheet_directory_uri().'/uploadavatar.js', array('jquery'), false, true );
}
add_action('admin_enqueue_scripts', 'my_custom_scripts');
function bdsttp_profile_fields($user ) {
	$profile_pic = ($user!=='add-new-user') ? get_user_meta($user->ID, 'bdsttppic', true): false;
	if( !empty($profile_pic) ){
			$image = wp_get_attachment_image_src($profile_pic, 'medium' );
	} ?>
<fieldset>
<legend><?php _e('Ảnh đại diện', 'bdsttp') ?></legend>
	<table class="form-table fh-profile-upload-options wpuf-table">
			<tr>
			<th><label for="uploadnd">Hình ảnh đại diện của bạn&nbsp;&nbsp;</label></th>
					<td class="wp-core-ui nd">
							<input type="button" data-id="bdsttp_image_id" data-src="bdsttp-img" class="button bdsttp-image" name="bdsttp_image" id="bdsttp-image" value="Tải ảnh lên" />
							<input type="hidden" class="button" name="bdsttp_image_id" id="bdsttp_image_id" value="<?php echo !empty($profile_pic) ? $profile_pic : ''; ?>" />
							<img id="bdsttp-img" src="<?php echo !empty($profile_pic) ? $image[0] : ''; ?>" style="<?php echo  empty($profile_pic) ? 'display:none;' :'' ?> width: 100px; height: auto; border:1px solid #eee;padding:2px;" />
					</td>
			</tr>
	</table>
	</fieldset>
	<?php
}
add_action( 'show_user_profile', 'bdsttp_profile_fields' );
add_action( 'edit_user_profile', 'bdsttp_profile_fields' );
add_action( 'user_new_form', 'bdsttp_profile_fields' );
function bdsttp_profile_update($user_id){
	if( current_user_can('administrator') || current_user_can('editor') || current_user_can('author') || current_user_can('subscriber') || current_user_can('contributor')){
			$profile_pic = empty($_POST['bdsttp_image_id']) ? '' : $_POST['bdsttp_image_id'];
			update_user_meta($user_id, 'bdsttppic', $profile_pic);
	}
}
add_action('profile_update', 'bdsttp_profile_update');
add_action('user_register', 'bdsttp_profile_update');

add_filter( 'get_avatar' , 'my_custom_avatar' , 1 , 5 );
function my_custom_avatar($avatar, $id_or_email, $size, $default, $alt ) {
	$user = false;
	if ( is_numeric($id_or_email ) ) {
			$id = (int) $id_or_email;
			$user = get_user_by( 'id' , $id );
	} elseif ( is_object($id_or_email ) ) {
			if ( ! empty($id_or_email->user_id ) ) {
					$id = (int) $id_or_email->user_id;
					$user = get_user_by( 'id' , $id );
			}
	} else {
			$user = get_user_by( 'email', $id_or_email );
	}
	if($user){
			$custom_avatar  =   get_user_meta($user->data->ID, 'bdsttppic', true );

			if( !empty($custom_avatar) ){
					 
					$image  =   wp_get_attachment_image_src($custom_avatar, 'medium');
					if($image ){
						$safe_alt = esc_attr($alt);
						$avatar = "<img alt='{$safe_alt}' src='{$image[0]}' class='avatar photo' height='60px' width='60px' />";
					}
			}
	}
	return $avatar;
}

function insert_attachment($file_handler,$user_id,$setthumb='false') {
    // check to make sure its a successful upload
    if ($_FILES[$file_handler]['error'] !== UPLOAD_ERR_OK) __return_false();
    require_once(ABSPATH . "wp-admin" . '/includes/image.php');
    require_once(ABSPATH . "wp-admin" . '/includes/file.php');
    require_once(ABSPATH . "wp-admin" . '/includes/media.php');
    $attach_id = media_handle_upload($file_handler, $user_id );
 
    if ($setthumb) update_post_meta($user_id,'bdsttppic',$attach_id);
    return $attach_id;
}

add_action('after_setup_theme', 'remove_admin_bar'); 
function remove_admin_bar() {
	if (current_user_can('subscriber') || current_user_can('author') || current_user_can('contributor') || current_user_can('editor') ) {
	  show_admin_bar(false);
	}
}

function upload_user_file($file = array() ) {
    require_once( ABSPATH . 'wp-admin/includes/admin.php' );
    $file_return = wp_handle_upload($file, array('test_form' => false ) );
    if( isset($file_return['error'] ) || isset($file_return['upload_error_handler'] ) ) {
        return false;
    } else {
        $filename = $file_return['file'];
        $attachment = array(
            'post_mime_type' => $file_return['type'],
            'post_title' => preg_replace( '/\.[^.]+$/', '', basename($filename ) ),
            'post_content' => '',
            'post_status' => 'inherit',
            'guid' => $file_return['url']
        );
        $attachment_id = wp_insert_attachment($attachment, $file_return['url'] );
        require_once (ABSPATH . 'wp-admin/includes/image.php' );
        $attachment_data = wp_generate_attachment_metadata($attachment_id, $filename );
        wp_update_attachment_metadata($attachment_id, $attachment_data );
        if( 0 < intval($attachment_id ) ) {
            return $attachment_id;
        }
    }
    return false;
}

function showTaxomi($id) {
	$taxonomy_p = 'danh-muc-san-pham';
	$get_field = new WP_Query(array(
      'post_type' => 'sanpham',
      'post_status' => 'publish',
    ));

	$cached_array = array();

    if($get_field->have_posts()) {

        while ($get_field->have_posts()) { 
          $get_field->the_post(); 
          $post_id = get_the_ID();
          $value = get_post_meta($post_id, $id, true);
          $value = trim($value);

          if ($cached_array[$id] === NULL) {
          	$cached_array[$id] = array();
          }
          
          if($value && $cached_array[$id][$value] === NULL) {
          	$cached_array[$id][$value] = 1;
	      	echo "<option value='".$value."'>".$value."</option>";
	      }
      }

  	}
}