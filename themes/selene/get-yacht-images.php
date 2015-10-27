<?php /** Template Name: Get Yacht Images */

if( isset( $_POST['get-images'] ) )
    fetch_yachtworld_images();

global $wpdb;

$query = "SELECT COUNT(*) FROM " . $wpdb->prefix . "yachts WHERE images IS NULL";
$yachts_count = $wpdb->get_var( $query );

//if( $yachts_count ) {
    echo $yachts_count . ' yacht doesn\'t have images ';
    echo '<form action="' . get_permalink() . '" method="post"><input type="submit" value="Get Images" name="get-images"></form>';
//} else {
    echo 'All the yachts have images';
//}

