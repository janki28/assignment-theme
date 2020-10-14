<?php
/*
  Template Name: Blogpage
  This is the template that displays all portfolio items.
*/
 get_header();
?>

<div id="blog-template" class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="header">
                <p>Let's Blog</p>
                <hr class="bar" />
            </div>
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
                    <?php
                $posts_per_page = get_option( 'posts_per_page' ); 

                $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : '1';
                $args = array(
                    'post_type'      => array( 'post', 'portfolios' ),
                    'posts_per_page' => $posts_per_page,
                    'paged'          => $paged,
                    'post_status'    => 'publish',
                    'nopaging'       => false,    
                );
                $query = new WP_Query($args);

                while ( $query -> have_posts() ) :
                    $query -> the_post(); 
                
                    get_template_part( 'template-parts/content', 'blog-template' );
    
                endwhile; // End of the loop.
                ?>
                <!-- pagination -->

                <?php custom_pagination_bar( $query ); ?>
    
                </main><!-- #main -->
            </div><!-- #primary -->
        </div><!-- .col-md-8 -->

        <div class="col-md-4">
            <?php get_sidebar(); ?>

            <!-- Popular Post widget -->
            <aside id="secondary" class="widget-area">
                <section class="widget widget_recent_entries">
                    <h2 class="widget-title">
                        <?php _e('Popular Posts', 'shape'); ?>
                    </h2>
                    <ul>
                        <?php
                            $popularpost = new WP_Query( array('posts_per_page' => 5, 'meta_key' => 'post_view_count', 'orderby' => 'meta_value_num', 'order' => 'DESC' ) );
                            while ( $popularpost -> have_posts() ): $popularpost -> the_post();
                        ?>
                        <li>
                            <div class="row content">
                                <div class="thumbnail">
                                    <?php assignment_theme_post_thumbnail(); ?>
                                </div>
                                <div class="col posttitle">
                                    <span class="para">
                                        <a href="<?php the_permalink() ?>">
                                            <?php the_title(); ?>
                                        </a>
                                    </span>
                                    <div class="author-bar">
                                        <span class="author">by 
                                            <a href="<?php get_the_author_link(); ?>">
                                                <?php echo get_the_author_meta('display_name'); ?>
                                            </a> on 
                                            <?php echo get_the_date( 'd M Y'); ?>
                                        </span>
                                    </div> 
                                </div>
                            </div>
                        </li>
                        <?php 
                        endwhile;
                        wp_reset_postdata(); 
                        ?>
                    </ul>
                </section>
            </aside>
            
        <!-- Archive widget -->
            <aside id="secondary" class="widget-area">
                <section class="widget widget_archive">
                    <h2 class="widget-title">
                        <?php _e('Archive', 'shape'); ?>
                    </h2>
                    <ul>    
                        <?php  wp_get_archives( array( 'type' => 'monthly' ) ); ?>
                    </ul>
                </section>
            </aside><!-- #secondary -->

        <!-- Latest Tweet widget -->
            <aside id="secondary" class="widget-area">
                <section>
                    <h2 class="widget-title">
                        <?php _e('Latest Tweet', 'shape'); ?>
                    </h2>
                    <ul id="twitter_update_list">
                        <li>
                            <span>
                                
                            </span>
                        </li>
                    </ul>
                </section>
            </aside>
        </div><!-- .col-md-4 -->
    </div><!-- .row -->
</div> <!-- #blog-template -->


<?php
    get_footer();
?>

