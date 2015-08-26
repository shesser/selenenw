<?php
/**
 * Template Name: No Sidebar
 */
;?>
<?php get_header(); ?>

    <main class="main" role="main">
        <?php if ( have_posts() ) : ?>
            <?php
            // Start the loop.
            while ( have_posts() ) : the_post(); ?>
            <!-- Intro -->
            <header class="intro">
                <div class="wrap">
                    <h1><?php the_title() ?></h1>
                </div>
            </header>
            <!-- //Intro -->

            <!-- Content -->
            <div class="content static">
                <!-- Wrapper -->
                <div class="wrap">
                    <div class="row">
                        <!-- FullWidth -->
                        <div class="full-width">
                            <div class="box-white">
                                <?php the_content(); ?>
                            </div>
                        </div>
                        <!-- //FullWidth -->
                    </div>
                </div>
                <!-- //Wrapper -->
            </div>
            <?php endwhile; ?>
        <!-- //Content-->
        <?php
        // If no content, include the "No posts found" template.
        else :
            get_template_part( 'content', 'none' );
        endif; ?>
    </main>

<?get_sidebar(); ?>
<?get_footer(); ?>