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
    wp_enqueue_style( 'selenenw-lightgallery', get_template_directory_uri() . '/css/lightGallery.min.css', array(), '20150814' );

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
    wp_enqueue_script( 'selenenw-lightgallery', get_template_directory_uri() . '/js/lightGallery.min.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-datepicker' ), '20150814', true );
    wp_enqueue_script( 'selenene-custom-js', get_template_directory_uri() . '/js/custom.js', array( 'jquery' ), '20150814', true );
    wp_localize_script( 'selenene-custom-js', 'selenenw_ajax', array( 'ajax_url' => admin_url( 'admin-ajax.php' ), 'site_url' => site_url() ) );
}

add_action( 'wp_enqueue_scripts', 'selenenw_scripts' );

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
function selenenw_class_names( $classes ) {
    // Applying blog class on <body> is throwing off
    // the template. So we have removed the blog class
    if ( $classes[0] == 'blog' )
        unset( $classes[0] );
    else if ( $classes[3] == 'page-template-yacht-listing-template' )
        $classes[] = 'sales';

    // return the $classes array
    return $classes;
}

add_filter( 'body_class', 'selenenw_class_names' );

function add_query_vars($vars) {
    $vars[] = "id";
    return $vars;
}

add_filter('query_vars', 'add_query_vars');

function add_rewrite_rules($rules) {
    $new_rule = array(
        'yacht/([^/]+)/?$' => 'index.php?pagename=yacht&id=$matches[1]',
        'yacht-model/([^/]+)/?$' => 'index.php?pagename=yacht-model&id=$matches[1]'
    );
    $rules = $new_rule + $rules;
    return $rules;
}

add_filter('rewrite_rules_array', 'add_rewrite_rules');

function number_to_words ( $number ) {
    $number_in_words = array( 'one', 'two', 'three', 'four' );
    return $number_in_words[ $number - 1 ];
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

function selenenw_get_page ( $url ) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec ($curl);
    curl_close ($curl);

    return $result;
}

