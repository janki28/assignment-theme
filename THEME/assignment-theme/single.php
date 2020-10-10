<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package assignment-theme
 */

get_header();
?>

<div id="single-post-wrapper" class="container">
	<div class="row">
		<div class="col-md-8">
			<div id="primary" class="content-area">
				<main id="main" class="site-main">

					<?php
						while ( have_posts() ) :
							the_post();

							set_post_views(get_the_ID());

							get_template_part( 'template-parts/content', get_post_type() );

							if ( comments_open() || get_comments_number() ) :
					?>
							<div class="comments-wrapper">
								<p class="bars">
									<?php esc_html_e( 'Comments', 'assignment-theme' ); ?>	
								</p>
								<?php comments_template(); ?>
							</div>

							<?php
							endif;
						endwhile; // End of the loop.
						?>
				</main><!-- #main -->
			</div><!-- #primary -->
		</div><!-- .col-md-8 -->

		<div class="col-md-4">
			<?php get_sidebar(); ?>

			<!-- Related Post widget -->
            <aside id="secondary" class="widget-area">
                <section class="widget widget_recent_entries">
                    <h2 class="widget-title">
                        <?php _e('Related Posts', 'shape'); ?>
                    </h2>
                    <ul>
	                	<?php
	                    // Default arguments
	                    $args = array(
	                        'posts_per_page' => 5, // How many items to display
	                        'post__not_in'   => array( get_the_ID() ), // Exclude current post
	                        'no_found_rows'  => true, // We don't ned pagination so this speeds up the query
	                    );

	                    // Check for current post category and add tax_query to the query arguments
	                    $cats = wp_get_post_terms( get_the_ID(), 'category' ); 

	                    $cats_ids = array();  
	                    foreach( $cats as $wpex_related_cat ) {
	                        $cats_ids[] = $wpex_related_cat->term_id; 
	                    }
	                    if ( ! empty( $cats_ids ) ) {
	                        $args['category__in'] = $cats_ids;
	                    }
	                    
	                    // Query posts
	                    $wpex_query = new wp_query( $args );

	                    // Loop through posts
	                    foreach( $wpex_query->posts as $post ) : setup_postdata( $post ); ?>
	                        <li>
	                            <div class="row content">
	                                <div class="thumbnail">
	                                    <?php assignment_theme_post_thumbnail(); ?>
	                                </div>
	                                <div class="col posttitle">
	                                    <span class="para">
	                                         <a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a>
	                                       
	                                    </span>
	                                    <div class="author-bar">
	                                        <span class="author">
	                                        by 
	                                            <a href="<?php get_the_author_link(); ?>">
	                                            <?php echo get_author_name(); ?>
	                                            </a>
	                                        on 
	                                            <?php echo get_the_date( 'd M Y'); ?>
	                                        </span>
	                                    </div> 
	                                </div>
	                            </div>
	                        </li>
	                       <?php
	                    // End loop
	                    endforeach;

	                    // Reset post data
	                    wp_reset_postdata(); ?>
            		</ul>
                </section>
            </aside>

			<!-- Recent Post widget -->
            <aside id="secondary" class="widget-area">
                <section class="widget widget_recent_entries">
                    <h2 class="widget-title">
                        <?php _e('Recent Posts', 'shape'); ?>
                    </h2>
                    <ul>
                	<?php
                    	$recentpost = new WP_Query(array(  'posts_per_page' => 5 ));
                    	while ( $recentpost -> have_posts() ): $recentpost -> the_post();
                	?>
                		<li>
                    		<div class="row content">
                    			<div class="thumbnail">
                    				<?php assignment_theme_post_thumbnail(); ?>
                    			</div>
                    			<div class="col posttitle">
                    				<span class="para">
                    					<a href="<?php the_permalink() ?>">
                        					<?php the_title();
                                             ?>
                    					</a>
                    				</span>
                    				<div class="author-bar">
                    					<span class="author">
                    					by 
                        					<a href="<?php get_the_author_link(); ?>">
                        					<?php echo get_author_name(); ?>
                        					</a>
                        				on 
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
            <!-- Popular Post widget -->
            <aside id="secondary" class="widget-area">
                <section class="widget widget_recent_entries">
                    <h2 class="widget-title">
                        <?php _e('Popular Posts', 'shape'); ?>
                    </h2>
                    <ul>
                	<?php
                    	$popularpost = new WP_Query( 
                    		array('posts_per_page' => 5,
                    		'meta_key' => 'post_view_count',
                    		'orderby' => 'meta_value_num',
                    		'order' => 'DESC' 
                    	) );
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
	                    				<span class="author">
	                    				by 
	                        				<a href="<?php get_the_author_link(); ?>">
	                        				<?php echo get_author_name(); ?>
	                        				</a>
	                        			on 
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
                        <?php  wp_get_archives( 
                        	array( 'type' => 'monthly' ) ); ?>
                    </ul>
                </section>
            </aside><!-- #secondary -->
            
		</div><!-- .col-md-4 -->
	</div><!-- .row -->
</div><!-- #single-post-wrapper -->

<?php
get_footer();
