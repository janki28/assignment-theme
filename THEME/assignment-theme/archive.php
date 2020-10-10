<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package assignment-theme
 */

get_header();
?>

<div id="archive-wrapper" class="content-area container">
		<div class="row">
			<div class="col-md-8">
				<main id="main" class="site-main">
					<?php if ( have_posts() ) : ?>
						<header class="page-header">
							<?php
								the_archive_title( '<h1 class="page-title">', '</h1>' );
								the_archive_description( '<div class="archive-description">', '</div>' );
							?>
							<hr class="bar">
						</header><!-- .page-header -->

						<?php
						  
                		while ( have_posts() ) :
                    		the_post(); 

							get_template_part( 'template-parts/content', 'blog-template' );

						endwhile;

						the_posts_navigation();

					else :

					get_template_part( 'template-parts/content', 'none' );

					endif;
					?>
				</main><!-- #main -->
			</div><!-- .col-md-8 -->

			<div class="col-md-4">
				<?php get_sidebar(); ?>

         <!-- Archive widget -->
            <aside id="secondary" class="widget-area">
                <section class="widget widget_archive">
                    <h2 class="widget-title">
                        <?php _e('Archive', 'shape'); ?>
                    </h2>
                    <ul>    
                        <?php  wp_get_archives( 
                        	array( 'type' => 'monthly' ) ); ?>
                    </ul>
                </section>
            </aside><!-- #secondary -->
			</div><!-- .col-md-4 -->

		</div><!-- .row -->
</div><!-- #archive-wrapper -->
<?php
get_footer();