function save_yacht_listing( $url, $is_selenenw = false ) {
    $html = selenenw_get_page( $url );

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
                if( $is_selenenw )
                    parse_str(substr(html_entity_decode($xpath->query('a', $name_node)->item(0)->getAttribute('href')), 41), $yacht_parameters);
                else
                    parse_str(substr(html_entity_decode($xpath->query('a', $name_node)->item(0)->getAttribute('href')), 49), $yacht_parameters);

                //$yacht_parameters[ 'boat_id' ]
                $name = str_replace(array("\xC2", "\xA0"), '', trim($name_node->nodeValue));
                $length = str_replace(array("\xC2", "\xA0"), '', trim($xpath->query('td', $value)->item(3)->nodeValue));
                $built = str_replace(array("\xC2", "\xA0"), '', trim($xpath->query('td', $value)->item(5)->nodeValue));
                $price = str_replace(array("\xC2", "\xA0", ","), '', trim($xpath->query('td', $value)->item(6)->nodeValue));
                $codes = trim(str_replace(array("\xC2", "\xA0"), array(' ', ''), $xpath->query('td', $value)->item(8)->nodeValue));
                $location = str_replace(array("\xC2", "\xA0"), '', trim($xpath->query('td', $value)->item(9)->nodeValue));
                //$yacht_parameters[ 'slim' ];

                $existing_yacht = $wpdb->get_row( 'SELECT * FROM ' . $wpdb->prefix . 'yachts WHERE id = ' . $yacht_parameters['boat_id'] );

                if ( !is_null( $existing_yacht ) ) {
                    $new_primary_image = explode( '.', explode( '/', $yacht_parameters['primary_photo_url'] ) );
                    $existing_primary_image = explode( '/', $existing_yacht->primary_image );

                    /*require_once(ABSPATH . 'wp-admin/includes/file.php');
                    $primary_image_path = get_home_path() . parse_url( $existing_yacht->primary_image, PHP_URL_PATH );*/

                    if( !strstr( end( $existing_primary_image ), $new_primary_image[0] ) ) {
                        $primary_image = get_yacht_image ( $yacht_parameters['primary_photo_url'] );

                        if ( ! is_wp_error( $primary_image ) ) {
                            write_log( 'Success: Downloaded primary image for ' . $yacht_parameters['boat_id'] );
                        } else {
                            write_log( array('Failure: Unable to download primary image for ' . $yacht_parameters[ 'boat_id' ], $primary_image) );
                            $primary_image = 0;
                        }
                    } else {
                        $primary_image = $existing_primary_image;
                        write_log( 'NOTICE: Primary image already existed for ' . $yacht_parameters['boat_id'] );
                    }

                    $yacht_data = array(
                        'name' => $name,
                        'length' => $length,
                        'built' => $built,
                        'price' => $price,
                        'codes' => $codes,
                        'location' => $location,
                        'primary_image' => $primary_image,
                        'slim' => $yacht_parameters[ 'slim' ],
                        'is_selenenw' => $is_selenenw
                    );

                    if ( $wpdb->update( $wpdb->prefix . 'yachts', $yacht_data, array( 'id' => $existing_yacht->id ) ) ) {
                        $insert_success_log[] = 'Success: Updated yacht '. $yacht_parameters[ 'boat_id' ];
                    } else {
                        $insert_failure_log[] = 'Failure: Update failed on yacht '. $yacht_parameters[ 'boat_id' ];
                    }
                } else {
                    $primary_image = get_yacht_image ( $yacht_parameters['primary_photo_url'] );

                    if ( ! is_wp_error( $primary_image ) ) {
                        write_log( 'Success: Downloaded primary image for ' . $yacht_parameters['boat_id'] );
                    } else {
                        write_log( array('Failure: Unable to download primary image for ' . $yacht_parameters[ 'boat_id' ], $primary_image) );
                        $primary_image = 0;
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
                        'slim' => $yacht_parameters[ 'slim' ],
                        'is_selenenw' => $is_selenenw
                    );

                    if ( $wpdb->insert( $wpdb->prefix . 'yachts', $yacht_data ) ) {
                        $insert_success_log[] = 'Success: Inserted yacht '. $yacht_parameters[ 'boat_id' ];
                    } else {
                        $insert_failure_log[] = 'Failure: Insert failed on yacht '. $yacht_parameters[ 'boat_id' ];
                    }
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
//add_action ('fetch_yachtworld_listing', 'save_yacht_listing()');

function fetch_yachtworld_detail() {
    global $wpdb;

    $query = "SELECT * FROM " . $wpdb->prefix . "yachts";
    $yachts = $wpdb->get_results( $query );

    foreach ( $yachts as $yacht ) {
        write_log('Fetching details for ' . $yacht->id . ' from yachtworld');
        write_log('///////////////////////////////////////////////////////');

        if ( $yacht->is_selenenw )
            $html = selenenw_get_page('http://www.yachtworld.com/core/listing/pl_boat_detail.jsp?&units=Feet&id=' . $yacht->id . '&lang=en&slim=' . $yacht->slim . '&&hosturl=seleneyachtsnorthwest&&ywo=seleneyachtsnorthwest&');
        else
            $html = selenenw_get_page('http://www.yachtworld.com/privatelabel/listing/pl_boat_detail.jsp?currency=USD&units=Feet&id=' . $yacht->id . '&lang=en&slim=' . $yacht->slim . '&');

        if ( $html ) {
            write_log('Success: Fetched details page from yachtworld');

            $doc = new DOMDocument();
            $doc->preserveWhiteSpace = true;

            @$doc->loadHTML( $html );
            $xpath = new DOMXpath( $doc );

            $title = $xpath->document->getElementsByTagName('h3')->item(0)->nodeValue;

            $lis = $xpath->query('/html/body/td[2]/ul/li');
            $highlights = '';
            foreach ( $lis as $li ) {
                $highlights .= trim( $li->nodeValue ) . '<br/>';
            }

            $description = str_replace( array('<font face="Verdana, Helvetica, sans-serif">', '</font>'), '', $doc->saveHTML( $xpath->document->getElementsByTagName('font')->item(0) ) );

            if( $yacht->is_selenenw )
                $full_spec_html = selenenw_get_page('http://www.yachtworld.com/core/listing/pl_boat_full_detail.jsp?slim=' . $yacht->slim . '&boat_id=' . $yacht->id . '&ybw=&hosturl=seleneyachtsnorthwest&&ywo=seleneyachtsnorthwest&&units=Feet&access=Public&listing_id=&url=&hosturl=seleneyachtsnorthwest&&ywo=seleneyachtsnorthwest&');
            else
                $full_spec_html = selenenw_get_page('http://www.yachtworld.com/privatelabel/listing/pl_boat_full_detail.jsp?slim=' . $yacht->slim . '&boat_id=' . $yacht->id . '&ybw=&units=Feet&currency=USD&access=Public&listing_id=&url=');

            if ( $full_spec_html ) {
                write_log('Success: Fetched full specs from yachtworld');

                @$doc->loadHTML( $full_spec_html );
                $xpath = new DOMXpath( $doc );

                //$full_specs = trim( str_replace( array('<td>', '</td>'), '', $doc->saveHTML( $xpath->query('/html/body/div[3]/table/tbody/tr/td')->item(0) ) ) );

                $full_specs = $xpath->query('/html/body/div[3]/table/tbody/tr/td/strong');
                $full_specs_data = array();

                foreach ( $full_specs as $specs ) {
                    $next_sibling = $specs->nextSibling;

                    while( !is_null( $next_sibling ) && $next_sibling->nodeName != 'strong' ) {
                        if( $next_sibling->nodeName == '#text' && $next_sibling->nodeValue != '' ) {
                            $tmp = explode( ':', $next_sibling->nodeValue );
                            if( count( $tmp ) > 1 && end ( $tmp ) != '' ) {
                                $full_specs_data[$specs->nodeValue][] = array_map( 'trim', $tmp );
                            } else {
                                $full_specs_data[trim( $specs->nodeValue )][] = trim( $tmp[0] );
                            }
                        }

                        $next_sibling = $next_sibling->nextSibling;
                    }
                }

                $i = 4;
                $terminate = false;
                $features_data = array();
                do {
                    $features = $xpath->query('/html/body/div[' . $i . ']/table/tr/td/b');

                    if( $features->length > 0 && $features->item(0)->nodeValue != 'Disclaimer' && $features->item(0)->nodeValue != 'Default Disclaimer') {
                        $next_sibling = $features->item(0)->nextSibling;

                        while( !is_null( $next_sibling ) ) {

                            if( $next_sibling->hasChildNodes() ) {
                                foreach ( $next_sibling->childNodes as $child_node ) {
                                    $node_value = str_replace( array("\xC2", "\xA0"), ' ', trim( $child_node->nodeValue ) );
                                    if( $node_value != '' ) {
                                        $features_data[trim( $features->item(0)->nodeValue )][] = $node_value;
                                    }
                                }
                            } else {
                                $node_value = str_replace( array("\xC2", "\xA0"), ' ', trim( $next_sibling->nodeValue ) );
                                if( $node_value != '' ) {
                                    $features_data[trim( $features->item(0)->nodeValue )][] = $node_value;
                                }
                            }

                            $next_sibling = $next_sibling->nextSibling;
                        }
                        $i++;
                    } else {
                        $terminate = true;
                    }
                } while( !$terminate );

                $yacht_data = array(
                    'title' => $title,
                    'highlights' => $highlights,
                    'description' => $description,
                    'full_specs' => json_encode($full_specs_data),
                    'features' => json_encode( $features_data ),
                );

                if ( $wpdb->update( $wpdb->prefix . 'yachts', $yacht_data, array( 'id' => $yacht->id ) ) ) {
                    write_log('Success: Updated details in DB');
                } else {
                    write_log('Failure: Unable to update DB');
                }
            } else {
                write_log('Failure: Unable to fetch full specs from yachtworld');
            }
        } else {
            write_log('Failure: Unable to fetch details page for ' . $yacht->id . 'from yachtworld');
        }
        write_log('///////////////////////////////////////////////////////');
    }
}

function fetch_yachtworld_images() {
    global $wpdb;

    $query = "SELECT * FROM " . $wpdb->prefix . "yachts";
    $yachts = $wpdb->get_results( $query );

    foreach ( $yachts as $yacht ) {
        write_log('Fetching images for ' . $yacht->id . ' from yachtworld');
        write_log('///////////////////////////////////////////////////////');

        if ( $yacht->is_selenenw )
            $html = selenenw_get_page( 'http://www.yachtworld.com/core/listing/photo_gallery.jsp?access=Public&slim=' . $yacht->slim . '&ywo=seleneyachtsnorthwest&ywo=seleneyachtsnorthwest&hosturl=seleneyachtsnorthwest&hosturl=seleneyachtsnorthwest&units=Feet&boat_id=' . $yacht->id . '&back=pl_boat_detail.jsp&boat_id=' . $yacht->id . '' );
        else
            $html = selenenw_get_page( 'http://www.yachtworld.com/privatelabel/listing/photo_gallery.jsp?slim=' . $yacht->slim . '&lang=en&currency=USD&units=Feet&id=' . $yacht->id . '&back=/privatelabel/listing/pl_boat_detail.jsp&boat_id=' . $yacht->id);

        if ( $html ) {
            write_log('Success: Fetched photo gallery from yachtworld');

            $doc = new DOMDocument();
            $doc->preserveWhiteSpace = true;

            @$doc->loadHTML($html);
            $xpath = new DOMXpath($doc);

            $columns = $xpath->query('/html/body/table/tr[4]/td/div/table/tr/td');
            $js = $xpath->query('/html/head/script')->item(0)->childNodes->item(0)->nodeValue;

            if( !is_null($yacht->images) ){
                $images = json_decode( $yacht->images );
            } else {
                $images = array();
            }

            $i = 1;

            foreach ( $columns as $column ) {
                $image = $xpath->query('img/@src', $column)->item(0)->nodeValue;
                $image = substr( $image, 0, strpos( $image, '?f=' ) );

                $new_image = explode( '.', explode( '/', $image ) );

                /*$image_path = get_home_path() . parse_url( $existing_primary_image, PHP_URL_PATH );*/

                if( !strstr( $yacht->images, $new_image[0] ) ) {
                    $result = get_yacht_image( $image );

                    $pos = strpos($js, 'PicDescription[' . $i . ']');
                    $eol_pos = strpos($js, ';', $pos) - $pos;
                    $caption = str_replace( array( 'PicDescription[' . $i . '] = \'', '\'' ), '', substr($js, $pos, $eol_pos ) );

                    sleep( rand ( 1, 3 ) ); //Just a contingency to not get blacklisted

                    if ( ! is_wp_error( $result ) ) {
                        write_log( 'Success: Downloaded ' . $image );
                        $images[] = array(
                            'original' => str_replace( '640x465_', '', $result),
                            'resized' => $result,
                            'caption' => $caption,
                        );
                    } else {
                        write_log( array('Failure: Unable to download' . $image, $result) );
                    }
                } else {
                    write_log( 'NOTICE: Image exists ' . $image );
                }

                $i++;
            }

            if ( !empty( $images ) ) {
                $yacht_data = array(
                    'images' => json_encode( $images ),
                );

                if ( $wpdb->update( $wpdb->prefix . 'yachts', $yacht_data, array( 'id' => $yacht->id ) ) ) {
                    write_log('Success: Updated details in DB');
                } else {
                    write_log('Failure: Unable to update DB');
                }
            } else {
                write_log('Failure: Images array is empty');
            }
        }

        write_log('///////////////////////////////////////////////////////');
    }
}

/* function cronstarter_activation() {
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
        write_log('Start Downloading: ' . $file . '...');
        $file_array['tmp_name'] = download_url( $file, 600 );
        write_log('Completed Downloading: ' . $file . '...' . memory_get_usage() );

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
            $tmp = explode( '/', $file[ 'file' ] );
            $file_name = end( $tmp );
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
    selenenw_get_yacht_listing( true );
}

function selenenw_get_yacht_listing( $ajax, $condition_array = array(), $order = null, $limit = null ) {
    global $wpdb;

    if ( $ajax ) {
        if( isset( $_POST['listing'] ) && $_POST['listing'] != '0' ) {
            switch ( $_POST['listing'] ) {
                case 'our-listing':
                    $condition_array[] = 'is_selenenw = 1';
                    break;
                /*case 'other-listing':
                    $condition_array[] = 'is_selenenw = 0';
                    break;*/
            }
        }

        if( isset( $_POST['built'] ) && $_POST['built'] != '0' ) {
            switch ( $_POST['built'] ) {
                case 'less-5':
                    $condition_array[] = 'built > ' . (date('Y') - 5);
                    break;
                case 'greater-5':
                    $condition_array[] = 'built < ' . (date('Y') - 5);
                    break;
            }
        }

        if( isset( $_POST['sort'] ) && $_POST['sort'] != '0' ) {
            switch ( $_POST['sort'] ) {
                case 'price-asc':
                    $order = 'price ASC';
                    break;
                case 'price-desc':
                    $order = 'price DESC';
                    break;
            }
        }
    }

    $condition = ( !empty( $condition_array ) ) ? ' WHERE ' . implode( ' AND ', $condition_array ) : '';
    $order = ( !empty( $order ) ) ? ' ORDER BY ' . $order : '';
    $limit = ( !empty( $limit ) ) ? ' LIMIT 0,' . $limit : '';

    $query = "SELECT * FROM " . $wpdb->prefix . "yachts" . $condition . $order . $limit;
    $yachts = $wpdb->get_results( $query );

    foreach ( $yachts as $yacht ) {
        $url = get_permalink( get_page_by_path( 'yacht' ) ) . sanitize_title( $yacht->name ) . '-' . $yacht->id . '/';

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

    if ( $ajax ) {
        echo ( !empty( $response ) ) ? json_encode( $response ) : 0;
        exit;
    } else {
        return ( !empty( $response ) ) ? $response : false;
    }
}

