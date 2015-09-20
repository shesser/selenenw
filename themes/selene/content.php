<!-- Item -->
<article id="post-<?php the_ID(); ?>" <?php post_class( array( 'one-half', 'hentry' ) ); ?>>
    <?php selenenw_post_thumbnail(); ?>
    <div>
        <div class="text">
            <?php the_title( sprintf( '<h3><a href="%s">', esc_url( get_permalink() ) ), '</a></h3>' );?>
            <div class="meta">
                <span>By <a href="#"><?php the_author(); ?></a></span>
                <span><?php the_date( 'M jS, Y' ); ?></span>
                <span><a href="<?php echo the_permalink(); ?>#comments"><?php echo get_comments_number(); ?> <?php comments_number('Comment', 'Comment', 'Comments'); ?></a></span>
            </div>
            <?php the_excerpt(); ?>
            <a href="<?php echo the_permalink(); ?>" class="more" title="Read more">Read more</a>
        </div>
    </div>
</article>
<!-- //Item -->