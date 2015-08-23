<?php
class themeslug_walker_nav_menu extends Walker_Nav_Menu {

    // add classes to ul sub-menus
    function start_lvl( &$output, $depth ) {
        $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
        $classes = array('sub-menu');

        if($depth == 0)
            $classes[] = 'dropdown';

        $class_names = implode( ' ', $classes );

        // build html
        $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
    }
}