function selenenw_get_featured_yachts() {
    global $wpdb;

    $query = "SELECT * FROM " . $wpdb->prefix . "yachts WHERE is_featured = 1" ;
    $yachts = $wpdb->get_results( $query );

    foreach ( $yachts as $yacht ) {
        $url = get_permalink( get_page_by_path( 'yacht' ) ) . sanitize_title( $yacht->name ) . '-' . $yacht->id . '/';

        $response[] = array(
            'id' => $yacht->id,
            'name' => $yacht->name,
            'built' => $yacht->built,
            'length' => $yacht->length,
            'price' => number_format_i18n( $yacht->price ),
            'primary_image' => $yacht->primary_image,
            'url' => $url,
            'short_desc' => substr( strip_tags( $yacht->description ), 0, 200 ) . '...',
            'title' => $yacht->title,
        );
    }

    if ( !empty( $response ) )
        return $response;
    else
        return false;
}

// define the wpcf7_before_send_mail callback
function selenenw_wpcf7_before_send_mail( $contact_form )
{
    if ( $contact_form->name() == 'contact-broker' ) {
        $mail = $contact_form->prop( 'mail' );
        $mail['body'] = str_replace( '#yacht-details#', wp_get_referer(), $mail['body'] );
        $contact_form->set_properties( array( 'mail' => $mail ) );
    }
}

