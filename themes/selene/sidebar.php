<?php
/**
 * The sidebar containing the main widget area
 */
?>
<!-- Bottom Sidebar -->
<aside class="sidebar bottom white" role="complementary">
    <!-- Wrapper -->
    <div class="wrap">
        <div class="row">
            <h2><?php uf( 'c_heading', 'option' ); ?></h2>
            <!-- OneFourth -->
            <div class="one-fourth">
                <h5><?php uf( 'fc_heading', 'option' ); ?></h5>
                <?php if( uf( 'fc_phone', 'option', false ) != '' ) : ?>
                    <p><span class="circle small"><i class="fa fa-phone fa-fw"></i></span><?php uf( 'fc_phone', 'option' ); ?></p>
                <?php endif; ?>
                <?php if( uf( 'fc_email', 'option', false ) != '' ) : ?>
                    <p><span class="circle small"><i class="fa fa-envelope fa-fw"></i></span> <a href="mailto:<?php uf( 'fc_email', 'option' ); ?>"><?php uf( 'fc_email', 'option' ); ?></a></p>
                <?php endif; ?>
            </div>
            <!-- //OneFourth -->

            <!-- OneFourth -->
            <div class="one-fourth">
                <h5><?php uf( 'sc_heading', 'option' ); ?></h5>
                <?php if( uf( 'sc_phone', 'option', false ) != '' ) : ?>
                    <p><span class="circle small"><i class="fa fa-phone"></i></span><?php uf( 'sc_phone', 'option' ); ?></p>
                <?php endif; ?>
                <?php if( uf( 'sc_email', 'option', false ) != '' ) : ?>
                    <p><span class="circle small"><i class="fa fa-envelope"></i></span> <a href="mailto:<?php uf( 'sc_email', 'option' ); ?>"><?php uf( 'sc_email', 'option' ); ?></a></p>
                <?php endif; ?>
            </div>
            <!-- //OneFourth -->

            <!-- OneFourth -->
            <div class="one-fourth">
                <h5><?php uf( 'tc_heading', 'option' ); ?></h5>
                <?php if( uf( 'tc_phone', 'option', false ) != '' ) : ?>
                    <p><span class="circle small"><i class="fa fa-phone"></i></span><?php uf( 'tc_phone', 'option' ); ?></p>
                <?php endif; ?>
                <?php if( uf( 'tc_email', 'option', false ) != '' ) : ?>
                    <p><span class="circle small"><i class="fa fa-envelope"></i></span> <a href="mailto:<?php uf( 'tc_email', 'option' ); ?>"><?php uf( 'tc_email', 'option' ); ?></a></p>
                <?php endif; ?>
            </div>
            <!-- //OneFourth -->

            <!-- OneFourth -->
            <div class="one-fourth">
                <h5><?php uf( 'fo_heading', 'option' ); ?></h5>
                <?php if( uf( 'fo_phone', 'option', false ) != '' ) : ?>
                    <p><span class="circle small"><i class="fa fa-phone"></i></span><?php uf( 'fo_phone', 'option' ); ?></p>
                <?php endif; ?>
                <?php if( uf( 'fo_email', 'option', false ) != '' ) : ?>
                    <p><span class="circle small"><i class="fa fa-envelope"></i></span> <a href="mailto:<?php uf( 'fo_email', 'option' ); ?>"><?php uf( 'fo_email', 'option' ); ?></a></p>
                <?php endif; ?>
            </div>
            <!-- //OneFourth -->
        </div>
    </div>
    <!-- //Wrapper -->
</aside>
<!-- //Bottom Sidebar -->
