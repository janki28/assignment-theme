<?php
/**
 * assignment-theme Theme Customizer
 *
 * @package assignment-theme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function assignment_theme_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'assignment_theme_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'assignment_theme_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'assignment_theme_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function assignment_theme_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function assignment_theme_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function assignment_theme_customize_preview_js() {
	wp_enqueue_script( 'assignment-theme-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'assignment_theme_customize_preview_js' );

/*===========================================================
        Custom Header Services.
===========================================================*/

function custom_header_service( $wp_customize ) 
{
	$wp_customize -> add_section( 'feature-section', array(
		'title' => __( 'Header Services', 'assignment-theme' )
	) );


	$wp_customize -> add_setting( 'feature-image-1' );
	// Image-1
	$wp_customize -> add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'feature-image-control-1',
	array(
		'label'    => __( 'Image-1', 'assignment-theme' ),
		'section'  => 'feature-section',
		'settings' => 'feature-image-1',
		'width'    => 50,
		'height'   => 50,
	) ) );

	// Title-1
	$wp_customize -> add_setting( 'feature-title-1', array(
		'default' => 'Advertising'
	) );

	$wp_customize -> add_control( new WP_Customize_Control( $wp_customize, 'feature-title-control-1',
	array(
		'label'    => __( 'Title-1', 'assignment-theme' ),
		'section'  => 'feature-section',
		'settings' => 'feature-title-1',
	) ) );
	
	// Description-1
	$wp_customize -> add_setting( 'feature-text-1', array(
		'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.'
	) );

	$wp_customize -> add_control( new WP_Customize_Control( $wp_customize, 'feature-text-control-1',
	array(
		'label'    => __( 'Description-1', 'assignment-theme' ),
		'section'  => 'feature-section',
		'settings' => 'feature-text-1',
		'type'     => 'textarea',
	) ) );

	// Image-2
	$wp_customize -> add_setting( 'feature-image-2' );

	$wp_customize -> add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'feature-image-control-2',
	array(
		'label'    => __( 'Image-2', 'assignment-theme' ),
		'section'  => 'feature-section',
		'settings' => 'feature-image-2',
		'width'    => 50,
		'height'   => 50,
	) ) );

	// Title-2
	$wp_customize -> add_setting( 'feature-title-2', array(
		'default' => 'Multimedia'
	) );

	$wp_customize -> add_control( new WP_Customize_Control( $wp_customize, 'feature-title-control-2',
	array(
		'label'    => __( 'Title-2', 'assignment-theme' ),
		'section'  => 'feature-section',
		'settings' => 'feature-title-2',
	) ) );
	
	// Description-2
	$wp_customize -> add_setting( 'feature-text-2', array(
		'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.'
	) );

	$wp_customize -> add_control( new WP_Customize_Control( $wp_customize, 'feature-text-control-2',
	array(
		'label'    => __( 'Description-2', 'assignment-theme' ),
		'section'  => 'feature-section',
		'settings' => 'feature-text-2',
		'type'     => 'textarea',
	) ) );

	
	// Image-3
	$wp_customize -> add_setting( 'feature-image-3' );

	$wp_customize -> add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'feature-image-control-3',
	array(
		'label'    => __( 'Image-3', 'assignment-theme' ),
		'section'  => 'feature-section',
		'settings' => 'feature-image-3',
		'width'    => 50,
		'height'   => 50,
	) ) );
	// Title-3
	$wp_customize -> add_setting( 'feature-title-3', array(
		'default' => 'Photography'
	) );

	$wp_customize -> add_control( new WP_Customize_Control( $wp_customize, 'feature-title-control-3',
	array(
		'label'    => __( 'Title-3', 'assignment-theme' ),
		'section'  => 'feature-section',
		'settings' => 'feature-title-3',
	) ) );
	
	// Description-3
	$wp_customize -> add_setting( 'feature-text-3', array(
		'default' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.'
	) );

	$wp_customize -> add_control( new WP_Customize_Control( $wp_customize, 'feature-text-control-3',
	array(
		'label'    => __( 'Description-3', 'assignment-theme' ),
		'section'  => 'feature-section',
		'settings' => 'feature-text-3',
		'type'     => 'textarea',
	) ) );	
}
add_action( 'customize_register', 'custom_header_service' );

