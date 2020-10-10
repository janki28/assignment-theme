<?php
    /*

    Template Name: Homepage
    This template displays homepage.
    
    */

get_header();
?>

    <div id="primary" class="content-area container">
        <main id="main" class="site-main row">

        <?php
        $args = array(
            'post_type'      => 'portfolios', 
            'posts_per_page' => '6',
        );
        $query = new WP_Query( $args );

        ?>
        
        <div id="homepage-wrapper"><!-- title & button -->
                <div class="homepage-wrapper-top">
                    <p class="title"> 
                        <?php echo esc_html( get_theme_mod( 'homepage-title', 'd\'sign is the soul' ) ); ?> 
                    </p>
                    <a href="<?php echo get_site_url() . '/portfolio' ?>" id="portfolio-view-all">
                        <?php esc_html_e( 'view all', 'assignment-theme' ); ?>
                    </a>
                    <hr class="bar"/>
                </div>
        <?php
        if ( $query -> have_posts() ):

                while ( $query -> have_posts() ):
                    $query -> the_post();
                    get_template_part( 'template-parts/content', 'portfolios' );  
                endwhile;
                ?>
            </div>

        <?php
        else:
        ?>
        <div class="container">
            <p>
                <?php esc_html_e( 'No Portfolio found! Please add some portfolio items in Portfolio.', 'assignment-theme' ); ?>
            </p>
        </div>
    <?php 
        endif;
    ?>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php
get_footer();
?>