
    <div id="portfolio-item-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php 
        if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
            return;
        }

        if ( is_singular( 'portfolios' ) ) :
            ?>
            <header class="entry-header">
                <div class="entry-title">
                    <?php the_title(); ?>
                </div>
                <div class="entry-meta">
                    <?php
                        assignment_theme_posted_by();
                        assignment_theme_posted_on();
                    ?>
                    <span class="comments">
                        <?php echo get_comments_number(); ?> comments 
                    </span> 
                </div><!-- .entry-meta -->
                <hr class="bar"/>
            </header>
            
            <div class="post-thumbnail">
                <?php the_post_thumbnail(); ?>
            </div>
            <div class="entry-content">
                <?php the_content(); ?>
            </div>
            <?php
                wp_link_pages( array(
                    'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'assignment-theme' ),
                    'after'  => '</div>',
                ) );
            ?>
        <?php 
        else: 
        ?>
            <div class="view-image">
                <span class="dashicons dashicons-images-alt">
                </span> 
                <span>View image</span>
            </div>
            <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                <?php the_post_thumbnail(); ?>
            </a>

            <div class="post-title">
                <a aria-hidden="true" href="<?php the_permalink(); ?>" tabindex="-1">
                    <?php the_title(); ?>
                </a>
            </div>

        <?php
        endif;
    ?>
    </div><!-- #post-<?php the_ID(); ?> -->