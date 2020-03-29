<?php
/**
 * Leadwise Style functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Leadwise Style
 */

if ( ! function_exists( 'leadwise_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function leadwise_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on leadwise, use a find and replace
		 * to change 'leadwise' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'leadwise', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'leadwise' ),
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
		add_theme_support( 'custom-background', apply_filters( '_s_custom_background_args', array(
			'default-color' => '282A36',
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

		// Adding support for core block visual styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for custom color scheme.
		add_theme_support( 'editor-color-palette', array(
			array(
				'name'  => __( 'Highlight', 'leadwise' ),
				'slug'  => 'highlight',
				'color' => '#363948',
			),
			array(
				'name'  => __( 'Dark Grey', 'leadwise' ),
				'slug'  => 'dark-grey',
				'color' => '#282A36',
			),
			array(
				'name'  => __( 'Muted', 'leadwise' ),
				'slug'  => 'muted',
				'color' => '#8492B1',
			),
			array(
				'name'  => __( 'Light Grey', 'leadwise' ),
				'slug'  => 'light-grey',
				'color' => '#f7f7f7',
			),
			array(
				'name'  => __( 'Blue', 'leadwise' ),
				'slug'  => 'blue',
				'color' => '#6BE5FD',
			),
			array(
				'name'  => __( 'Pink', 'leadwise' ),
				'slug'  => 'pink',
				'color' => '#FF79C0',
			),
			array(
				'name'  => __( 'Green', 'leadwise' ),
				'slug'  => 'green',
				'color' => '#50FA78',
			),
			array(
				'name'  => __( 'Purple', 'leadwise' ),
				'slug'  => 'purple',
				'color' => '#BD93F2',
			),
		) );

		/**
		 * Register widget area.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
		 */
		function leadwise_widgets_init() {
			register_sidebar( array(
				'name'          => __( 'Footer Widget', 'leadwise' ),
				'id'            => 'footer-sidebar',
				'description'   => __( 'Add widgets here to appear in your footer on all pages.', 'leadwise' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<p class="widget-title">',
				'after_title'   => '</p>',
			) );
		}
		add_action( 'widgets_init', 'leadwise_widgets_init' );
	}
endif;
add_action( 'after_setup_theme', 'leadwise_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function leadwise_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'leadwise_content_width', 640 );
}
add_action( 'after_setup_theme', 'leadwise_content_width', 0 );

/**
 * Register Google Fonts
 */
function leadwise_fonts_url() {
	$fonts_url = '';

	/*
	 *Translators: If there are characters in your language that are not
	 * supported by Noto Serif, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$notoserif = esc_html_x( 'on', 'Noto Serif font: on or off', 'leadwise' );

	if ( 'off' !== $notoserif ) {
		$font_families = array();
		$font_families[] = 'Noto Serif:400,400italic,700,700italic';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);

		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;

}

/**
 * Enqueue scripts and styles.
 */
function leadwise_scripts() {
	wp_enqueue_style( 'gutenbergbase-style', get_stylesheet_uri() );

	wp_enqueue_style( 'leadwiseblocks-style', get_template_directory_uri() . '/css/blocks.css' );

	wp_enqueue_style( 'leadwise-fonts', leadwise_fonts_url() );

	wp_enqueue_script( 'leadwise-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	
	if ( !is_404() ) {
		wp_enqueue_script( 'leadwise-syntax-highlighting', get_template_directory_uri() . '/js/syntax-highlighting.js', array(), '20180816', true );
		
		wp_localize_script( 'leadwise-syntax-highlighting', 'leadwise_pronouns', array(
			__( 'I', 'leadwise' ),
			__( 'we', 'leadwise' ),
			__( 'me', 'leadwise' ),
			__( 'us', 'leadwise' ),
			__( 'you', 'leadwise' ),
			__( 'she', 'leadwise' ),
			__( 'he', 'leadwise' ),
			__( 'her', 'leadwise' ),
			__( 'him', 'leadwise' ),
			__( 'they', 'leadwise' ),
			__( 'them', 'leadwise' ),
			__( 'it', 'leadwise' ),
			__( 'that', 'leadwise' ),
			__( 'which', 'leadwise' ),
			__( 'who', 'leadwise' ),
			__( 'whom', 'leadwise' ),
			__( 'whose', 'leadwise' ),
			__( 'whichever', 'leadwise' ),
			__( 'whoever', 'leadwise' ),
			__( 'whomever', 'leadwise' ),
			__( 'this', 'leadwise' ),
			__( 'these', 'leadwise' ),
			__( 'that', 'leadwise' ),
			__( 'those', 'leadwise' ),
			__( 'anybody', 'leadwise' ),
			__( 'anyone', 'leadwise' ),
			__( 'anything', 'leadwise' ),
			__( 'each', 'leadwise' ),
			__( 'either', 'leadwise' ),
			__( 'everyone', 'leadwise' ),
			__( 'everybody', 'leadwise' ),
			__( 'everything', 'leadwise' ),
			__( 'nobody', 'leadwise' ),
			__( 'neither', 'leadwise' ),
			__( 'no one', 'leadwise' ),
			__( 'nothing', 'leadwise' ),
			__( 'somebody', 'leadwise' ),
			__( 'one', 'leadwise' ),
			__( 'someone', 'leadwise' ),
			__( 'something', 'leadwise' ),
			__( 'few', 'leadwise' ),
			__( 'many', 'leadwise' ),
			__( 'both', 'leadwise' ),
			__( 'several', 'leadwise' ),
			__( 'any', 'leadwise' ),
			__( 'all', 'leadwise' ),
			__( 'some', 'leadwise' ),
			__( 'most', 'leadwise' ),
			__( 'none', 'leadwise' ),
			__( 'myself', 'leadwise' ),
			__( 'yourself', 'leadwise' ),
			__( 'ourselves', 'leadwise' ),
			__( 'yourselves', 'leadwise' ),
			__( 'herself', 'leadwise' ),
			__( 'himself', 'leadwise' ),
			__( 'themselves', 'leadwise' ),
			__( 'itself', 'leadwise' ),
			__( 'who', 'leadwise' ),
			__( 'what', 'leadwise' ),
			__( 'which', 'leadwise' ),
			__( 'whose', 'leadwise' ),
			__( 'whom', 'leadwise' ),
		) );
		
		wp_localize_script( 'leadwise-syntax-highlighting', 'leadwise_conjunctions', array(
			__( 'for', 'leadwise' ),
			__( 'and', 'leadwise' ),
			__( 'nor', 'leadwise' ),
			__( 'but', 'leadwise' ),
			__( 'or', 'leadwise' ),
			__( 'yet', 'leadwise' ),
			__( 'so', 'leadwise' ),
			__( 'either', 'leadwise' ),
			__( 'neither', 'leadwise' ),
			__( 'not only', 'leadwise' ),
			__( 'but also', 'leadwise' ),
			__( 'both', 'leadwise' ),
			__( 'whether', 'leadwise' ),
			__( 'although', 'leadwise' ),
			__( 'though', 'leadwise' ),
			__( 'even though', 'leadwise' ),
			__( 'as much as', 'leadwise' ),
			__( 'as long as', 'leadwise' ),
			__( 'as soon as', 'leadwise' ),
			__( 'because', 'leadwise' ),
			__( 'since', 'leadwise' ),
			__( 'so that', 'leadwise' ),
			__( 'in order that', 'leadwise' ),
			__( 'if', 'leadwise' ),
			__( 'les', 'leadwise' ),
			__( 'est', 'leadwise' ),
			__( 'even if', 'leadwise' ),
			__( 'that', 'leadwise' ),
			__( 'unless', 'leadwise' ),
			__( 'until', 'leadwise' ),
			__( 'when', 'leadwise' ),
			__( 'where', 'leadwise' ),
		) );

		wp_localize_script( 'leadwise-syntax-highlighting', 'leadwise_prepositions', array(
			__( 'about', 'leadwise' ),
			__( 'beside', 'leadwise' ),
			__( 'near', 'leadwise' ),
			__( 'to', 'leadwise' ),
			__( 'above', 'leadwise' ),
			__( 'between', 'leadwise' ),
			__( 'of', 'leadwise' ),
			__( 'towards', 'leadwise' ),
			__( 'across', 'leadwise' ),
			__( 'beyond', 'leadwise' ),
			__( 'off', 'leadwise' ),
			__( 'under', 'leadwise' ),
			__( 'after', 'leadwise' ),
			__( 'by', 'leadwise' ),
			__( 'on', 'leadwise' ),
			__( 'underneath', 'leadwise' ),
			__( 'against', 'leadwise' ),
			__( 'despite', 'leadwise' ),
			__( 'onto', 'leadwise' ),
			__( 'unlike', 'leadwise' ),
			__( 'along', 'leadwise' ),
			__( 'down', 'leadwise' ),
			__( 'opposite', 'leadwise' ),
			__( 'until', 'leadwise' ),
			__( 'among', 'leadwise' ),
			__( 'during', 'leadwise' ),
			__( 'out', 'leadwise' ),
			__( 'up', 'leadwise' ),
			__( 'around', 'leadwise' ),
			__( 'except', 'leadwise' ),
			__( 'outside', 'leadwise' ),
			__( 'upon', 'leadwise' ),
			__( 'as', 'leadwise' ),
			__( 'for', 'leadwise' ),
			__( 'over', 'leadwise' ),
			__( 'via', 'leadwise' ),
			__( 'at', 'leadwise' ),
			__( 'from', 'leadwise' ),
			__( 'past', 'leadwise' ),
			__( 'with', 'leadwise' ),
			__( 'before', 'leadwise' ),
			__( 'in', 'leadwise' ),
			__( 'round', 'leadwise' ),
			__( 'within', 'leadwise' ),
			__( 'behind', 'leadwise' ),
			__( 'inside', 'leadwise' ),
			__( 'since', 'leadwise' ),
			__( 'without', 'leadwise' ),
			__( 'below', 'leadwise' ),
			__( 'into', 'leadwise' ),
			__( 'than', 'leadwise' ),
			__( 'beneath', 'leadwise' ),
			__( 'like', 'leadwise' ),
			__( 'through', 'leadwise' ),
		) );
	}

	wp_enqueue_script( 'leadwise-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'leadwise_scripts' );

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
