<?php
/*
Plugin Name: SeleneNW Yacht Management
Plugin URI: selenenw.com
Description: Plugin provides yacht management features
Author: Mani
Author URI: https://www.odesk.com/users/~01011dcc08634dc24e
Version: 1.0
*/

function selenenw_enqueue_styles() {
    wp_enqueue_style('snw-yacht-management-admin', plugins_url('css/admin.css', __FILE__), null, '09192015');
}

add_action('admin_enqueue_scripts', 'selenenw_enqueue_styles');

/**
 * Adds a box to the main column on the Home Page edit screens.
 */
function selenenw_fearuted_yacht_add_meta_box() {
    $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;

    if ( $post_id == '33' ) {
        add_meta_box(
            'snw-yacht-management-featured-yacht',
            'Featured Yachts',
            'selenenw_fearuted_yacht_meta_box_callback',
            'page'
        );
    }
}
add_action( 'add_meta_boxes', 'selenenw_fearuted_yacht_add_meta_box' );

/**
 * Prints the box content.
 *
 * @param WP_Post $post The object for the current post/page.
 */
function selenenw_fearuted_yacht_meta_box_callback( $post ) {
    global $wpdb;
    // Add a nonce field so we can check for it later.
    wp_nonce_field( 'selenenw_fearuted_yacht_save_meta_box_data', 'selenenw_fearuted_yacht_meta_box_nonce' );

    $query = "SELECT * FROM " . $wpdb->prefix . "yachts ORDER BY is_selenenw DESC" ;
    $yachts = $wpdb->get_results( $query );

    if ( !empty( $yachts ) ) {
        echo '<table><tr><th></th><th>Name</th><th>Built</th><th>Length</th><th>Price</th></tr>';

        foreach ( $yachts as $yacht ) {
            $row_class = ( $yacht->is_selenenw ) ? 'our' : '';
            $row_checked = ( $yacht->is_featured ) ? 'checked="checked"' : '';

            echo '<tr class="' . $row_class . '">';
            echo '<td><input type="checkbox" name="selenenw-featured-yacht[]" value="' . $yacht->id . '" id="ch' . $yacht->id . '" '. $row_checked .' /></td>';
            echo '<td>' . $yacht->name . '</td>';
            echo '<td>' . $yacht->built . '</td>';
            echo '<td>' . $yacht->length. '</td>';
            echo '<td>$ ' . number_format_i18n( $yacht->price ) . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    }
}

/**
 * When the post is saved, saves our custom data.
 *
 * @param int $post_id The ID of the post being saved.
 */
function selenenw_fearuted_yacht_save_meta_box_data( $post_id ) {

    /*
     * We need to verify this came from our screen and with proper authorization,
     * because the save_post action can be triggered at other times.
     */

    // Check if our nonce is set.
    if ( ! isset( $_POST['selenenw_fearuted_yacht_meta_box_nonce'] ) ) {
        return;
    }

    // Verify that the nonce is valid.
    if ( ! wp_verify_nonce( $_POST['selenenw_fearuted_yacht_meta_box_nonce'], 'selenenw_fearuted_yacht_save_meta_box_data' ) ) {
        return;
    }

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    // Check the user's permissions.
    if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {

        if ( ! current_user_can( 'edit_page', $post_id ) ) {
            return;
        }

    } else {

        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
    }

    /* OK, it's safe for us to save the data now. */

    // Make sure that it is set.
    if ( ! isset( $_POST['selenenw-featured-yacht'] ) ) {
        return;
    }

    // Sanitize user input.
    $featured_yachts = $_POST['selenenw-featured-yacht'];
    array_map('sanitize_text_field', $featured_yachts);

    global $wpdb;
    $wpdb->query("UPDATE " . $wpdb->prefix . "yachts SET is_featured = 0");
    $wpdb->query("UPDATE " . $wpdb->prefix . "yachts SET is_featured = 1 WHERE id IN (" . implode(', ', $featured_yachts) . ")");

}
add_action( 'save_post', 'selenenw_fearuted_yacht_save_meta_box_data' );