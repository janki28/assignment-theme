<?php
/*
	===========================================================
 			Create custom post type.
	===========================================================
*/
function custom_post_type_portfolio()
{
	$labels = array(
		'name' 					=> esc_html__( 'Portfolios', 'assignment-theme' ),
		'singular_name' 		=> esc_html__( 'Portfolio', 'assignment-theme' ),
		'add_new' 				=> esc_html__( 'Add Portfolio', 'assignment-theme' ),
		'all_portfolio' 		=> esc_html__( 'All Portfolios', 'assignment-theme' ),
		'add_new_portfolio' 	=> esc_html__( 'Add Portfolio', 'assignment-theme' ),
		'edit_portfolio' 		=> esc_html__( 'Edit Portfolio', 'assignment-theme' ),
		'new_portfolio' 		=> esc_html__( 'New Portfolio', 'assignment-theme' ),
		'view_portfolio' 		=> esc_html__( 'View Portfolio', 'assignment-theme' ),
		'search_portfolio' 		=> esc_html__( 'Search Portfolio', 'assignment-theme' ),
		'not_found' 			=> esc_html__( 'No Portfolios Found', 'assignment-theme' ),
		'not_found_in_trash'	=> esc_html__( 'No items found in Trash', 'assignment-theme' ),
		'parent_item_colon' 	=> esc_html__( 'Parent Item', 'assignment-theme' ),
	);
	$args = array(
		'labels' 				=> $labels,
		'public' 				=> true,
		'has_archive' 			=> true,
		'publicly_available' 	=> true,
		'query_var' 			=> true,
		'rewrite' 				=> true,
		'capability_type' 		=> 'post',
		'hierarchical' 			=> false,
		'supports' 				=> array(
									'title',
									'editor',
									'excerpt',
									'thumbnail',
									'revisions',
									'comments',	
									),
		'menu_position' 		=> 5,
		'exclude_from_search' 	=> false,
		'menu_icon'				=>	'dashicons-images-alt'
	);
	register_post_type( 'portfolios', $args );
}
add_action('init','custom_post_type_portfolio');

/*
	===========================================================
 			Create custom hierarchical taxonomy.
	=========================================================== 
*/
function custom_taxonomies_portfolio()
{
	$labels = array(
		'name' 					=> esc_html__( 'Portfolio Categories', 'assignment-theme' ),
		'singular_name' 		=> esc_html__( 'Portfolio Category', 'assignment-theme' ),
		'search_items' 			=> esc_html__( 'Search Portfolio Categories', 'assignment-theme' ),
		'all_items' 			=> esc_html__( 'All Portfolio Categories', 'assignment-theme' ),
		'parent_item' 			=> esc_html__( 'Parent Portfolio Categories', 'assignment-theme' ),
		'parent_item_colon' 	=> esc_html__( 'Parent Portfolio Categories:', 'assignment-theme' ),
		'edit_item' 			=> esc_html__( 'Edit Portfolio Categories', 'assignment-theme' ),
		'update_item' 			=> esc_html__( 'Update Portfolio Categories', 'assignment-theme' ),
		'add_new_item' 			=> esc_html__( 'Add New Portfolio Category', 'assignment-theme' ),
		'new_item_name' 		=> esc_html__( 'New Portfolio Categories Name', 'assignment-theme' ),
		'menu_name' 			=> esc_html__( 'Portfolio Category', 'assignment-theme' ),
	);
	$args = array(
		'hierarchical' 			=> true,
		'labels' 				=> $labels,
		'show_ui'	 			=> true,
		'show_admin_column' 	=> true,
		'query_var' 			=> true,
		'rewrite' 				=> array(
									'slug' => 'portfolio-category' 
								) 
	);
	register_taxonomy('portfolio-category', 'portfolios', $args);
}
add_action('init','custom_taxonomies_portfolio');

/*
	===========================================================
 			Create custom non-hierarchical taxonomy.
	=========================================================== 
*/
function custom_taxonomies_non_portfolio()
{
	 $labels = array(
	 	'name' 					=> esc_html__( 'Portfolio Tags', 'assignment-theme' ),
	 	'singular_name' 		=> esc_html__( 'Portfolio Tag', 'assignment-theme' ),
	 	'search_items' 			=> esc_html__( 'Search Portfolio Tags', 'assignment-theme' ),
	 	'all_items' 			=> esc_html__( 'All Portfolio Tags', 'assignment-theme' ),
	 	'parent_item' 			=> esc_html__( 'Parent Portfolio Tag', 'assignment-theme' ),
	 	'parent_item_colon' 	=> esc_html__( 'Parent Portfolio Tag:', 'assignment-theme' ),
	 	'edit_item' 			=> esc_html__( 'Edit Portfolio Tag', 'assignment-theme' ),
	 	'update_item' 			=> esc_html__( 'Update Portfolio Tag', 'assignment-theme' ),
	 	'add_new_item' 			=> esc_html__( 'Add New Portfolio Tag', 'assignment-theme' ),
	 	'new_item_name' 		=> esc_html__( 'New Portfolio Tag Name', 'assignment-theme' ),
	 	'menu_name' 			=> esc_html__( 'Portfolio Tag', 'assignment-theme' ),
	 );
	$args = array(
		'hierarchical' 			=> false,
		'labels' 				=> $labels,
		'show_ui' 				=> true,
		'show_admin_column'		=> true,
		'query_var' 			=> true,
		'rewrite' 				=> array(
								'slug' 	=> 'portfolio-tag' 
							) 
	);
	register_taxonomy('portfolio-tag', array('portfolios'), $args);
}
add_action('init','custom_taxonomies_non_portfolio');
?>