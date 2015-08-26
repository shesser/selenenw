<?php
require_once('inc/themeslug_walker_nav_menu.php');

if ( ! function_exists( 'selenenw_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function selenenw_setup() {
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
     * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
     */
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 825, 510, true );

    // This theme uses wp_nav_menu() in three locations.
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'selenenw' ),
        'social'  => __( 'Social Links Menu', 'selenenw' ),
        'footer'  => __( 'Footer Menu', 'selenenw' ),
    ) );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ) );

    /*
     * Enable support for Post Formats.
     *
     * See: https://codex.wordpress.org/Post_Formats
     */
    add_theme_support( 'post-formats', array(
        'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
    ) );
}
endif; // selenenw_setup
add_action( 'after_setup_theme', 'selenenw_setup' );

/**
 * Enqueue scripts and styles.
 */
function selenenw_scripts() {
    // Load our main stylesheet.
    wp_enqueue_style( 'selenenw-style', get_stylesheet_uri() );

    // Load supporting stylesheet
    wp_enqueue_style( 'selenenw-fonts', get_template_directory_uri() . '/css/fonts.css', array(), '20150814');
    wp_enqueue_style( 'selene-lightslider', get_template_directory_uri() . '/css/lightSlider.min.css', array(), '20150814' );
    wp_enqueue_style( 'selenenw-animate', get_template_directory_uri() . '/css/animate.css', array(), '20150814' );

    // Load google fonts
    wp_enqueue_style( 'selenenw-google-font', 'http://fonts.googleapis.com/css?family=Roboto+Slab:300,400,700|Raleway:400,500,600,700&amp;subset=latin,greek,cyrillic,vietnamese' );

    // Load the Internet Explorer specific scripts.
    wp_enqueue_script( 'selenenw-html5shiv', 'https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js', array( 'selenenw-style' ) );
    wp_script_add_data( 'selenenw-html5shiv', 'conditional', 'lt IE 9' );

    wp_enqueue_script( 'selenenw-respond', 'https://oss.maxcdn.com/respond/1.4.2/respond.min.js', array( 'selenenw-style' ) );
    wp_script_add_data( 'selenenw-respond', 'conditional', 'lt IE 9' );

    // Load footer scripts
    wp_enqueue_script( 'selenenw-jetmenu', get_template_directory_uri() . '/js/jetmenu.js', array( 'jquery', 'jquery-ui-core' ), '20150814', true );
    wp_enqueue_script( 'selenenw-uniform', get_template_directory_uri() . '/js/jquery.uniform.min.js', array( 'jquery', 'jquery-ui-core' ), '20150814', true );
    wp_enqueue_script( 'selenenw-lightslider', get_template_directory_uri() . '/js/jquery.lightSlider.min.js', array( 'jquery', 'jquery-ui-core' ), '20150814', true );
    wp_enqueue_script( 'selenenw-wow', get_template_directory_uri() . '/js/wow.min.js', array( 'jquery', 'jquery-ui-core' ), '20150814', true );
    wp_enqueue_script( 'selenenw-scripts', get_template_directory_uri() . '/js/scripts.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-datepicker' ), '20150814', true );
}
add_action( 'wp_enqueue_scripts', 'selenenw_scripts' );

function number_to_words ( $number ) {
    $number_in_words = array( 'one', 'two', 'three', 'four' );
    return $number_in_words[ $number - 1 ];
}

function selenenw_post_thumbnail() {
    if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
        return;
    }

    if ( is_singular() ) :
        ?>

        <div class="entry-featured">
            <?php the_post_thumbnail(); ?>
        </div><!-- .post-thumbnail -->

    <?php else : ?>

        <figure>
            <a href="<?php the_permalink(); ?>">
                <?php
                the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title() ) );
                ?>
            </a>
        </figure>

    <?php endif; // End is_singular()
}

// Add specific CSS class by filter
add_filter( 'body_class', 'my_class_names' );
function my_class_names( $classes ) {

    // Applying blog class on <body> is throwing off
    // the template. So we have removed the blog class
    if ( $classes[0] == 'blog' )
        unset( $classes[0] );

    // return the $classes array
    return $classes;
}