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

            <!-- OneFourth -->
            <div class="one-fourth">
                <h6>Why book with us?</h6>
                <ul class="check">
                    <li><a href="#">Secure booking</a></li>
                    <li><a href="#">Best price guarantee</a></li>
                    <li><a href="#">Passionate service</a></li>
                    <li><a href="#">Exclusive knowledge</a></li>
                    <li><a href="#">Benefits for partners</a></li>
                </ul>
            </div>
            <!-- //OneFourth -->

            <!-- OneFourth -->
            <div class="one-fourth">
                <h6>Need help?</h6>
                <ul>
                    <li><a href="#">Faq</a></li>
                    <li><a href="#">How do I make a reservation?</a></li>
                    <li><a href="#">Payment options</a></li>
                    <li><a href="#">Privacy policy</a></li>
                    <li><a href="#">Terms and conditions</a></li>
                </ul>
            </div>
            <!-- //OneFourth -->

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
