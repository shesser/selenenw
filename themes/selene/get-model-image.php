<?php
/**
 Template Name: Temp Get Image
 */

if(isset($_POST['url'])) {
 $file = $_POST['url'];
 echo get_yacht_image ( $file ).'<br/>';
}


echo '<form action="' . get_permalink() . '" method="post"><input type="text" name="url"><input type="submit" value="Get Images" name="get-images"></form>';