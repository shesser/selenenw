<?php get_header(); ?>
    <!-- Main -->
    <main class="main" role="main">
        <!-- Content -->
        <div class="content static">
            <!-- Wrapper -->
            <div class="wrap">
                <div class="row">
                    <!-- OneFourth -->
                    <aside class="one-fourth sidebar sidebar-left">
                        <div class="widget box-navy box">
                            <p>Let us know your requirements so we can assist in finding your perfect boat.</p>
                            <a href="<?php echo get_permalink( get_page_by_path( 'contact' ) ); ?>" class="trigger button full small white" title="Contact us">Contact
                                us</a>
                        </div>
                    </aside>
                    <!-- //OneFourth -->

                    <!-- ThreeFourth -->
                    <div class="three-fourth">
                        <div class="row">
                            <?php if ( have_posts() ) : ?>

                                <?php if ( is_home() && ! is_front_page() ) : ?>
                                    <!--<header>
            <h1><?php /*single_post_title(); */?></h1>
        </header>-->
                                <?php endif; ?>

                                <?php
                                // Start the loop.
                                while ( have_posts() ) : the_post();
                                    get_template_part( 'content', get_post_format() );

                                    // End the loop.
                                endwhile;

                                $args = wp_parse_args( $args, array(
                                    'mid_size'           => 1,
                                    'prev_next'          => false,
                                    'type'               => 'plain',
                                ) );

                                ?>

                                <div class="pager2 full-width">
                                <?php echo paginate_links( $args ); ?>
                                </div>

                            <?php
                            // If no content, include the "No posts found" template.
                            else :
                                get_template_part( 'content', 'none' );

                            endif; ?>
                        </div>
                        <!-- Item -->
                    </div>
                    <!-- //ThreeFourth -->
                </div>
            </div>
            <!-- //Wrapper -->
        </div>
        <!-- //Content-->
    </main>
    <!-- //Main -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>