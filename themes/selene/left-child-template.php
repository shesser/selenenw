<?php /** Template Name: Left Child Menu */ ?>
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
        </div>
    </header>
    <!-- //Intro -->

    <!-- Content -->
    <div class="content static">
        <!-- Wrapper -->
        <div class="wrap">
            <div class="row">
                <!-- OneFourth -->
                <aside class="one-fourth sidebar sidebar-left">
                    <!-- Tab navigation -->
                    <nav class="tabs vertical" role="navigation">
                        <ul class="wrap">
                            <?php
                            $parent_id = ( wp_get_post_parent_id( get_the_ID() ) ) ? wp_get_post_parent_id( get_the_ID() ) : get_the_ID();
                            $args = array(
                                'post_parent' => $parent_id,
                                'post_type'   => 'page',
                                'post_status' => 'publish',
                                'order'       => 'ASC'
                            );
                            $children = get_children( $args );

                            $current = ( $parent_id == get_the_ID() ) ? 'current' : '';
                            echo '<li class="' . $current . '"><a href="' . esc_url( get_permalink( $parent_id ) ). '" title="' . get_the_title( $parent_id ) . '">' . get_the_title( $parent_id ) . '</a></li>';

                            foreach( $children as $child ) {
                                $current = ( $child->ID == get_the_ID() ) ? 'current' : '';
                                echo '<li class="' . $current . '"><a href="' . esc_url( get_permalink( $child->ID ) ). '" title="' . $child->post_title . '">' . $child->post_title . '</a></li>';
                            }
                            ?>
                        </ul>
                    </nav>
                    <!-- //Tab navigation -->

                    <div class="widget box-navy box">
                        <p>Let us know your requirements so we can assist in managing your yacht.</p>
                        <a href="<?php echo get_permalink( get_page_by_path( 'contact' ) ); ?>" class="trigger button full small white" title="Contact us">Contact us</a>
                    </div>
                </aside>
                <!-- //OneFourth -->


                <!-- ThreeFourth -->
                <div class="three-fourth">
                    <!-- Tab Content-->
                    <article class="tab-content" id="tab1">
                        <div class="box-white">
                            <?php the_content(); ?>
                        </div>
                    </article>
                    <!-- //Tab Content-->
                </div>
                <!-- //ThreeFourth -->
            </div>
        </div>
        <!-- //Wrapper -->
    </div>
    <!-- //Content-->
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
