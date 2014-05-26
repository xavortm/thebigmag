<?php

/**
 * Call Methods class
 *
 * Used like helpers class, to use diferent functionality from one place.
 * All methods are static, no objects are created, this is only for direct call.
 *
 * Used with TBM_Print::HelpMethod()
 *
 * @package WordPress
 * @subpackage The Big Magazine
 */

class TBM_Print {

	/**
	 * Print message from php. Used as for debugging or user message.
	 * 
	 * @since v1.0.0
	 */
	public static function message( $msg, $type = 'notice' ) {

		// Print the surounding div and the type of message.
		echo "<div class='message-box $type'>";
		echo "<p>$msg</p>";
		echo "</div>";

	}

	/**
	 * When the class is used, it will be callsed " TBM_Breadcrumb::print() ".
 	 * All the rest of the classes are protected. There is no need of initialization,
 	 * so no constructors will be created. (not created to work with parameters)
	 * 
	 * @since v1.0.0
	 */
	public static function breadcrumbs() {
		
		// Initialise the object for a breadcrumb
		$bc = new TBM_Breadcrumb();

		// One method to rule them all!
		$bc->display();

	}

	/**
	 * Print the author link.
	 *
	 * Because of the weird actions from the build in to the core function the_author(  ) i decided
	 * to write my own function. This will print on the screen ( by the right way ) who is the author
	 * and a link to the posts by the given author. No parameters are needed.
	 *
	 * @uses get_the_author_meta()
	 * @uses get_the_author()
	 * @uses get_author_posts_url()
	 * @since 1.0.0
	 * @return Displays the post author link and name.
	 */
	public static function author_link(){ 
		$link = get_author_posts_url( get_the_author_meta( 'ID' ) );
		echo '<a href="'. $link .'">'. get_the_author() .'</a>';
	}

	/**
	 * Pagination. 
	 * 
	 * Print on the screen pagination links. Can be used from various
	 * of pages, like categories, tags and so on.
	 * 
	 * @since v1.0.0
	 */
	public static function pagination() {
		global $wp_query;

		// need an unlikely integer
		$big = 999999999; 
		
		// Preparing the arguments for  paginate_links();
		$args = array(
			'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format' => '?paged=%#%',
			'current' => max( 1, get_query_var('paged') ),
			'total' => $wp_query->max_num_pages
		);

		echo "<div class='btn-group page-pagination'>";
		echo paginate_links( $args );
		echo "</div>";
	}

	/**
	 * List categories from given parent slug name. There is simpler wordpress function
	 * for this logic, but not with the parent category. This is why this comes in handy.
	 * (as well as the limit variable for the categories).
	 *
	 * @param string $parent Parent category
	 * @param bool $parent_ul Print or not <ul> tag
	 * @param int $limit How many to be dysplayed
	 * 
	 * @uses  get_categories Return Obj of category.
	 * @uses  get_category_by_slug Obj of category by given slug name only.
	 * 
	 * @since v1.0.0
	 */
	public static function list_categories( $parent = 'uncategorized', $print_ul = true, $limit = 3 ) {

		// Get the category ID
		$catObj = get_category_by_slug( strtolower( $parent ) ); 

		// Security check if a currect category is printed;
		if ( ! $catObj ) {
			self::message("Wrong category name.");
			return;
		}

		// Query categories and get only the child ones. (doesnt hide empty categories)
		$categories = get_categories( array('child_of' => $catObj->term_id, 'hide_empty' => 0) );
		
		// Starting ul tags.
		if( $print_ul ) echo '<ul>';

		// Print the categories in the loop.
		foreach( $categories as $category ) {
			if( $counter++ == $limit ) break;
		?>
			<li><a href="<?php echo get_category_link( $category->cat_ID ) ?>"><?php echo $category->name ?></a></li>
		<?php } 

		// Close ul tags.
		if( $print_ul ) echo '</ul>';
	}

	/**
	 * Query $count posts in unordered list. This is in its own function, 
	 * because its helpful in many parts of the site, instead of
	 * writing queries in the template files.
	 *
	 * @param String $category From which category to display posts. If empty, it will query from all categories.
	 * @param int $limit How many to be queried
	 * @param int $offset Skip first posts
	 * @param bool $print_ul Display or not <ul> tags.
	 * @param bool $show_comments Display or not comments count after title.
	 * @since  v1.0.0
	 */
	public static function posts( $category_ID = 0 , $limit = 3, $offset = 1, $print_ul = true, $show_comments = true ) {

		if ( ! is_numeric( $category_ID ) ) {
			self::message("Use ID for the category!");
			return;
		}

		// Get all categories or only one.
		$the_query = new WP_Query( 'cat=' . $category_ID . '&posts_per_page=' . $limit . '&offset=' . $offset );

		// Print UL tag if required.
		if( $print_ul == true )
			echo '<ul>';

		// The Loop
		if ( $the_query->have_posts() ) {
			while ( $the_query->have_posts() ) {
				$the_query->the_post(); 

				// Show the content ?>
				<li>
					<a href='<?php the_permalink(); ?>'><?php the_title(); ?></a>
					<?php if( $show_comments == true ) {

						// Display how many comments the post has.
						$comments = get_comments_number();

						// Print the information
						echo "<i class='icon-comment'> </i>";
						echo "<span class='comments'>$comments</span>";
					
					} ?>
				</li>
			<?php }
		} else {
			// If no posts were found, message will be printed. (or send regular message).
			// echo '<strong>No Posts were found!</strong>';
			self::message("No posts found!");
		}

		// Close ul tag
		if( $print_ul == true )
			echo '</ul>';

		/* Restore original Post Data */
		wp_reset_postdata();

	}


