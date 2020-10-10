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
						global $book_options;
		                $posts_per_page = $book_options['page']; 

		                $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : '1';
		                $args = array(
		                    'post_type'      => array( 'books' ),
		                    'posts_per_page' => $posts_per_page,
		                    'paged'          => $paged,
		                    'post_status'    => 'publish',
		                    'nopaging'       => false,    
		                );
		                $query = new WP_Query($args);

                		while ( $query -> have_posts() ) :
                    		$query -> the_post(); 

							get_template_part( 'template-parts/content', 'blog-template' );

						endwhile;

						custom_pagination_bar( $query );

					else :

					get_template_part( 'template-parts/content', 'none' );

					endif;
					?>
				</main><!-- #main -->
			</div><!-- .col-md-8 -->

			<div class="col-md-4">
				<?php get_sidebar(); ?>
			</div><!-- .col-md-4 -->

		</div><!-- .row -->
</div><!-- #archive-wrapper -->
<?php
get_footer();