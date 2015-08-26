<?php /*Template Name: Staff*/ ?>
<?php get_header(); ?>
<!-- Main -->
<main class="main" role="main">
    <?php if ( have_posts() ) : ?>
    <?php
    // Start the loop.
    while ( have_posts() ) : the_post(); ?>
        <!-- Intro -->
        <header class="intro">
            <div class="wrap">
                <h1><?php the_title(); ?></h1>
                <?php the_content(); ?>
            </div>
        </header>
        <!-- //Intro -->

        <!-- Content -->
        <div class="content crew">
            <!-- Item -->
            <?php
            $staff = get_uf_repeater('staff_details');
            foreach ($staff as $s) {
                $staff_image = ( !empty( $s[ 'staff_image' ] ) ) ? $s[ 'staff_image' ] : 'http://placehold.it/675x500';
                echo '<article class="one-half item">';
                    echo '<figure><img src="' . $staff_image . '" alt="crew" /></figure>';
                    echo '<div class="box-white">';
                        echo '<h2>' . $s[ 'staff_name' ] . '</h2>';
                        echo '<span class="sub">' . $s[ 'staff_job_title' ] . '</span>';
                        echo '<div class="skills">';
                            echo $s[ 'staff_introduction' ];
                        echo '</div>';
                    echo '</div>';
                echo '</article>';
            }
            ?>
            <!-- //Item -->
        </div>
    <?php endwhile; ?>
    <!-- //Content-->
    <?php
    // If no content, include the "No posts found" template.
    else :
        get_template_part( 'content', 'none' );
    endif; ?>
</main>
<!-- //Main -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