	/**
	 * Print the comments title for single pages. Its separated on another method for better read
	 * insidte the comments template. ( + if its used elsewhere )
	 *
	 * @since  v1.0.0
	 */
	public static function comments_title() {
		printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'thebigmag' ),
				number_format_i18n( get_comments_number() ), '<span>' . get_the_title() . '</span>' );
	}

	/**
	 * Category printed on screen.
	 * 
	 * @param bool $print_link Print link if TRUE
	 * @since  v1.0.0
	 */
	public static function category_name( $print_link = FALSE ) {

		// Get the most important - the category. (array of objects, we take the first one always)
		$post_category = get_the_category();

		// Print the link of category
		if( $print_link ) {
	
			$post_category_link = get_category_link( $post_category[0]->cat_ID );
			echo "<a href='{$post_category_link}'>{$post_category[0]->name}</a>";

		} 
		else echo $post_category[0]->name;
	}

	/**
	 * Previous and next posts for posts.
	 *
	 * If there are no more posts left, the next link will be unclickable,
	 * because, if we could click it, there would be errors appearing.
	 *
	 * @param String $link  Which link should be used. Previous or next.
	 * @param String $title  The title of button. If empty, the title of post will be used.
	 * @param String $before  HTML tag or content that will be inserted before the link.
	 * @param String $after  HTML tag or content that will be inserted after the link.
	 * @since v1.0.0
	 */

	public function prev_next_links( $link = 'both', $length = 0, $before = '', $after = '' ) {

		// Make sure that the page where these links are is single
		if( !is_single() OR is_page() ) return;

		// Get the previous and next posts objects
		$previous 	= get_previous_post();	// Return Object
		$next 		= get_next_post();		// Return Object


		// The max length of printed title
		if( $length != 0 ) {
			$prev_title = substr( $previous->post_title, 0, $length ) . '...';
			$next_title = substr( $next->post_title, 0, $length ) . '...';
		}

		// See if there are posts before the curent. If there are none, will will show this to the user.
		if( $next == "" ) {
			$next_link = $before . "<span class='next-post-link label label-default'>No more posts</span>";
		} else {
			$next_link = $before . "<a class='next-post-link' href='$next->guid' class='entry-next-link'>{$prev_title}</a>";
		}

		// See if there are posts after it, if there are none, will will show this to the user.
		if( $previous == "" ) {
			$previous_link = $before . "<span class='previous-post-link label label-default'>No more posts</span>";
		} else {
			$previous_link = $before . "<a class='prev-post-link' href='$previous->guid' class='entry-next-link'>$prev_title</a>";
		}

		// Now print the next or previous ,depends on what is called.
		if( $link == 'prev' ) {
			echo $previous_link;
		}

		// Now print the next or previous ,depends on what is called.
		elseif( $link == 'next' ) {
			echo $print_next;
		}

		// Or print both, again depends on the arguments
		elseif( $link == 'both' ) {
			echo $previous_link . $next_link;
		}

	}

	/**
	 * Post thumbnail calling. Shorted here, because we make many checks for wich page its called from. 
	 * its used to not use very big images when they are no needed, and by this speeds up the procces of
	 * opening a page.
	 * 
	 * @since  v1.0.0
	 */
	public static function post_thumbnail( $size = '' ) {

		if( has_post_thumbnail() ) {

			if( isset( $size ) ) {
				the_post_thumbnail( $size );
				return;
			}

			// Check if the current page need large image.
			if( is_single() OR is_page() ) {
				the_post_thumbnail('large'); 
			}
			else {
				// Now for the small ones
				the_post_thumbnail( 'medium' );
			}

		} // has_post_thumbnail
		else {
			if( $size == '' ) 
				$size = "large";
			
			$image_directory = get_template_directory_uri() . '/images/default_' . $size . '.png';

			// Print the default post thumbnail
			echo "<img src='{$image_directory}' />";
		}

	}

	/**
	 * Function to display the archives message in page - heading
	 * 
	 * @since v1.0.0
	 */
	public static function archives_title() {
		if ( is_day() ) :
			printf( __( 'Daily Archives: <strong>%s</strong>', 'thebigmag' ), get_the_date() );
		elseif ( is_month() ) :
			printf( __( 'Monthly Archives: <strong>%s</strong>', 'thebigmag' ), get_the_date( _x( 'F Y', 'monthly archives date format', 'thebigmag' ) ) );
		elseif ( is_year() ) :
			printf( __( 'Yearly Archives: <strong>%s</strong>', 'thebigmag' ), get_the_date( _x( 'Y', 'yearly archives date format', 'thebigmag' ) ) );
		else :
			_e( 'Archives', 'thebigmag' );
		endif;
	}


}