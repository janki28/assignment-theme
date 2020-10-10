<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package assignment-theme
 */

if ( ! function_exists( 'assignment_theme_posted_by' ) ) :
	
	function assignment_theme_posted_by() 
	{
		$byline = sprintf(
			esc_html_x( 'by %s', 'post author', 'assignment-theme' ),
			'<span class="author vcard">
				<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>
			</span>'
		);
		echo '<span class="byline"> ' . $byline . '</span>'; 

	}
endif;

if ( ! function_exists( 'assignment_theme_posted_on' ) ) :
	function assignment_theme_posted_on() 
	{
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) 
		{
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		$posted_on = sprintf(
			esc_html_x( ' on %s', 'post date', 'assignment-theme' ),
			'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
		);
		echo '<span class="posted-on">' . $posted_on . '</span>'; 
	}
endif;

if ( ! function_exists( 'assignment_theme_entry_footer' ) ) :
	function assignment_theme_entry_footer() 
	{
		if ( 'post' === get_post_type() ) 
		{
			$categories_list = get_the_category_list( esc_html__( ', ', 'assignment-theme' ) );
			if ( $categories_list ) 
			{
				printf( '<span class="cat-links">' . esc_html__( 'CATEGORY: %1$s', 'assignment-theme' ) . '</span>', $categories_list ); 
			}

			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'assignment-theme' ) );
			if ( $tags_list ) 
			{
				printf( '<span class="tags-links">' . esc_html__( 'TAGS: %1$s', 'assignment-theme' ) . '</span>', $tags_list );
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) 
		{
			echo '<span class="comments-link">';
			comments_popup_link( sprintf( wp_kses(
						__( 'Leave a Comment
							<span class="screen-reader-text"> on %s</span>', 'assignment-theme' ),
						array(
							'span' => array(
								'class' => array(),
								),
							)
						),
					wp_kses_post( get_the_title() )
				)
			);
			echo '</span>';
		}
	}
endif;

if ( ! function_exists( 'assignment_theme_post_thumbnail' ) ) :
	function assignment_theme_post_thumbnail() 
	{
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) 
		{
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php
					the_post_thumbnail(
						'post-thumbnail',
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
						)
					);
				?>
			</a>

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;

/*
    ===========================================================
            Pagination styles.
    ===========================================================
*/
function custom_pagination_bar( $custom_query )
{
	global $wp_query;
	$big = 999999999;
	$current_page = get_query_var('paged');
	$total_page = $custom_query->max_num_pages;
	$pages =  paginate_links(array(
			'base'=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format'    => '?paged=%#%',
            'end_size'	=> 0,
            'add_fragment' => '',
            'add_args'	=> false,
            'current'   => max(1, $current_page ),
			'total'     => $total_page,
			'type'      => 'array',
			'mid_size' 	=> 1,
			'show_all'	=> false,
			'prev_text' => '<img class="pagination-arrow-left" src="' . get_template_directory_uri() . '/assets/image/pagination-arrow.png' . '" />',
			'next_text' => '<img class="pagination-arrow-right" src="' . get_template_directory_uri() . '/assets/image/pagination-arrow.png' . '" />',
			)
		);
	if( is_array( $pages ) ) 
	{
		$paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
		echo '<div id="pagination">';
		foreach ( $pages as $page ) 
		{
			echo $page;
		}
		echo '</div>';
	}
}
/*
    ===========================================================
            Comment styles.
    ===========================================================
*/
function custom_comment_format($comment, $args, $depth) {

    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
	?>
	
    <<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	<?php endif; ?>
	
    <div class="comment-author vcard">
        <?php printf( __( '<cite class="fn">%s</cite> <span class="says"> said on </span>' ), get_comment_author_link() ); ?>
	</div>
	
	<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
		<?php
		/* translators: 1: date, 2: time */
		printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)' ), '  ', '' );
		?>
	</div>
	<?php if ( $comment->comment_approved == '0' ) : ?>
         <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
          <br />
    <?php endif; ?>


    <?php comment_text(); ?>

    <div class="reply">
        <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
    </div>
	
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	
    <?php endif; ?>
    <?php
}
