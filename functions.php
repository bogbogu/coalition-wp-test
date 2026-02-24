<?php
/**
 * CT Custom functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package CT_Custom
 */

if ( ! function_exists( 'ct_custom_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ct_custom_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on CT Custom, use a find and replace
		 * to change 'ct-custom' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ct-custom', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'ct-custom' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'ct_custom_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'ct_custom_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ct_custom_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'ct_custom_content_width', 640 );
}
add_action( 'after_setup_theme', 'ct_custom_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ct_custom_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'ct-custom' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'ct-custom' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'ct_custom_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ct_custom_scripts() {
	wp_enqueue_style( 'ct-custom-style', get_stylesheet_uri() );

	wp_enqueue_script( 'ct-custom-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'ct-custom-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ct_custom_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}


/* 
	Started adding here
*/

function ct_add_theme_settings() {
	add_menu_page(
		'Theme Settings',
		'Theme Settings',
		'manage_options',
		'ct-theme-settings',
		'ct_theme_settings_page',
		'dashicons-admin-generic',
		20
	);
}
add_action( 'admin_menu', 'ct_add_theme_settings' );

function ct_theme_settings_page() {
	?>
	<div class="wrap">
		<h1><?php esc_html_e( 'Theme Settings', 'ct-custom' ); ?></h1>
		<form method="post" action="options.php">
			<?php
			settings_fields( 'ct_theme_settings_group' );
			do_settings_sections( 'ct-theme-settings' );
			submit_button();
			?>
		</form>
	</div>
	<?php
}

function ct_register_theme_settings() {
	register_setting(
		'ct_theme_settings_group',
		'ct_logo_id',
		array(
			'sanitize_callback' => 'absint',
		)
	);

	register_setting(
		'ct_theme_settings_group',
		'ct_phone',
		array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	register_setting(
		'ct_theme_settings_group',
		'ct_address',
		array(
			'sanitize_callback' => 'sanitize_textarea_field',
		)
	);

	register_setting(
		'ct_theme_settings_group',
		'ct_fax',
		array(
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	register_setting(
		'ct_theme_settings_group',
		'ct_social_facebook',
		array(
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	register_setting(
		'ct_theme_settings_group',
		'ct_social_twitter',
		array(
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	register_setting(
		'ct_theme_settings_group',
		'ct_social_linkedin',
		array(
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	register_setting(
		'ct_theme_settings_group',
		'ct_social_pinterest',
		array(
			'sanitize_callback' => 'esc_url_raw',
		)
	);

	add_settings_section( 'ct_section', '', null, 'ct-theme-settings' );

	add_settings_field( 'ct_logo_id', 'Logo', 'ct_logo_callback', 'ct-theme-settings', 'ct_section' );
	add_settings_field( 'ct_phone', 'Phone Number', 'ct_phone_callback', 'ct-theme-settings', 'ct_section' );
	add_settings_field( 'ct_address', 'Address Information', 'ct_address_callback', 'ct-theme-settings', 'ct_section' );
	add_settings_field( 'ct_fax', 'Fax Number', 'ct_fax_callback', 'ct-theme-settings', 'ct_section' );
	add_settings_field( 'ct_social_facebook', 'Facebook URL', 'ct_social_facebook_callback', 'ct-theme-settings', 'ct_section' );
	add_settings_field( 'ct_social_twitter', 'Twitter URL', 'ct_social_twitter_callback', 'ct-theme-settings', 'ct_section' );
	add_settings_field( 'ct_social_linkedin', 'LinkedIn URL', 'ct_social_linkedin_callback', 'ct-theme-settings', 'ct_section' );
	add_settings_field( 'ct_social_pinterest', 'Pinterest URL', 'ct_social_pinterest_callback', 'ct-theme-settings', 'ct_section' );
}
add_action( 'admin_init', 'ct_register_theme_settings' );

function ct_theme_settings_admin_assets( $hook ) {
	if ( 'toplevel_page_ct-theme-settings' !== $hook ) {
		return;
	}

	wp_enqueue_media();
	wp_enqueue_script(
		'ct-theme-settings-admin',
		get_template_directory_uri() . '/js/theme-settings-admin.js',
		array( 'jquery' ),
		'1.0.0',
		true
	);
}
add_action( 'admin_enqueue_scripts', 'ct_theme_settings_admin_assets' );

function ct_logo_callback() {
	$logo_id  = (int) get_option( 'ct_logo_id' );
	$logo_url = $logo_id ? wp_get_attachment_image_url( $logo_id, 'medium' ) : '';
	?>
	<input type="hidden" id="ct_logo_id" name="ct_logo_id" value="<?php echo esc_attr( $logo_id ); ?>">
	<div id="ct_logo_preview" style="margin-bottom:10px;">
		<?php if ( $logo_url ) : ?>
			<img src="<?php echo esc_url( $logo_url ); ?>" alt="<?php esc_attr_e( 'Selected logo', 'ct-custom' ); ?>" style="max-width:150px;height:auto;display:block;">
		<?php endif; ?>
	</div>
	<button type="button" class="button" id="ct_logo_upload"><?php esc_html_e( 'Upload Logo', 'ct-custom' ); ?></button>
	<button type="button" class="button" id="ct_logo_remove"><?php esc_html_e( 'Remove Logo', 'ct-custom' ); ?></button>
	<p class="description"><?php esc_html_e( 'Upload a logo image from the media library.', 'ct-custom' ); ?></p>
	<?php
}

function ct_phone_callback() {
	$phone = get_option( 'ct_phone', '' );
	echo '<input type="text" name="ct_phone" value="' . esc_attr( $phone ) . '" class="regular-text">';
}

function ct_address_callback() {
	$address = get_option( 'ct_address', '' );
	echo '<textarea name="ct_address" class="large-text" rows="4">' . esc_textarea( $address ) . '</textarea>';
	echo '<p class="description">' . esc_html__( 'Use one line per row (example: company name, street, city).', 'ct-custom' ) . '</p>';
}

function ct_fax_callback() {
	$fax = get_option( 'ct_fax', '' );
	echo '<input type="text" name="ct_fax" value="' . esc_attr( $fax ) . '" class="regular-text">';
}

function ct_social_facebook_callback() {
	$value = get_option( 'ct_social_facebook', '' );
	echo '<input type="url" name="ct_social_facebook" value="' . esc_attr( $value ) . '" class="regular-text" placeholder="https://facebook.com/your-page">';
}

function ct_social_twitter_callback() {
	$value = get_option( 'ct_social_twitter', '' );
	echo '<input type="url" name="ct_social_twitter" value="' . esc_attr( $value ) . '" class="regular-text" placeholder="https://twitter.com/your-profile">';
}

function ct_social_linkedin_callback() {
	$value = get_option( 'ct_social_linkedin', '' );
	echo '<input type="url" name="ct_social_linkedin" value="' . esc_attr( $value ) . '" class="regular-text" placeholder="https://linkedin.com/in/your-profile">';
}

function ct_social_pinterest_callback() {
	$value = get_option( 'ct_social_pinterest', '' );
	echo '<input type="url" name="ct_social_pinterest" value="' . esc_attr( $value ) . '" class="regular-text" placeholder="https://pinterest.com/your-profile">';
}


