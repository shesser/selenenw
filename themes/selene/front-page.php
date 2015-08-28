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

    <!-- Deals -->
    <section class="content boxed grid2 noarrow">
        <ul id="lightSliderDeals">
            <li>
                <!-- Item -->
                <article class="full-width hentry">
                    <figure class="one-half heightfix"><a href="yacht-single.html"><img src="http://placehold.it/800x600" alt="deal" /></a></figure>
                    <div class="one-half heightfix">
                        <header>Our Exclusive Deals</header>
                        <div class="text">
                            <h3><a href="yacht-single.html">Elan 1923 Impression</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam aliquip ex ea commodoerat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo. Aenean commodo ligula eget dolor. Aenean massa.</p>

                            <div class="details">
                                <div>
                                    <span class="icojam_location_1"></span>
                                    <p>Base: Marina Kastela</p>
                                </div>
                                <div>
                                    <span class="icojam_friends"></span>
                                    <p>Berths: 10 (8+2)</p>
                                </div>
                                <div class="price">$ 5300,00</div>
                                <div><a href="yacht-single.html" title="Book now" class="button gold full medium solid">Book now</a> </div>
                            </div>
                        </div>
                    </div>
                </article>
                <!-- //Item -->
            </li>
            <li>
                <!-- Item -->
                <article class="full-width hentry">
                    <figure class="one-half heightfix"><a href="yacht-single.html"><img src="http://placehold.it/800x600" alt="deal" /></a></figure>
                    <div class="one-half heightfix">
                        <header>Our Exclusive Deals</header>
                        <div class="text">
                            <h3><a href="yacht-single.html">Elan 1923 Impression</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam aliquip ex ea commodoerat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo. Aenean commodo ligula eget dolor. Aenean massa.</p>

                            <div class="details">
                                <div>
                                    <span class="icojam_location_1"></span>
                                    <p>Base: Marina Kaštela</p>
                                </div>
                                <div>
                                    <span class="icojam_friends"></span>
                                    <p>Berths: 10 (8+2)</p>
                                </div>
                                <div class="price">$ 5300,00</div>
                                <div><a href="yacht-single.html" title="Book now" class="button gold full medium solid">Book now</a> </div>
                            </div>
                        </div>
                    </div>
                </article>
                <!-- //Item -->
            </li>
            <li>
                <!-- Item -->
                <article class="full-width hentry">
                    <figure class="one-half heightfix"><a href="yacht-single.html"><img src="http://placehold.it/800x600" alt="deal" /></a></figure>
                    <div class="one-half heightfix">
                        <header>Our Exclusive Deals</header>
                        <div class="text">
                            <h3><a href="yacht-single.html">Elan 1923 Impression</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam aliquip ex ea commodoerat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo. Aenean commodo ligula eget dolor. Aenean massa.</p>

                            <div class="details">
                                <div>
                                    <span class="icojam_location_1"></span>
                                    <p>Base: Marina Kaštela</p>
                                </div>
                                <div>
                                    <span class="icojam_friends"></span>
                                    <p>Berths: 10 (8+2)</p>
                                </div>
                                <div class="price">$ 5300,00</div>
                                <div><a href="yacht-single.html" title="Book now" class="button gold full medium solid">Book now</a> </div>
                            </div>
                        </div>
                    </div>
                </article>
                <!-- //Item -->
            </li>
        </ul>
    </section>
    <!-- //Deals -->

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

    <!-- Blog posts -->
    <section class="content boxed grid2">
        <ul id="lightSliderPosts">
            <li>
                <!-- Item -->
                <article class="full-width hentry">
                    <figure class="one-half heightfix"><a href="blog-single.html"><img src="http://placehold.it/800x600" alt="post" /></a></figure>
                    <div class="one-half heightfix">
                        <div class="text">
                            <h3><a href="blog-single.html">Win an All Inclusive Sailing Holiday in Mediterranean!</a></h3>
                            <div class="meta">
                                <span>By <a href="#">admin</a></span>
                                <span>May 23rd, 2015</span>
                                <span><a href="blog-single.html#comments">2 Comments</a></span>
                            </div>
                            <p>This year’s Taiwan International Boat Show was a huge success. Taken place from May 8 to 11, the event was attended by more than 70,000 visitors. With NT$1Bn in orders already placed for 32 yachts, this month’s Taiwan Int Boat Show has sailed away with all round acclaim, when it closed its doors on May 11.</p>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in </p>
                            <a href="blog-single.html" class="button small gold" title="Read more">Read more</a>
                        </div>
                    </div>
                </article>
                <!-- //Item -->
            </li>
            <li>
                <!-- Item -->
                <article class="full-width hentry">
                    <figure class="one-half heightfix"><a href="blog-single.html"><img src="http://placehold.it/800x600" alt="post" /></a></figure>
                    <div class="one-half heightfix">
                        <div class="text">
                            <h3><a href="blog-single.html">Luxury Heart of Gold joins<br />our charter fleet</a></h3>
                            <div class="meta">
                                <span>By <a href="#">admin</a></span>
                                <span>May 23rd, 2015</span>
                                <span><a href="blog-single.html#comments">2 Comments</a></span>
                            </div>
                            <p>This year’s Taiwan International Boat Show was a huge success. Taken place from May 8 to 11, the event was attended by more than 70,000 visitors. With NT$1Bn in orders already placed for 32 yachts, this month’s Taiwan Int Boat Show has sailed away with all round acclaim, when it closed its doors on May 11.</p>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in </p>
                            <a href="blog-single.html" class="button small gold" title="Read more">Read more</a>
                        </div>
                    </div>
                </article>
                <!-- //Item -->
            </li>

            <li>
                <!-- Item -->
                <article class="full-width hentry">
                    <figure class="one-half heightfix"><a href="blog-single.html"><img src="http://placehold.it/800x600" alt="post" /></a></figure>
                    <div class="one-half heightfix">
                        <div class="text">
                            <h3><a href="blog-single.html">Sailor Awarded Outstanding Sailing School<br />and Outstanding Instructor Award</a></h3>
                            <div class="meta">
                                <span>By <a href="#">admin</a></span>
                                <span>May 23rd, 2015</span>
                                <span><a href="blog-single.html#comments">2 Comments</a></span>
                            </div>
                            <p>This year’s Taiwan International Boat Show was a huge success. Taken place from May 8 to 11, the event was attended by more than 70,000 visitors. With NT$1Bn in orders already placed for 32 yachts, this month’s Taiwan Int Boat Show has sailed away with all round acclaim, when it closed its doors on May 11.</p>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in </p>
                            <a href="blog-single.html" class="button small gold" title="Read more">Read more</a>
                        </div>
                    </div>
                </article>
                <!-- //Item -->
            </li>
        </ul>
    </section>
    <!-- //Blog posts -->

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

    <!-- Yachts -->
    <div class="results">
        <!-- Item -->
        <figure class="one-fourth item">
            <img src="http://placehold.it/800x600" alt="" />
            <figcaption>
                <dl>
                    <dt>Elan 1923 Impression</dt>
                    <dd><span class="icojam_doublebed"></span> 10 berths</dd>
                    <dd><span class="icojam_toilet_paper"></span> 2 toilets</dd>
                </dl>
                <div class="price">Price from  <strong>50.000$</strong></div>
                <a href="yacht-single.html" title="Book now" class="button small gold">Book now</a>
            </figcaption>
        </figure>
        <!-- //Item -->

        <!-- Item -->
        <figure class="one-fourth item">
            <img src="http://placehold.it/800x600" alt="" />
            <figcaption>
                <dl>
                    <dt>Elan 1923 Impression</dt>
                    <dd><span class="icojam_doublebed"></span> 10 berths</dd>
                    <dd><span class="icojam_toilet_paper"></span> 2 toilets</dd>
                </dl>
                <div class="price">Price from  <strong>50.000$</strong></div>
                <a href="yacht-single.html" title="Book now" class="button small gold">Book now</a>
            </figcaption>
        </figure>
        <!-- //Item -->

        <!-- Item -->
        <figure class="one-fourth item">
            <img src="http://placehold.it/800x600" alt="" />
            <figcaption>
                <dl>
                    <dt>Elan 1923 Impression</dt>
                    <dd><span class="icojam_doublebed"></span> 10 berths</dd>
                    <dd><span class="icojam_toilet_paper"></span> 2 toilets</dd>
                </dl>
                <div class="price">Price from  <strong>50.000$</strong></div>
                <a href="yacht-single.html" title="Book now" class="button small gold">Book now</a>
            </figcaption>
        </figure>
        <!-- //Item -->

        <!-- Item -->
        <figure class="one-fourth item">
            <img src="http://placehold.it/800x600" alt="" />
            <figcaption>
                <dl>
                    <dt>Elan 1923 Impression</dt>
                    <dd><span class="icojam_doublebed"></span> 10 berths</dd>
                    <dd><span class="icojam_toilet_paper"></span> 2 toilets</dd>
                </dl>
                <div class="price">Price from  <strong>50.000$</strong></div>
                <a href="yacht-single.html" title="Book now" class="button small gold">Book now</a>
            </figcaption>
        </figure>
        <!-- //Item -->

        <!-- Item -->
        <figure class="one-fourth item">
            <img src="http://placehold.it/800x600" alt="" />
            <figcaption>
                <dl>
                    <dt>Elan 1923 Impression</dt>
                    <dd><span class="icojam_doublebed"></span> 10 berths</dd>
                    <dd><span class="icojam_toilet_paper"></span> 2 toilets</dd>
                </dl>
                <div class="price">Price from  <strong>50.000$</strong></div>
                <a href="yacht-single.html" title="Book now" class="button small gold">Book now</a>
            </figcaption>
        </figure>
        <!-- //Item -->

        <!-- Item -->
        <figure class="one-fourth item">
            <img src="http://placehold.it/800x600" alt="" />
            <figcaption>
                <dl>
                    <dt>Elan 1923 Impression</dt>
                    <dd><span class="icojam_doublebed"></span> 10 berths</dd>
                    <dd><span class="icojam_toilet_paper"></span> 2 toilets</dd>
                </dl>
                <div class="price">Price from  <strong>50.000$</strong></div>
                <a href="yacht-single.html" title="Book now" class="button small gold">Book now</a>
            </figcaption>
        </figure>
        <!-- //Item -->

        <!-- Item -->
        <figure class="one-fourth item">
            <img src="http://placehold.it/800x600" alt="" />
            <figcaption>
                <dl>
                    <dt>Elan 1923 Impression</dt>
                    <dd><span class="icojam_doublebed"></span> 10 berths</dd>
                    <dd><span class="icojam_toilet_paper"></span> 2 toilets</dd>
                </dl>
                <div class="price">Price from  <strong>50.000$</strong></div>
                <a href="yacht-single.html" title="Book now" class="button small gold">Book now</a>
            </figcaption>
        </figure>
        <!-- //Item -->

        <!-- Item -->
        <figure class="one-fourth item">
            <img src="http://placehold.it/800x600" alt="" />
            <figcaption>
                <dl>
                    <dt>Elan 1923 Impression</dt>
                    <dd><span class="icojam_doublebed"></span> 10 berths</dd>
                    <dd><span class="icojam_toilet_paper"></span> 2 toilets</dd>
                </dl>
                <div class="price">Price from  <strong>50.000$</strong></div>
                <a href="yacht-single.html" title="Book now" class="button small gold">Book now</a>
            </figcaption>
        </figure>
        <!-- //Item -->

        <!-- Item -->
        <figure class="one-fourth item">
            <img src="http://placehold.it/800x600" alt="" />
            <figcaption>
                <dl>
                    <dt>Elan 1923 Impression</dt>
                    <dd><span class="icojam_doublebed"></span> 10 berths</dd>
                    <dd><span class="icojam_toilet_paper"></span> 2 toilets</dd>
                </dl>
                <div class="price">Price from  <strong>50.000$</strong></div>
                <a href="yacht-single.html" title="Book now" class="button small gold">Book now</a>
            </figcaption>
        </figure>
        <!-- //Item -->

        <!-- Item -->
        <figure class="one-fourth item">
            <img src="http://placehold.it/800x600" alt="" />
            <figcaption>
                <dl>
                    <dt>Elan 1923 Impression</dt>
                    <dd><span class="icojam_doublebed"></span> 10 berths</dd>
                    <dd><span class="icojam_toilet_paper"></span> 2 toilets</dd>
                </dl>
                <div class="price">Price from  <strong>50.000$</strong></div>
                <a href="yacht-single.html" title="Book now" class="button small gold">Book now</a>
            </figcaption>
        </figure>
        <!-- //Item -->

        <!-- Item -->
        <figure class="one-fourth item">
            <img src="http://placehold.it/800x600" alt="" />
            <figcaption>
                <dl>
                    <dt>Elan 1923 Impression</dt>
                    <dd><span class="icojam_doublebed"></span> 10 berths</dd>
                    <dd><span class="icojam_toilet_paper"></span> 2 toilets</dd>
                </dl>
                <div class="price">Price from  <strong>50.000$</strong></div>
                <a href="yacht-single.html" title="Book now" class="button small gold">Book now</a>
            </figcaption>
        </figure>
        <!-- //Item -->

        <!-- Item -->
        <figure class="one-fourth item">
            <img src="http://placehold.it/800x600" alt="" />
            <figcaption>
                <dl>
                    <dt>Elan 1923 Impression</dt>
                    <dd><span class="icojam_doublebed"></span> 10 berths</dd>
                    <dd><span class="icojam_toilet_paper"></span> 2 toilets</dd>
                </dl>
                <div class="price">Price from  <strong>50.000$</strong></div>
                <a href="yacht-single.html" title="Book now" class="button small gold">Book now</a>
            </figcaption>
        </figure>
        <!-- //Item -->
    </div>
    <!-- //Yachts -->
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