/*===========================================================
        Custom Footer.
===========================================================*/

function custom_theme_footer_setting( $wp_customize )
{
	$wp_customize->add_section('footer-section',  array(
		'title'			=>	__('Footer Settings','assignment-theme')
		)
	);

	$wp_customize->add_setting( 'footer-address', array(
			'capability' 	=> 'edit_theme_options',
			'default'    	=> 'Street 21 Planet, A-11, dapibus tristique. 123 551.'
		) 
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer-address', array(
			'label'    =>	__( 'Contact info(use \'<br>\' for new line)', 'assignment-theme' ),
			'section'  =>	'footer-section',
			'settings' =>	'footer-address',
			'type'     =>	'textarea',
		) 
	) );

	$wp_customize->add_setting('footer-phone', array(
		'capability'	=>	'edit_theme_options',
		'default'		=>	'Tel: 123 4567890; Fax: 123 456789'
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer-phone', array(
				'label'    =>	__( 'Phone', 'assignment-theme' ),
				'section'  =>	'footer-section',
				'settings' =>	'footer-phone',
				'type'     =>	'textarea',
			) 
		) );

	$wp_customize->add_setting('footer-email', 
		array(
			'capability'	=> 'edit_theme_options',
			'default'		=> 'contactus@dsignfly.com'
		)
	);
	
	$wp_customize->add_control(new WP_Customize_Control( $wp_customize, 'footer-email', array(
			'label'		=>	__('Email','assignment-theme'),
			'section'	=>	'footer-section',
			'settings'	=>	'footer-email',
			'type'		=>	'text',
		)
	));

	$wp_customize->add_setting('footer-social-link', 
		array(
			'capability'	=> 'edit_theme_options',
			'default'		=> 'https://www.facebook.com/;https://www.linkedin.com/;https://in.pinterest.com/;https://twitter.com/'
		)
	);
	
	$wp_customize->add_control(new WP_Customize_Control( $wp_customize, 'footer-social-link', array(
			'label'		=>	__('Social Media','assignment-theme'),
			'section'	=>	'footer-section',
			'settings'	=>	'footer-social-link',
			'type'		=>	'textarea',
		)
	));	
}
add_action('customize_register','custom_theme_footer_setting');


/*===========================================================
        Custom Author Details.
===========================================================*/
function custom_theme_author_setting( $wp_customize )
{
	$wp_customize->add_section('author-section',  array(
		'title'			=>	__('About Author','assignment-theme')
		)
	);

	$wp_customize->add_setting( 'author-welcome-line', array(
			'capability' 	=> 'edit_theme_options',
			'default'    	=> 'Lorem ipsum dolor sit amet,'
		) 
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'author-welcome-line', array(
			'label'    =>	__( 'Introduce Yourself', 'assignment-theme' ),
			'section'  =>	'author-section',
			'settings' =>	'author-welcome-line',
			'type'     =>	'textarea',
		) 
	) );

	$wp_customize->add_setting( 'author-welcome-para', array(
			'capability' 	=> 'edit_theme_options',
			'default'    	=> 'Lorem ipsum dolor sit amet, lorem ipsum dolor sit amet.'
		) 
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'author-welcome-para', array(
			'label'    =>	__( 'Welcome your users', 'assignment-theme' ),
			'section'  =>	'author-section',
			'settings' =>	'author-welcome-para',
			'type'     =>	'textarea',
		) 
	) );


	// Photo
	$wp_customize -> add_setting( 'author-image');

	$wp_customize -> add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'author-image',
	array(
		'label'    => __( 'Photo', 'assignment-theme' ),
		'section'  => 'author-section',
		'settings' => 'author-image',
		'width'    => 150,
		'height'   => 90,
	) ) );
	
}
add_action('customize_register','custom_theme_author_setting');