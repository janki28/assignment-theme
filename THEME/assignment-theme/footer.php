<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package assignment-theme
 */

?>
	<footer id="footer-wrapper" class="site-footer">
		<div class="content container">
			<hr class="bar" />
				<div class="row">
					<div class="info col-sm-6">
							<?php 
								$catquery = new WP_Query( array('posts_per_page' => '1',
									'category_name' => 'welcome',
								 ));
							?>
							<?php 
							while ($catquery->have_posts()) : $catquery->the_post(); ?>
							<p class="title">
								<a href="<?php echo get_the_permalink() ?>">
									<?php echo get_the_title(); ?>
								</a>
							</p>
							<p class="intro-content">
								<?php echo get_the_excerpt(); ?> 
							</p>
							<?php	
							endwhile;
							wp_reset_postdata();
							?>	
					</div><!-- info -->
					
					<div class="contact col-sm-6">
						<!-- contact us -->
						<p class="title">
							<?php 
								$current_user = wp_get_current_user();
								$current_user->user_login;
							?>
							<a href="<?php echo get_site_url() . '/author/' . $current_user->user_login ?>"> <?php esc_html_e( 'Contact Us' ); ?></a>
						</p>
						<p class="contact-us">
						<p class="address"> 
							<?php echo get_theme_mod('footer-address')  ?> 
						</p>
						<p class="address"> 
							<?php echo get_theme_mod('footer-phone')  ?> 
						</p>
						<p class="email">
							<?php esc_html_e( 'Email', 'designfly' ); ?>: 
							<a href="mailto:<?php echo get_theme_mod( 'footer-email' ); ?>">
								<?php echo get_theme_mod( 'footer-email' ); ?>
							</a>
						</p> 
					</p>
						<ul class="social-media">
							<?php
								$links = get_theme_mod('footer-social-link');
								$links = explode(';', $links);
							foreach ( $links as $link ) :
								$link = trim( $link );
							if ( strpos( $link, 'facebook.com' ) !== false ) 
							{ ?>
								<li>
									<a target="_blank" href="<?php echo $link; ?>">
										<img id="facebook" src=" <?php echo get_template_directory_uri() . '/assets/image/social_media/facebook.png' ?>" />
									</a>
								</li>
							<?php
							} 
							elseif ( strpos( $link, 'in.pinterest.com' ) !== false ) 
							{ ?>
								<li>
									<a target="_blank" href="<?php echo $link; ?>">
										<img id="pinterest" src=" <?php echo get_template_directory_uri() . '/assets/image/social_media/pinterest.png' ?> " />
									</a>
								</li>
							<?php
							} 
							elseif ( strpos( $link, 'linkedin.com' ) !== false ) 
							{ ?>
								<li>
									<a target="_blank" href="<?php echo $link; ?>">
										<img id="linkedin" src=" <?php echo get_template_directory_uri() . '/assets/image/social_media/linkedin.png' ?> " />
									</a>
								</li>
							<?php
							} 
							elseif ( strpos( $link, 'twitter.com' ) !== false ) 
							{ ?>
								<li>
									<a target="_blank" href="<?php echo $link; ?>">
										<img id="twitter" src=" <?php echo get_template_directory_uri() . '/assets/image/social_media/twitter.png' ?> " />
									</a>
								</li>
							  
							<?php
							}
							endforeach;
							?>
						</ul>
					</div><!-- info -->
					
				</div><!-- row -->
			<hr class="bar" />
		</div>
		<div class="site-info container">
			<p>
					<?php
						echo esc_html__( "© 2012 - D'SIGNfly", 'assignment-theme' );
					?>
				<span class="sep"> | </span>
					<?php
						echo esc_html__( 'Designed by', 'assignment-theme' ); 
					?>
					<a href="http://rtcamp.com/">rtCamp</a> 
				<span class="sep"> | </span>
					<?php
						echo esc_html__( 'Redone by', 'assignment-theme' ); 
					?>
					<a href="https://janki1028.wordpress.com/">Janki</a> 
			</p>
		</div><!-- .site-info -->
	</footer><!-- #footer-wrapper -->
</div><!-- #page -->

<?php wp_footer(); ?>

<!-- twitter post -->
	<script type="text/javascript" src="http://twitter.com/javascripts/blogger.js"></script>
	<script type="text/javascript" src="http://twitter.com/statuses/user_timeline/USERNAME.json?callbacl=twitterCallback2&count3"></script>
</body>
</html>
