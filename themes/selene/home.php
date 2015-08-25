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
                            <p>Let us know your requirements so we can assist in managing your yacht.</p>
                            <a href="contact.html" class="trigger button full small white" title="Contact us">Contact
                                us</a>
                        </div>

                        <div class="widget featured">
                            <a href="yacht-sale-single.html"><img src="http://placehold.it/800x600" alt="boat"/></a>

                            <div class="box-white">
                                <h4><a href="yacht-sale-single.html" title="Featured Yacht: Elan 1923 Impression">Featured
                                        Yacht:
                                        <br/><strong>Elan 1923 Impression</strong></a></h4>
                            </div>
                        </div>

                        <div class="widget">
                            <a href="#"><img src="http://placehold.it/300x300" alt="broker image"/></a>
                        </div>

                        <div class="widget box-navy box">
                            <h4>Base Open Hours</h4>

                            <p>Mon to Fri&nbsp;&nbsp; 8:00am – 4:00pm<br/>Sat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                9:00am – 7:00pm<br/>Sun&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;8:00am
                                – 7:00pm </p>
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
                                    echo get_post_format();

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

                            endif;
                            ?>
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