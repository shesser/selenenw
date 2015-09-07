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
    wp_enqueue_script( 'selenene-custom-js', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), '20150814', true );
    wp_localize_script( 'selenene-custom-js', 'selenenw_ajax', array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'site_url' => site_url() ) );
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
    else if ( $classes[3] == 'page-template-yacht-listing-template' )
        $classes[] = 'sales';

    // return the $classes array
    return $classes;
}

if (!function_exists('write_log')) {
    function write_log ( $log )  {
        if ( true === WP_DEBUG ) {
            if ( is_array( $log ) || is_object( $log ) ) {
                error_log( print_r( $log, true ) );
            } else {
                error_log( $log );
            }
        }
    }
}

function get_yacht_listing () {
    $curl = curl_init();
    curl_setopt ($curl, CURLOPT_URL, "http://www.yachtworld.com/privatelabel/listing/cache/pl_search_results.jsp?slim=pp289556&cit=true&sm=3&is=false&man=Selene&fromLength=&toLength=&luom=126&fromYear=&toYear=&fromPrice=&toPrice=&currencyid=100&hmid=&ftid=&enid=&city=&spid=&rid=&cint=&msint=&ps=100&ErrorMessage=Please%20check%20one%20or%20more%20boats.");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec ($curl);
    curl_close ($curl);

    return $result;
}

function save_yacht_listing() {
    $html = get_yacht_listing();

    if ( $html ) {
        write_log('Success: Fetched listings from yachtworld');

        $doc = new DOMDocument();
        $doc->preserveWhiteSpace = true;

        @$doc->loadHTML( $html );
        $xpath = new DOMXpath( $doc );
        $rows = $xpath->query( '/html/body/table/tr/td/table/tr[3]/td/form/table/tr[2]/td/table/tr');

        if ( $rows->length > 0 ) {
            write_log('Success: Looping through listings');
            $insert_success_log  = array();
            $insert_failure_log = array();

            global $wpdb;
            foreach ( $rows as $key => $value ) {
                if ($key == 0) //Skipping the first row because it contains headers
                    continue;

                $name_node = $xpath->query('td', $value)->item(4);
                parse_str(substr(html_entity_decode($xpath->query('a', $name_node)->item(0)->getAttribute('href')), 49), $yacht_parameters);

                //$yacht_parameters[ 'boat_id' ]
                $name = str_replace(array("\xC2", "\xA0"), '', trim($name_node->nodeValue));
                $length = str_replace(array("\xC2", "\xA0"), '', trim($xpath->query('td', $value)->item(3)->nodeValue));
                $built = str_replace(array("\xC2", "\xA0"), '', trim($xpath->query('td', $value)->item(5)->nodeValue));
                $price = str_replace(array("\xC2", "\xA0", ","), '', trim($xpath->query('td', $value)->item(6)->nodeValue));
                $codes = trim(str_replace(array("\xC2", "\xA0"), array(' ', ''), $xpath->query('td', $value)->item(8)->nodeValue));
                $location = str_replace(array("\xC2", "\xA0"), '', trim($xpath->query('td', $value)->item(9)->nodeValue));
                //$yacht_parameters[ 'slim' ];

                $primary_image = get_yacht_image ( $yacht_parameters['primary_photo_url'] );

                if ( ! is_wp_error( $primary_image ) ) {
                    write_log( 'Success: Downloaded primary image for ' . $yacht_parameters['boat_id'] );
                } else {
                    write_log( array('Failure: Unable to download primary image for ' . $yacht_parameters[ 'boat_id' ], $primary_image) );
                }

                $yacht_data = array(
                    'id' => $yacht_parameters[ 'boat_id' ],
                    'name' => $name,
                    'length' => $length,
                    'built' => $built,
                    'price' => $price,
                    'codes' => $codes,
                    'location' => $location,
                    'primary_image' => $primary_image,
                    /*'image' => '',
                    'hull_material' => '',
                    'engine_fuel_type' => '',
                    'yw_number' => '',
                    'courtesy' => '',
                    'description' => '',
                    'full_specs' => '',*/
                    'slim' => $yacht_parameters[ 'slim' ],
                );

                if ( $wpdb->insert( 'wp_yachts', $yacht_data ) ) {
                    $insert_success_log[] = 'Success: Inserted yacht '. $yacht_parameters[ 'boat_id' ];
                } else {
                    $insert_failure_log[] = 'Failure: Insert failed on yacht '. $yacht_parameters[ 'boat_id' ];
                }
            }

            if ( !empty( $insert_success_log ) ) {
                write_log( 'Success: ' . count( $insert_success_log ) . ' yachts inserted' );
                write_log( $insert_success_log );
            }

            if ( !empty( $insert_failure_log ) ) {
                write_log( 'Failure: Unable to insert ' . count( $insert_failure_log ) . '  yachts' );
                write_log( $insert_failure_log );
            }
        } else {
            write_log('Failure: No rows within fetched listing');
        }
    } else {
        write_log('Failure: Unable to fetch listings from yachtworld');
    }
}
add_action ('fetch_yachtworld_listing', 'save_yacht_listing()');

