<?php
/**
 * The template for displaying author archive page
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
						<header class="page-header">
							<?php
								the_archive_title( '<h1 class="page-title">', '</h1>' );
							?>
							<hr class="bar">

						</header><!-- .page-header -->

						<?php
						$curauth = (isset($_GET['authorname'])) ? 
						get_user_by('author', $authorname) : 
						get_userdata(intval($author));
						?>
						<div class="row author-content">
             				<div class="col-xs-12 col-sm-4 author-photo">
                				<img src="<?php echo wp_get_attachment_url( get_theme_mod( 'author-image' ) ); ?> " id="author-image" />
            				</div><!-- .author-content --> 
            				<div class="col-xs-12 col-sm-8 author-intro">
								<h2>
									<?php echo esc_html( get_theme_mod( 'author-welcome-line' ) ); ?> 
								</h2>
               					<p>
               						<?php echo esc_html( get_theme_mod( 'author-welcome-para' ) ); ?>
               					</p>
            				</div><!-- .author-intro -->
        				</div><!-- .row -->
         				<hr class="bar">
        				<div class="author-details">
							<?php //bio 
								echo $curauth->user_description;

							?>
						</div>
        				<div class="author-posts">
							Posts by <?php echo $curauth->nickname   ;
							?>
        				</div>
					
						<?php
						    $authorpost = new WP_Query( 
                    		array(
                    		'posts_per_page' => 3,
 
                    	) );
   		                if ( have_posts() ) :

                    	while ( $authorpost -> have_posts() ): $authorpost -> the_post();
                		
							get_template_part( 'template-parts/content', 'blog-template' );

						endwhile;

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