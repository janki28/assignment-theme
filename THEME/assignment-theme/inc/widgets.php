<?php
/**
* Widget class for Custom widget extends WP_Widget WordPress class and overrides necessary functions for necessary functionality of the custom widget
*
* @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package assignment-theme
*/

class portfolio_sidebar_widget extends WP_Widget
{
	function __construct()
	{
		$custom_widget = array('description' => __('Displays your Portfolio Items.', 'assignment-theme')
	);
		parent::__construct('custom_widget_portfolio', 'Portfolio', $custom_widget);
	}

	public function widget( $args, $instance)
	{
		echo $args[ 'before_widget' ];
		$query = new WP_Query( array( 
            'post_type' => 'portfolios',
            'posts_per_page' => 8, 
            )
        );

        if ( $query -> have_posts() ):
            ?>
            <h2 class="widget-title">
                <?php
                    if ( isset( $instance[ 'title' ] ) ) 
                    {
                        $title = $instance[ 'title' ];
                    } 
                    else 
                    {
                        $title = 'Portfolio';
                    }
                    echo $title;
                ?>
            </h2>

            <div id="portfolio-widget-wrapper">
            
            <?php
            while ( $query -> have_posts() ):
                $query -> the_post();
                get_template_part( 'template-parts/content', 'portfolios' );  
            endwhile;
            ?>
            </div>
        
            <?php
        else:
            ?>
            <p>
                <?php _e( 'Looks like there are no items in the Portfolio.', 'textdomain' ); ?>
            </p>
            <?php
        endif;

        echo $args[ 'after_widget' ];

	}

	public function form ( $instance )
	{
		if ( isset( $instance[ 'title' ] ) )
		{
			$title = $instance[ 'title' ];
		}
		else
		{
			$title = 'Portfolio';
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">
				<?php _e('Title:');  ?>
			</label>
			<input class="widget_title" id="<?php echo $this->get_field_id('title' );  ?>" type="text" name="<?php echo $this->get_field_name('title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php
	}

}

function load_widget()
{
	register_widget( 'portfolio_sidebar_widget' );
}
add_action('widgets_init', 'load_widget');