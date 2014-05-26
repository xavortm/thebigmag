<?php

/**
 * Get Methods class
 *
 * Used like helpers class, to use diferent functionality from one place.
 * All methods are static, no objects are created, this is only for direct call.
 *
 * Used with TBM_Get::HelpMethod()
 *
 * @package WordPress
 * @subpackage The Big Magazine
 */


class TBM_Get {

	/**
	 * Return the category name or name and link to the category page.
	 * 
	 * @see TBM_Print::category_name()
	 * @since  v1.0.0
	 */
	public static function category_name( $print_link = FALSE ) {

		// Get the most important - the category. (array of objects, we take the first one always)
		// If there is nothing, we just return empty string so there are no issues from
		// content side
		if( ! $post_category = get_the_category() ) {
			return "";
		}

		// Print the link of category
		if( $print_link ) {
	
			$post_category_link = get_category_link( $post_category[0]->cat_ID );
			return "<a href='{$post_category_link}'>{$post_category[0]->name}</a>";

		} 
		else return $post_category[0]->name;
	}

	/**
	 * Get the author link.
	 *
	 * Because of the weird actions from the build in to the core function the_author(  ) i decided
	 * to write my own function. This will print on the screen ( by the right way ) who is the author
	 * and a link to the posts by the given author. No parameters are needed.
	 *
	 * @uses get_the_author_meta()
	 * @uses get_the_author()
	 * @uses get_author_posts_url()
	 * @since 1.0.0
	 * @return String the post author link and name.
	 */
	public static function author_link(){ 
		$link = get_author_posts_url( get_the_author_meta( 'ID' ) );
		return '<a href="'. $link .'">'. get_the_author() .'</a>';
	}

	/**
	 * Post thumbnail calling. Shorted here, because we make many checks for wich page its called from. 
	 * its used to not use very big images when they are no needed, and by this speeds up the procces of
	 * opening a page.
	 * 
	 * @return String The thumbnail with tags
	 * @since  v1.0.0
	 */
	public static function post_thumbnail( $size = '' ) {

		if( has_post_thumbnail() ) {

			if( isset($size) ) {
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
			if( $size == '' ) $size = "large";

			$image_directory = get_template_directory_uri() . '/images/default_' . $size . '.png';
			// Print the default post thumbnail
			return "<img src='{$image_directory}' />";
		}

	}

	/**
	 * Function to display the archives message in page - heading
	 * 
	 * @return String 
	 * @since v1.0.0
	 */
	public static function archives_title() {
		if ( is_day() ) :
			return 'Daily Archives: <strong>%s</strong>';
		elseif ( is_month() ) :
			return 'Monthly Archives: <strong>%s</strong>';
		elseif ( is_year() ) :
			return 'Yearly Archives: <strong>%s</strong>';
		else :
			return 'Archives';
		endif;
	}

}