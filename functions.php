<?php
/**
 * show featured image
 */

if( !function_exists('test_setup')) {
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function test_setup() {
        /*
                * Make theme available for translation.
                * Translations can be filed in the /languages/ directory.
                * If you're building a theme based on Crafty Press, use a find and replace
                * to change 'twentytwentytwo' to the name of your theme in all the template files.
                */
        load_theme_textdomain( 'twentytwentytwo', get_template_directory() . '/languages' );

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

        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'twentytwentytwo_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        ) ) );
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
        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        /**
         * Add support for core custom logo.
         */
        add_theme_support( 'custom-logo', [
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        ] );

        /**
         * Add Support for Custom Page Header
         */
        add_theme_support( 'custom-header', array(
            'flex-width'	=> true,
            'width'			=> 1600,
            'flex-height'	=> true,
            'height'		=> 450,
            'default-image' => '',
        ) );

        /**
         * Add Post Type Support
         */
        add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'video', 'audio' ) );

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus( array(
            'primary' => esc_html__( 'Primary', 'twentytwentytwo' ),
            'footer' => esc_html__( 'Footer Menu', 'twentytwentytwo' ),
        ) );

    }
}
add_action('after_setup_theme', 'test_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function twentytwentytwo_content_width() {
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters( 'twentytwentytwo_content_width', 1170 );
}
add_action( 'after_setup_theme', 'twentytwentytwo_content_width', 0 );

/**
 * Register Sidebar widget area.
 *
 * @since 1.0.0
 */
function twentytwentytwo_sidebar_widgets_init() {
    // Default Sidebar
    register_sidebar( array(
        'name'          => esc_html__( 'Sidebar', 'twentytwentytwo' ),
        'id'            => 'default-sidebar',
        'description'   => esc_html__( 'Add widgets here.', 'twentytwentytwo' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'twentytwentytwo_sidebar_widgets_init' );

/**
 * Enqueue public scripts and styles.
 */
function twentytwentytwo_public_scripts() {
    // Styles.
    wp_enqueue_style( 'default', get_template_directory_uri() . '/assets/css/default.css', [], wp_rand(), 'all' );
    wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/main.css', [], wp_rand(), 'all' );

    // Scripts.
    wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', [ 'jquery' ], wp_rand(), true );
}
add_action( 'wp_enqueue_scripts', 'twentytwentytwo_public_scripts' );

/**
 * Enqueue admin scripts and styles.
 */
function twentytwentytwo_admin_scripts() {

}
add_action( 'admin_enqueue_scripts', 'twentytwentytwo_admin_scripts' );