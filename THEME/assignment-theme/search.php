<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package assignment-theme
 */

get_header();
?>

<section id="search-wrapper" class="content-area container">
	<div class="row">
		<div class="col-md-8">
			<main id="main" class="site-main">
				<?php if ( have_posts() ) : ?>
				<header class="page-header">
					<h1 class="page-title">
						<?php
						/* translators: %s: search query. */
						printf( esc_html__( 'Search Results for: %s', 'assignment-theme' ), '<span>' . get_search_query() . '</span>' );
						?>
					</h1>
					<hr class="bar">
				</header><!-- .page-header -->
				<?php
				/* Start the Loop */
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
		</div><!-- col-md-8 -->

		<div class="col-md-4">
			<?php get_sidebar(); ?>
		</div><!-- col-md-4 -->
		
	</div><!-- row -->
</section><!-- #primary -->

<?php
get_footer();
