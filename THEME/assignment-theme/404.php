<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package assignment-theme
 */

get_header();
?>

<div id="not-found-wrapper" class="content-area container">
	<main id="primary" class="site-main">
		<div class="row">
		<div class="col-md-8">
			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title">
						<?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'assignment-theme' ); ?>	
					</h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p>
						<?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'assignment-theme' ); ?>
					</p>
						<?php
						get_search_form();

						?>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->
		</div><!-- .col-md-8 -->

		<div class="col-md-4">
			<?php get_sidebar(); ?>
		</div><!-- .col-md-4 -->
	</div>
	</main><!-- #main -->
</div><!-- #not-found-wrapper -->

<?php
get_footer();
