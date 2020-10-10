<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package assignment-theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> style="background: url( <?php echo get_template_directory_uri() . '/assets/image/rapeatable-bg.png' ?>)">
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary">
			<?php esc_html_e( 'Skip to content', 'assignment-theme' ); ?>	
		</a>

	<header id="masthead" class="site-header" style="background: url( <?php echo get_template_directory_uri() . '/assets/image/rapeatable-bg.png' ?>)">
		<div class="container">
			<nav class="navbar" id="main-navigation">
				<?php
					if(has_custom_logo() ) :
						the_custom_logo();
					else :
				?>
				<a href="<?php echo get_site_url(); ?> " >
					<img class="custom-logo" src=" <?php echo get_template_directory_uri() . '/assets/image/logo.png' ?> " alt="DFlogo" />
				</a>
				<?php endif; ?>	
			
				<ul class="navbar-nav mr-auto">
				<?php
					wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
						'menu_class'     => 'nav-menu',
						)
					);
				?>
				</ul>
				<form class="form-inline my-2 my-lg-0" action="<?php echo home_url( '/' ); ?>" method="get">
					<input class="search-text-box" type="text" name="search" id="search" value="<?php the_search_query(); ?>" />
					<input id="header-search-button" type="image" alt="Search" src="<?php bloginfo( 'template_url' ); ?>/assets/image/search-icon-1.png" />
				</form>
			</nav>
		</div><!-- .container -->
	</header><!-- #masthead -->

<?php
	if ( is_front_page() && is_home() ) :
?>
	<div id="intro-container">
		<div class="content">
			<h1 class="site-title">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
					<?php bloginfo( 'name' ); ?>
				</a>
			</h1>
			<?php
				$assignment_theme_description = get_bloginfo( 'description', 'display' );
					if ( $assignment_theme_description || is_customize_preview() ) :
			?>
				<p class="site-description">
					<?php echo $assignment_theme_description; ?>
				</p>
			<?php endif; ?>
		</div> <!-- content -->
		<?php 
			if ( has_header_image() ) : 
		?>
				<div class="header-img" style="background: url( <?php echo get_header_image(); ?> )"></div>			
		<?php
			else : 
		?>
				<div class="header-img" style="background: url( <?php echo get_template_directory_uri() . '/assets/image/slider.png' ?> )">
				</div>
		<?php endif; ?>
		<hr class="break"/>
	</div>	<!-- intro-container -->

	<?php
		else:
			endif;
	?>

<div class="container-fluid features-wrapper" style="background: url( <?php echo get_template_directory_uri() . '/assets/image/features-repeatable-bg.png' ?> )" >

	<div class="container features-container">
		<div class="row">
			<div class="col-sm-4">
				<img src="<?php echo wp_get_attachment_url( get_theme_mod( 'feature-image-1' ) ); ?> " id="feature-image-1" />
				<div class="content">
					<p class="title"> 
						<?php echo esc_html( get_theme_mod( 'feature-title-1' ) ); ?> 
					</p>
					<p class="description"> 
						<?php echo esc_html( get_theme_mod( 'feature-text-1' ) ); ?>
					</p>
				</div><!-- content -->	
			</div><!-- .col-sm-4 -->
			<div class="col-sm-4">	
				<img src="<?php echo wp_get_attachment_url( get_theme_mod( 'feature-image-2' ) ); ?>" id="feature-image-2" />
				<div class="content">
					<p class="title"> 
						<?php echo esc_html( get_theme_mod( 'feature-title-2' ) ); ?> 
					</p>
					<p class="description"> 
						<?php echo esc_html( get_theme_mod( 'feature-text-2' ) ); ?> 
					</p>
				</div><!-- content -->
			</div><!-- .col-sm-4 -->
			<div class="col-sm-4">
				<img src="<?php echo wp_get_attachment_url( get_theme_mod( 'feature-image-3' ) ); ?>" id="feature-image-3" />
				<div class="content">
					<p class="title"> 
						<?php echo esc_html( get_theme_mod( 'feature-title-3' ) ); ?> 
					</p>
					<p class="description"> 
						<?php echo esc_html( get_theme_mod( 'feature-text-3' ) ); ?> 
					</p>
				</div><!-- content -->
			</div><!-- .col-sm-4 -->
		</div><!-- row -->
	</div><!-- .container -->
</div><!-- container-fluid -->