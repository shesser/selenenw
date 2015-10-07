<?php /** Template Name: Model Detail */ ?>
<?php get_header(); ?>

<?php
if( isset( $wp_query->query_vars['id'] ) ) {
    $tmp = explode( '-', $wp_query->query_vars['id'] );
    $id = end( $tmp );

    global $wpdb;

    $model = $wpdb->get_row("SELECT * FROM " . $wpdb->prefix . "models WHERE id = '" . $id . "'" );

    if ( null !== $model ) {
        $number_of_tabs = 2;
        $full_specs = json_decode( $model->full_specs );
        if ( !empty( $full_specs ) )
            $number_of_tabs++;
        if ( !is_null( $model->features ) )
            $number_of_tabs++;
        ?>

        <!-- Main -->
        <main class="main" role="main">
            <!-- Intro -->
            <header class="intro">
                <div class="wrap">
                    <h1><?php echo $model->name; ?></h1>
                    <a href="#tab-navigation" title="Get more info" class="button white medium">Get more info</a>
                </div>
            </header>
            <!-- //Intro -->

            <?php if( !is_null( $model->images ) ) { ?>
            <!-- Gallery -->
            <div class="gallery" id="gallery">
                <?php $images = json_decode( $model->images );
                foreach ( $images as $i => $image ) { ?>
                    <!-- Item -->
                    <figure class="one-fourth" data-src="<?php echo $image->original; ?>" <?php echo ( $i < 12) ? '' : 'style="display: none;"'?>>
                        <img src="<?php echo $image->resized; ?>" alt="" />
                        <figcaption>
                            <span class="icojam_zoom_in"></span>
                        </figcaption>
                    </figure>
                    <!-- //Item -->
                <?php } ?>
            </div>
            <!-- //Gallery -->
            <?php } ?>

            <!-- Content -->
            <div class="content">
                <!-- Tab navigation -->
                <nav class="tabs <?php echo number_to_words( $number_of_tabs ); ?>" role="navigation" id="tab-navigation">
                    <ul class="wrap">
                        <li><a href="#tab1" title="Description">
                                <span class="icojam_info_3"></span> Description
                            </a></li>
                        <?php if ( !empty( $full_specs ) ) : ?>
                        <li><a href="#tab2" title="Specifications">
                                <span class="icojam_document"></span> Specifications
                            </a></li>
                        <?php endif; ?>
                        <li><a href="#tab4" title="Contact Broker">
                                <span class="icojam_target"></span> Contact Broker
                            </a></li>
                        <?php if( !is_null( $model->features ) ) : ?>
                        <li><a href="#tab5" title="Get Brochure">
                                <span class="icojam_inbox_receive"></span> Downloads
                            </a></li>
                        <?php endif; ?>
                    </ul>
                </nav>
                <!-- //Tab navigation -->

                <!-- Wrapper -->
                <div class="wrap">
                    <!-- Tab Content-->
                    <article class="tab-content" id="tab1">
                        <div class="row">
                            <!-- OneHalf -->
                            <div class="one-half">
                                <h2>About <?php echo $model->name; ?></h2>
                                <?php echo $model->description; ?>
                            </div>
                            <!-- //OneHalf -->

                            <!-- OneHalf -->
                            <div class="one-half">
                                <img src="<?php echo $model->primary_image; ?>" alt="<?php echo $model->name; ?>" />
                            </div>
                            <!-- //OneHalf -->
                        </div>
                    </article>
                    <!-- //Tab Content-->

                    <!-- Tab Content-->
                    <article class="tab-content" id="tab2">
                        <div class="row">
                            <!-- OneHalf -->
                            <div class="one-half">
                                <?php if ( !empty( $full_specs ) ) { ?>
                                    <?php foreach ( $full_specs as $key => $value ) {
                                        echo '<table>';
                                        echo '<tr><th colspan="2">' . $key . '</th></tr>';

                                        foreach ( $value as $v ) {
                                            if( is_array( $v ) )
                                                echo '<tr><td>' . $v[0] . '</td><td>' . $v[1] . '</td></tr>';
                                            else
                                                echo '<tr><td colspan="2">' . $v . '</td></tr>';
                                        }

                                        echo '</table>';
                                    } ?>
                                <?php } ?>
                            </div>
                            <!-- //OneHalf -->

                            <!-- OneHalf -->
                            <div class="one-half">
                                <div class="border"><img src="<?php echo $model->primary_image; ?>" alt="<?php echo $model->title; ?>" /></div>
                            </div>
                            <!-- //OneHalf -->
                        </div>
                    </article>
                    <!-- //Tab Content-->

                    <!-- Tab Content-->
                    <article class="tab-content" id="tab4">
                        <div class="row">
                            <!-- ThreeFourth -->
                            <div class="three-fourth">
                                <h2>Contact the broker directly</h2>
                                <p>Please use the form below in order to send an inqury regarding the yacht. You will be contacted by the broker within 24 hours. Thank you very much.</p>
                                <p>All fields are required.</p>
                                <?php echo do_shortcode( '[contact-form-7 id="178" title="Contact Broker"]' ); ?>
                            </div>
                            <!-- //ThreeFourth -->

                            <!-- OneFourth -->
                            <aside class="one-fourth sidebar sidebar-right">
                                <div class="widget">
                                    <img src="<?php echo $model->primary_image; ?>"" alt="<?php echo $model->name; ?>"" />
                                </div>
                            </aside>
                            <!-- //OneFourth -->
                        </div>
                    </article>
                    <!-- //Tab Content-->

                    <?php if ( !is_null( $model->features ) ) : ?>
                    <!-- Tab Content-->
                    <article class="tab-content" id="tab5">
                        <div class="row">
                            <!-- FullWidth -->
                            <div class="full-width">
                                <h2>Downloads</h2>
                                <ul class="icons">
                                    <li><a href="<?php echo $model->features; ?>" target="_blank"><span class="icojam_pdf"></span> Full Specifications</a></li></ul>
                            </div>
                            <!-- //FullWidth -->
                        </div>
                    </article>
                    <!-- //Tab Content-->
                    <?php endif; ?>
                </div>
                <!-- //Wrapper -->
            </div>
            <!-- //Content-->

        </main>
        <!-- //Main -->
        <script>
            jQuery(document).ready(function () {
                jQuery("#gallery").lightGallery();
            });
        </script>
    <?php } else {

    }
} else {

}?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
