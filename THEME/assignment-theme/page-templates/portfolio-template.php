<?php
/**
 * Template Name: Portfolio Page
 *
 * The template for displaying portfolio
 *
 * This is the template that displays all portfolio items.
 * 
 */

 get_header();

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$query = new WP_Query( array( 
	'post_type' => 'portfolios',
	'posts_per_page' => 15,
	'paged'          => $paged 
	)
 );

 if ( $query -> have_posts() ):
	?>

	<div id="view-image-container">
		<div class="content-wrapper">
				<img src="" />
				<span class="close">
					<span class="dashicons dashicons-no-alt"></span>
				</span>
		</div>
	</div>

    <div id="portfolio-wrapper">

		<!-- top bar -->
		<div class="portfolio-wrapper-top">
			<p class="title"> 
				<?php echo esc_html( get_theme_mod( 'portfolio-title', 'design is the soul' ) ); ?> 
			</p>
			<span class="feature-button">
				<a href=" <?php echo get_permalink( get_theme_mod( 'portfolio-feature-btn', '#' ) ); ?>" id="feature-title-1">
	                <?php echo esc_html( get_theme_mod( 'feature-title-1' ) ); ?> 
	            </a>
	            <a href=" <?php echo get_permalink( get_theme_mod( 'portfolio-feature-btn', '#' ) ); ?>" id="feature-title-2">
	                <?php echo esc_html( get_theme_mod( 'feature-title-2' ) ); ?> 
	            </a>
	            <a href=" <?php echo get_permalink( get_theme_mod( 'portfolio-feature-btn', '#' ) ); ?>" id="feature-title-3">
	                <?php echo esc_html( get_theme_mod( 'feature-title-3' ) ); ?> 
	            </a>
        	</span>
        	<hr />
		</div>
	
	<?php
    while ( $query -> have_posts() ):
        $query -> the_post();
    	get_template_part( 'template-parts/content', 'portfolios' );  
	endwhile;
	?>
	</div> <!-- #portfolio-wrapper -->
	
	<?php
		custom_pagination_bar( $query );
	?>
	</div>

	<?php
else:
    ?>
    <p>
		<?php _e( 'Sorry, no portfolio items found.', 'assignment-theme' ); ?>
	</p>
    <?php
endif;
?>

<?php
get_footer();
?>