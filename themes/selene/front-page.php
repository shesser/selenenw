<?php /*Template Name: Home*/ ?>
<?php get_header(); ?>
<!-- Main -->
<main class="main" role="main">
    <!-- Hero -->
    <div class="hero" style="background:url(<?php uf( 'ban_image' ); ?>) 50% 50% no-repeat;">
        <article>
            <h1 class="wow fadeInDown"><?php uf( 'ban_text' ); ?></h1>
            <a href="<?php uf( 'ban_button_link' ); ?>" title="<?php strip_tags( uf( 'ban_button_text' ) ); ?>" class="anchor button white medium wow fadeInUp"><?php uf( 'ban_button_text' ); ?></a>
        </article>
    </div>
    <!-- //Hero -->

    <!-- Tab navigation -->
    <?php
    $ctas = get_uf_repeater('cta_repeater');
    if ( !empty($ctas) ) {
        if ( count( $ctas ) > 4 )
            $class = 'four';
        else
            $class = number_to_words( count( $ctas ) );

        echo '<nav class="tabs ' . $class . '" role="navigation">
            <ul class="wrap">';

        for ( $i=0; $i < ( ( count ( $ctas ) > 4 ) ? 4 : count( $ctas ) ); $i++ ) {
            echo '<li><a href="' . $ctas[ $i ][ 'cta_link' ] . '" title="' . strip_tags( $ctas[ $i ][ 'cta_text' ] ) . '">
                    <img src="' . $ctas[ $i ][ 'cta_image' ] . '" alt="" /> ' . $ctas[ $i ][ 'cta_text' ] . '
                </a></li>';
        }

        echo '</ul>
            </nav>';
    }
    ?>
    <!-- //Tab navigation -->

    <!-- Call to action -->
    <?php if( uf ( 'full_cta_1_title', '', false ) || uf ( 'full_cta_1_description', '', false ) ||  uf ( 'full_cta_1_button_text', '', false ) ) : ?>
    <section class="cta gold">
        <div class="wrap center">
            <?php if( uf ( 'full_cta_1_title', '', false ) ) : ?>
                <h2><?php uf ( 'full_cta_1_title' ); ?></h2>
            <?php endif; ?>
            <?php if( uf ( 'full_cta_1_description', '', false ) ) :
                uf ( 'full_cta_1_description' );
            endif; ?>
            <?php if( uf ( 'full_cta_1_button_text', '', false ) ) : ?>
                <a href="<?php uf ( 'full_cta_1_button_link' ); ?>" title="<?php strip_tags( uf( 'full_cta_1_button_text' ) ); ?>" class="button white medium"><?php uf ( 'full_cta_1_button_text' ); ?></a>
            <?php endif; ?>
        </div>
    </section>
    <?php endif; ?>
    <!-- //Call to action -->

    <?php $featured_yachts = selenenw_get_featured_yachts(); ?>
    <?php if( $featured_yachts ) : ?>
    <!-- Deals -->
    <section id="featured-yacht" class="content boxed grid2 noarrow">
        <ul id="lightSliderDeals">
            <?php foreach( $featured_yachts as $yacht) : ?>
            <li>
                <!-- Item -->
                <article class="full-width hentry">
                    <figure class="one-half heightfix"><a href="<?php echo $yacht['url']; ?>"><img src="<?php echo $yacht['primary_image']; ?>" alt="deal" /></a></figure>
                    <div class="one-half heightfix">
                        <header>Featured Yacht</header>
                        <div class="text">
                            <h3><a href="yacht-single.html"><?php echo $yacht['title']; ?></a></h3>
                            <p><?php echo $yacht['short_desc']; ?></p>

                            <div class="details">
                                <div>
                                    <span class="icojam_location_1"></span>
                                    <p>Length: <?php echo $yacht['length']; ?></p>
                                </div>
                                <div>
                                    <span class="icojam_friends"></span>
                                    <p>Built: <?php echo $yacht['built']; ?></p>
                                </div>
                                <div class="price">$ <?php echo $yacht['price']; ?></div>
                                <div><a href="<?php echo $yacht['url']; ?>" title="Read More" class="button gold full medium solid">Read More</a> </div>
                            </div>
                        </div>
                    </div>
                </article>
                <!-- //Item -->
            </li>
            <?php endforeach; ?>
        </ul>
    </section>
    <!-- //Deals -->
    <?php endif; ?>

    <!-- Testimonials -->
    <section class="testimonials">
        <div class="wrap center">
            <h6>WOW - This is the Best Theme I have ever seen.</h6>
            <p>"Excellent - you found the right boat in the right place at the right time,<br /> and managed to change the dates for our convenience - brilliant!" </p>
            <p>- Johnatan Davidson</p>
        </div>
    </section>
    <!-- //Testimonials -->

    <!-- Photo -->
    <?php if( uf( 'parallax_cta_image', '', false ) || uf ( 'parallax_cta_title', '', false ) || uf ( 'parallax_cta_description', '', false ) ||  uf ( 'parallax_cta_button_text', '', false ) ) : ?>
    <section class="photo" style="background:url(<?php uf( 'parallax_cta_image'); ?>) 50% 50% fixed no-repeat;background-size:cover;">
        <div class="wrap center">
            <?php if( uf ( 'parallax_cta_title', '', false ) ) : ?>
                <h2><?php uf ( 'parallax_cta_title' ); ?></h2>
            <?php endif; ?>
            <?php if( uf ( 'parallax_cta_description', '', false ) ) :
                uf ( 'parallax_cta_description' );
            endif; ?>
            <?php if( uf ( 'parallax_cta_button_text', '', false ) ) : ?>
                <a href="<?php uf ( 'parallax_cta_button_link' ); ?>" title="<?php strip_tags( uf( 'parallax_cta_button_text' ) ); ?>" class="button white medium"><?php uf ( 'parallax_cta_button_text' ); ?></a>
            <?php endif; ?>
        </div>
    </section>
    <? endif; ?>
    <!-- //Photo -->

    <!-- Call to action -->
    <?php if( uf ( 'bar_cta_text', '', false ) ||  uf ( 'bar_cta_button_text', '', false ) ) : ?>
    <section class="cta grey">
        <div class="wrap">
            <?php if( uf ( 'bar_cta_button_text', '', false ) ) : ?>
                <a href="<?php uf ( 'bar_cta_button_link' ); ?>" title="<?php strip_tags( uf ( 'bar_cta_button_text' ) ); ?>" class="button white medium right"><?php uf ( 'bar_cta_button_text'); ?></a>
            <?php endif; ?>
            <?php if ( uf ( 'bar_cta_text', '', false ) ) : ?>
                <h3><?php uf ( 'bar_cta_text' ); ?></h3>
            <?php endif; ?>
        </div>
    </section>
    <?php endif; ?>
    <!-- //Call to action -->

    <?php $posts = get_posts( array( 'category_name' => 'featured' ) ); ?>
    <?php if( !empty( $posts ) ) : ?>
    <!-- Blog posts -->
    <section id="blog-post" class="content boxed grid2">
        <ul id="lightSliderPosts">
            <?php foreach( $posts as $post ) : setup_postdata( $post ); ?>
            <li>
                <!-- Item -->
                <article class="full-width hentry">
                    <figure class="one-half heightfix"><a href="<?php echo the_permalink(); ?>"><?php the_post_thumbnail( 'post-thumbnail', array( 'alt' => get_the_title() ) ); ?></a></figure>
                    <div class="one-half heightfix">
                        <div class="text">
                            <h3><a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a></h3>
                            <div class="meta">
                                <span>By <a href="#"><?php the_author(); ?></a></span>
                                <span><?php the_date( 'M jS, Y' ); ?></span>
                                <span><a href="<?php echo the_permalink(); ?>#comments"><?php echo get_comments_number(); ?> <?php comments_number('Comment', 'Comment', 'Comments'); ?></a></span>
                            </div>
                            <?php the_excerpt(); ?>
                            <a href="<?php echo the_permalink(); ?>" class="button small gold" title="Read more">Read more</a>
                        </div>
                    </div>
                </article>
                <!-- //Item -->
            </li>
            <?php endforeach; wp_reset_postdata(); ?>
        </ul>
    </section>
    <!-- //Blog posts -->
    <?php endif; ?>

    <!-- Call to action -->
    <?php if( uf ( 'full_cta_2_title', '', false ) || uf ( 'full_cta_2_description', '', false ) ||  uf ( 'full_cta_2_button_text', '', false ) ) : ?>
        <section class="cta gold">
            <div class="wrap center">
                <?php if( uf ( 'full_cta_2_title', '', false ) ) : ?>
                    <h2><?php uf ( 'full_cta_2_title' ); ?></h2>
                <?php endif; ?>
                <?php if( uf ( 'full_cta_2_description', '', false ) ) :
                    uf ( 'full_cta_1_description' );
                endif; ?>
                <?php if( uf ( 'full_cta_2_button_text', '', false ) ) : ?>
                    <a href="<?php uf ( 'full_cta_2_button_link' ); ?>" title="<?php strip_tags( uf ( 'full_cta_2_button_text' ) ); ?>" class="button white medium"><?php uf ( 'full_cta_2_button_text' ); ?></a>
                <?php endif; ?>
            </div>
        </section>
    <?php endif; ?>
    <!-- //Call to action -->

    <?php if( uf ( 'yacht_listing_show', '', false ) ) : ?>
        <?php $recent_yachts = selenenw_get_yacht_listing( false, array(), 'is_selenenw DESC', '12' ); ?>
        <?php if( $recent_yachts ) : ?>
        <!-- Yachts -->
        <div class="results">
            <?php foreach( $recent_yachts as $yacht ) :?>
            <!-- Item -->
            <figure class="one-fourth item">
                <img src="<?php echo $yacht['primary_image']; ?>" alt="<?php echo $yacht['name']; ?>" />
                <figcaption>
                    <dl>
                        <dt><?php echo $yacht['name']; ?></dt>
                        <dd><span class="icojam_calendar"></span> <?php echo $yacht['built']; ?></dd>
                        <dd><span class="icojam_ruler"></span> <?php echo $yacht['length']; ?></dd>
                    </dl>
                    <div class="price">Price <strong>$<?php echo $yacht['price']; ?></strong></div>
                    <a href="<?php echo $yacht['url']; ?>" title="Read More" class="button small gold">Read More</a>
                </figcaption>
            </figure>
            <!-- //Item -->
            <?php endforeach; ?>
        </div>
        <!-- //Yachts -->
        <?php endif; ?>
    <?php endif; ?>
</main>
<!-- //Main -->
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery("#lightSliderPosts").lightSlider({
            item:1,
            keyPress:true,
            gallery:false,
            pager:false,
            prevHtml: 'PREVIOUS',
            nextHtml: 'NEXT'
        });

        jQuery("#lightSliderDeals").lightSlider({
            item:1,
            keyPress:true,
            gallery:false,
            pager:false,
            prevHtml: 'PREVIOUS',
            nextHtml: 'NEXT'
        });

        new WOW().init();
    });
</script>
<?php get_sidebar(); ?>
<?php get_footer(); ?>