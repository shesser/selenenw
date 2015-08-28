<?php /* Template Name: Contact with Map */ ?>
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
    <div class="content boxed grid2">
        <!-- Item -->
        <article class="full-width hentry">
            <div class="one-half">
                <div class="text">
                    <?php uf( 'contact_form' ); ?>
                </div>
            </div>
            <div class="one-half"><iframe src="<?php uf( 'contact_map' ); ?>" width="1000" height="800" frameborder="0" style="border:0"></iframe></div>
        </article>
        <!-- //Item -->
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

