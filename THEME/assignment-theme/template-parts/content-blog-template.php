<?php
/**
 * Template part for displaying series of blogs 
 *
 * @package assignment-theme
 */
?>
<div id="blog-wrapper">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <a href=" <?php echo get_post_permalink(); ?> " class="permalink">
            <header class="entry-header">
                <div class="date">
                    <span>
                        <?php echo get_the_date( 'd' ); ?>     
                    </span>
                    <span>
                        <?php echo get_the_date( 'M' ); ?>
                    </span>
                </div>
                <?php the_title( '<p class="entry-title">', '</p>' ); ?>
            </header><!-- .entry-header -->
        </a><!-- .permalink -->

        <?php
        if ( has_post_thumbnail() ) : 
        ?>
        <div class="row content">
             <div class="col-xs-12 col-sm-5 thumbnail">
                <?php assignment_theme_post_thumbnail(); ?>
            </div> 
            <div class="col-xs-12 col-sm-7 para">
                <div class="author-bar">
                    <p class="author"> by 
                        <a href="<?php get_the_author_link(); ?>">
                        <?php echo get_author_name(); ?>
                        </a> on 
                        <?php echo get_the_date( 'd M Y'); ?>
                    </p>
                    <p class="comments">
                        <?php echo get_comments_number(); ?> comments 
                    </p> 
                </div>
                <hr class="bar">
                <div class="entry-content">
                    <?php the_excerpt(); ?>
                </div><!-- .entry-content -->
            </div><!-- .para -->
        </div><!-- .row -->
        <?php
        else : 
        ?>
        <div class="content">
            <div class="para">
                <div class="author-bar">
                    <p class="author"> by 
                        <a href="<?php get_the_author_link(); ?>">
                        <?php echo get_author_name(); ?>
                        </a> on 
                        <?php echo get_the_date( 'd M Y'); ?>
                    </p>
                    <p class="comments">
                        <?php echo get_comments_number(); ?> comments 
                    </p> 
                </div><!-- .author-bar -->
                <hr class="bar">
                <div class="entry-content">
                    <?php
                        the_excerpt();

                        wp_link_pages( array(
                        'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'assignment-theme' ),
                        'after'  => '</div>',
                    ) );
                    ?>
                </div><!-- .entry-content -->
            </div><!-- .para -->
        </div><!-- .content -->

        <?php
        endif;
        ?>      
    </article><!-- #post-<?php the_ID(); ?> -->
</div><!-- #blog-wrapper -->
