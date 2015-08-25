<?php get_header(); ?>
<main class="main" role="main">
    <!-- Content -->
    <div class="content static">
        <!-- Wrapper -->
        <div class="wrap">
            <div class="row">
                <!-- ThreeFourth -->
                <div class="three-fourth hentry">
                    <?php while ( have_posts() ) : the_post(); ?>
                    <!-- Post Image -->
                    <?php selenenw_post_thumbnail(); ?>
                    <!-- //Post Image -->

                    <!-- Post Content -->
                    <div class="entry-content">
                        <div class="box-white">
                            <h2><?php the_title(); ?></h2>
                            <div class="meta">
                                <span>By <a href="#"><?php the_author(); ?></a></span>
                                <span><?php the_date( 'M jS, Y' ); ?></span>
                                <span>Categories: <?php the_category(', '); ?></span>
                                <span><a href="<?php echo the_permalink(); ?>#comments"><?php echo get_comments_number(); ?> <?php comments_number('Comment', 'Comment', 'Comments'); ?></a></span>
                            </div>
                            <?php the_content(); ?>
                        </div>
                        <?php endwhile; ?>

                        <div class="box-white">
                            <div class="avatar left-pic">
                                <a href="#"><img src="<?php echo get_avatar_url( get_the_author_meta('email'), array( 'size' => 160 ) ); ?>" alt="avatar" width="160" /></a>
                            </div>
                            <h6>About the author</h6>
                            <?php the_author_meta('description'); ?>
                        </div>
                    </div>
                    <!-- //Post Content -->

                    <!-- Comments -->
                    <!--<div class="comments box-white" id="comments">
                        <h6>Comments</h6>
                        <ul>
                            <li class="comment">
                                <div class="avatar left-pic"><a href="#"><img src="http://placehold.it/160x160" alt="avatar" width="80" /></a></div>
                                <div class="comment-author"><a href="#">Kimberly C.</a> said 1 month ago</div>
                                <div class="comment-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci.</div>
                            </li>
                            <li class="comment">
                                <div class="avatar left-pic"><a href="#"><img src="http://placehold.it/160x160" alt="avatar" width="80" /></a></div>
                                <div class="comment-author"><a href="#">Kimberly C.</a> said 1 month ago</div>
                                <div class="comment-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci.</div>
                            </li>
                        </ul>
                        <h6>Leave a reply</h6>
                        <form>
                            <fieldset>
                                <div class="one-half">
                                    <label for="name">Your name</label>
                                    <input type="text" id="name"/>
                                </div>

                                <div class="one-half">
                                    <label for="email">Your e-mail</label>
                                    <input type="email" id="email"/>
                                </div>

                                <div class="full-width">
                                    <label>Your comment</label>
                                    <textarea></textarea>
                                </div>

                                <div class="full-width">
                                    <a href="#" title="Submit comment" class="button gold large">Submit comment</a>
                                </div>
                            </fieldset>
                        </form>
                    </div>-->
                    <!-- //Comments -->

                    <div class="pager box-white">
                        <?php previous_post_link( '%link', '<span class="icojam_symbol_backward"></span> PREVIOUS POST' ); ?>
                        <?php next_post_link('%link', 'NEXT POST <span class="icojam_symbol_foward"></span>'); ?>
                    </div>
                </div>
                <!-- //ThreeFourth -->

                <!-- OneFourth -->
                <aside class="one-fourth sidebar sidebar-right">
                    <div class="widget">
                        <h3>Search the blog</h3>
                        <div class="search">
                            <input type="search" id="search" placeholder="Enter your search term" />
                            <a href="#" class="searchsubmit" title="Search"><span class="icojam_search"></span></a>
                        </div>
                    </div>

                    <div class="widget">
                        <h3>Categories</h3>
                        <ul class="nobullet">
                            <li><a href="#" title="Events">Events</a></li>
                            <li><a href="#" title="Luxury yachts">Luxury yachts</a></li>
                            <li><a href="#" title="Charter yachts">Charter yachts</a></li>
                            <li><a href="#" title="Sales">Sales</a></li>
                            <li><a href="#" title="Management">Management</a></li>
                        </ul>
                    </div>

                    <div class="widget">
                        <h3>Latest posts</h3>
                        <ul class="latest-posts">
                            <li>
                                <a href="#">
                                    <img src="http://placehold.it/800x600" alt="" width="90" />
                                    <h4>Lorem ipsum dolor Sit amet</h4>
                                    <span class="date">June 13, 2014</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="http://placehold.it/800x600" alt="" width="90" />
                                    <h4>Lorem ipsum dolor Sit amet</h4>
                                    <span class="date">June 13, 2014</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="http://placehold.it/800x600" alt="" width="90" />
                                    <h4>Lorem ipsum dolor Sit amet</h4>
                                    <span class="date">June 13, 2014</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="http://placehold.it/800x600" alt="" width="90" />
                                    <h4>Lorem ipsum dolor Sit amet</h4>
                                    <span class="date">June 13, 2014</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img src="http://placehold.it/800x600" alt="" width="90" />
                                    <h4>Lorem ipsum dolor Sit amet</h4>
                                    <span class="date">June 13, 2014</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="widget">
                        <h3>A text widget</h3>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation  commodo Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed </p>
                    </div>

                    <div class="widget">
                        <h3>Find us on Facebook</h3>
                        <div class="fb-like-box" data-href="https://www.facebook.com/themeenergy" data-width="270" data-height="300" data-colorscheme="light" data-show-faces="true" data-header="false" data-stream="false" data-show-border="false"></div>
                    </div>

                    <div class="widget">
                        <h3>Advertisment</h3>
                        <p><a href="#"><img src="http://placehold.it/300x300" alt="" /></a></p>
                    </div>
                </aside>
                <!-- //OneFourth -->
            </div>
        </div>
        <!-- //Wrapper -->
    </div>
    <!-- //Content-->
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
