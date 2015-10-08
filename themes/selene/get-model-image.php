<?php
/**
 Template Name: Temp Get Image
 */

if(isset($_POST['urls'])) {
    $urls = json_decode( $_POST['urls'] );
    $images = array();
    foreach ( $urls as $url ) {
        $result = get_yacht_image ( $url );
        $images[] = array(
            'original' => str_replace( '640x465_', '', $result),
            'resized' => $result,
        );
    }

    var_dump( json_encode( $images ) );
}


echo '<form action="' . get_permalink() . '" method="post"><textarea name="urls"></textarea><input type="submit" value="Get Images" name="get-images"></form>';