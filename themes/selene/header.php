<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php wp_head(); ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- box-navy: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body <?php //body_class(); ?>>
<!-- Preloader -->
<div class="preloader">
    <div>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>
<!-- //Preloader -->

<!-- Header -->
<header class="header" role="banner">
    <div class="wrap">
        <!-- Logo -->
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="Selene" class="logo"><img src="<?php uf('logo', 'option'); ?>" /></a>
        <!-- //Logo -->

        <!-- Primary menu -->
        <?php if ( has_nav_menu( 'primary' ) ) : ?>
            <nav class="main-nav" role="navigation">
                <?php
                // Primary navigation menu.
                wp_nav_menu( array(
                    'menu_class'     => 'jetmenu',
                    'menu_id'        => 'jetmenu',
                    'theme_location' => 'primary',
                    'walker'         => new themeslug_walker_nav_menu
                ) );
                ?>
            </nav>
        <?php endif; ?>
        <!-- //Primary menu -->
    </div>
</header>
<!-- //Header -->