/*function cronstarter_activation() {
    if( !wp_next_scheduled( 'fetch_yachtworld_listing' ) ) {
        wp_schedule_event( time(), 'everyminute', 'fetch_yachtworld_listing' );
    }
}
add_action('wp', 'cronstarter_activation');

// add custom interval
function cron_add_minute( $schedules ) {
    // Adds once every minute to the existing schedules.
    $schedules['everyminute'] = array(
        'interval' => 60,
        'display' => __( 'Once Every Minute' )
    );
    return $schedules;
}
add_filter( 'cron_schedules', 'cron_add_minute' );*/

function get_yacht_image ( $file ) {
    if ( ! empty( $file ) ) {
        // Set variables for storage, fix file filename for query strings.
        preg_match( '/[^\?]+\.(jpe?g|jpe|gif|png)\b/i', $file, $matches );
        $file_array = array();
        $file_array['name'] = basename( $matches[0] );

        // Download file to temp location.
        require_once(ABSPATH . 'wp-admin/includes/file.php');
        $file_array['tmp_name'] = download_url( $file );

        // If error storing temporarily, return the error.
        if ( is_wp_error( $file_array['tmp_name'] ) ) {
            return $file_array['tmp_name'];
        }

        $overrides = array('test_form'=>false);

        $time = current_time( 'mysql' );

        $file = wp_handle_sideload( $file_array, $overrides, $time );

        if ( isset($file['error']) )
            return new WP_Error( 'upload_error', $file['error'] );

        $image = wp_get_image_editor( $file[ 'file' ] ); // Return an implementation that extends WP_Image_Editor

        if ( ! is_wp_error( $image ) ) {
            $image->resize( 640, 465, true );
            $file_name = end( explode( '/', $file[ 'file' ] ) );
            $resized_path = str_replace( $file_name, '640x465_' . $file_name, $file[ 'file' ] );
            $resized = $image->save( $resized_path );

            if ( ! is_wp_error( $resized ) ) {
                return str_replace( $file_name, '640x465_' . $file_name, $file['url'] );
            } else {
                return new WP_Error( 'image_resize_error', $resized );
            }
        } else {
            return new WP_Error( 'image_editor_load_error', $image );
        }
    }
}

add_action( 'wp_ajax_selenenw_get_yacht_listing', 'selenenw_get_yacht_listing_form_callback' );
add_action( 'wp_ajax_nopriv_selenenw_get_yacht_listing', 'selenenw_get_yacht_listing_form_callback' );
/**
 * Ajax callback function that retrieves the Yacht Listing
 */
function selenenw_get_yacht_listing_form_callback() {
    global $wpdb;

    if( $_POST['built'] != '0' ) {
        $condition = ' WHERE ';

        switch ( $_POST['built'] ) {
            case 'less-5':
                $condition .= 'built > ' . (date('Y') - 5);
                break;
            case 'greater-5':
                $condition .= 'built < ' . (date('Y') - 5);
                break;
        }
    }

    if( $_POST['sort'] != '0' ) {
        $order = ' ORDER BY ';

        switch ( $_POST['sort'] ) {
            case 'price-asc':
                $order .= 'price ASC';
                break;
            case 'price-desc':
                $order .= 'price DESC';
                break;
        }
    }

    $query = "SELECT * FROM " . $wpdb->prefix . "yachts" . $condition . $order;
    $yachts = $wpdb->get_results( $query );

    foreach ( $yachts as $yacht ) {
        $url = get_permalink() . '#' . sanitize_title( $yacht->name ) . '-' . $yacht->id;

        $response[] = array(
            'id' => $yacht->id,
            'name' => $yacht->name,
            'built' => $yacht->built,
            'length' => $yacht->length,
            'price' => number_format_i18n( $yacht->price ),
            'primary_image' => $yacht->primary_image,
            'url' => $url,
        );
    }

    if ( !empty( $response ) )
        echo json_encode( $response );
    else
        echo 0;

    exit;
}