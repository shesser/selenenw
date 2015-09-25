<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 */
?>
<!-- Footer -->
<footer class="footer" role="contentinfo">
    <!-- Wrapper -->
    <div class="wrap">
        <div class="row">
            <!-- OneFourth -->
            <div class="one-fourth">
                <?php if( uf( 'lc_heading', 'option', false ) != '' ) : ?>
                    <h6><?php uf( 'lc_heading', 'option' ); ?></h6>
                    <?php uf( 'lc_description', 'option' ); ?>
                <?php endif; ?>
            </div>
            <!-- //OneFourth -->

            <?php if ( has_nav_menu( 'footer' ) ) : ?>
            <!-- OneFourth -->
            <div class="one-fourth">
                <?php
                $footer_second_column = 18;
                $nav_menu = wp_get_nav_menu_object( $footer_second_column );
                echo '<h6>' . $nav_menu->name . '</h6>';

                wp_nav_menu( array(
                    'menu_class'     => 'check',
                    'menu_id'        => 'footer-second-column',
                    'theme_location' => 'footer',
                    'menu'         => $footer_second_column,
                ) );
                ?>
            </div>
            <!-- //OneFourth -->
            <?php endif; ?>

            <?php if ( has_nav_menu( 'footer' ) ) : ?>
            <!-- OneFourth -->
            <div class="one-fourth">
                <?php
                $footer_third_column = 19;
                $nav_menu = wp_get_nav_menu_object( $footer_third_column );
                echo '<h6>' . $nav_menu->name . '</h6>';

                wp_nav_menu( array(
                    'menu_id'        => 'footer-third-column',
                    'theme_location' => 'footer',
                    'menu'         => $footer_third_column,
                ) );
                ?>
            </div>
            <!-- //OneFourth -->
            <?php endif; ?>

            <!-- OneFourth -->
            <div class="one-fourth">
                <?php if( uf( 'rc_heading', 'option', false ) != '' ) : ?>
                    <h6><?php uf( 'rc_heading', 'option' ); ?></h6>
                    <?php uf( 'rc_description', 'option' ); ?>
                <?php endif; ?>

                <?php if( uf( 'facebook_url', 'option', false ) != '' ) : ?>
                    <a href="<?php uf( 'facebook_url', 'option' ); ?>" title="Facebook" class="circle"><i class="fa fa-facebook fa-fw"></i></a>
                <?php endif; ?>
                <?php if( uf( 'vimeo_url', 'option', false ) != '' ) : ?>
                    <a href="<?php uf( 'vimeo_url', 'option' ); ?>" title="Vimeo" class="circle"><i class="fa fa-vimeo-square fa-fw"></i></a>
                <?php endif; ?>
                <?php if( uf( 'youtube_url', 'option', false ) != '' ) : ?>
                    <a href="<?php uf( 'youtube_url', 'option' ); ?>" title="Youtube" class="circle"><i class="fa fa-youtube-play fa-fw"></i></a>
                <?php endif; ?>
                <?php if( uf( 'instagram_url', 'option', false ) != '' ) : ?>
                    <a href="<?php uf( 'instagram_url', 'option' ); ?>" title="instagram" class="circle"><i class="fa fa-instagram fa-fw"></i></a>
                <?php endif; ?>
            </div>
            <!-- //OneFourth -->
        </div>
    </div>
    <!-- //Wrapper -->

    <div class="copy">
        <!-- Wrapper -->
        <div class="wrap">
            <p><?php uf( 'copyright_text', 'option' ); ?></p>
            <p></p>
        </div>
        <!-- //Wrapper -->
    </div>
</footer>
<!-- //Footer -->

<?php wp_footer(); ?>
</body>
</html>