// add the action
add_action( 'wpcf7_before_send_mail', 'selenenw_wpcf7_before_send_mail', 10, 1 );

// define the wpcf7_form_class_attr callback
function filter_wpcf7_form_class_attr( $class )
{
    global $wp_query;
    if( isset( $wp_query->query_vars['id'] ) )
        $class .= ' row';

    return $class;
};

// add the filter
add_filter( 'wpcf7_form_class_attr', 'filter_wpcf7_form_class_attr', 10, 1 );

add_action( 'wp_ajax_selenenw_get_model_listing', 'selenenw_get_model_listing_form_callback' );
add_action( 'wp_ajax_nopriv_selenenw_get_model_listing', 'selenenw_get_model_listing_form_callback' );
/**
 * Ajax callback function that retrieves the Model Listing
 */
function selenenw_get_model_listing_form_callback() {
    global $wpdb;

    $query = "SELECT * FROM " . $wpdb->prefix . "models";
    $models = $wpdb->get_results( $query );

    foreach ( $models as $model ) {
        $url = get_permalink( get_page_by_path( 'yacht-model' ) ) . sanitize_title( $model->name ) . '-' . $model->id . '/';

        $response[] = array(
            'id' => $model->id,
            'name' => $model->name,
            'length' => $model->length,
            'primary_image' => $model->primary_image,
            'url' => $url,
            'description' => substr( strip_tags( $model->description ), 0, 300 ) . '...',
        );
    }

    echo ( !empty( $response ) ) ? json_encode( $response ) : 0;
    exit;
}