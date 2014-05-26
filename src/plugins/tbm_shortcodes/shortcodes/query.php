<?php

/**
 * Query shortcodes.
 * ---------------------------------------------------------------
 * Custom queries for the user, so he doesn`t have to write them alone.
 * 
 * List of the shortcodes in this file:
 * - Recent Posts
 * - List Authors
 * - List Pages
 */

/**
 * RECENT POSTS
 * ----------------------------------------------------------------
 *
 * @uses  wp_get_recent_posts() Retrieve the most recent posts.
 * @param array $atts Shortcode attributes
 * @return string Output html as list
 */
if (!function_exists('tbm_get_recent_posts_list')) {

	function tbm_get_recent_posts_list( $atts ) {
 	    extract(shortcode_atts(array(
	   		'title' 	=> 	'Recent Posts',
			'limit' 	=> 	"5",
			'order' 	=> 	'DESC',
			'orderby' 	=> 	'post_date',
			'category'	=>	'0'
	       ), $atts));
	   
		$args = array(
			'numberposts' 	=> $limit,
			'order'			=> $order,
			'orderby'		=> $orderby,
			'category'		=> $category
		);
		
		$recent_posts = wp_get_recent_posts( $args );
		
		$heading = "<h4 class='thebigmag-recent-posts'>";
		$heading .= $title;
		$heading .= "</h4>"; 
		
		$list = "<ul>";
		foreach( $recent_posts as $post ) 
			$list .= "<li><a href='". get_permalink( $post["ID"] ) ."'>". $post["post_title"] ."</a></li>";
		$list .= "</ul>";
		

		$output = $heading.$list;
		
		return $output;
	}
	
	add_shortcode('recent_posts', 'tbm_get_recent_posts_list');

}

/**
 * LIST AUTHORS
 * ----------------------------------------------------------------
 * 
 * @param array $atts Shortcode attributes
 * @return string Output html as list
 */
if( ! function_exists( 'tbm_authors' ) ) {

	function tbm_authors( $atts ) {
		extract( shortcode_atts( array(
				"display_posts" => true,
				"exclude_admin" => false,
				"show_fullname" => true,
				"hide_empty" 	=> false,
			), $atts ) );

		$list = list_authors($display_posts, $exclude_admin, $show_fullname, $hide_empty);
		return "<div class='author-list'>$list</div>";
	}
	
	add_shortcode( 'print_authors', 'tbm_authors' );

}

/**
 * LIST PAGES
 * ----------------------------------------------------------------
 * 
 * @param array $atts Shortcode attributes
 * @return string Output html as list
 */
if ( ! function_exists('tbm_list_pages') ) {

	function tbm_list_pages( $atts ) {
		wp_list_pages( array( 'sort_column' => 'menu_order','title_li' => '' ) );
	}

	add_shortcode( 'list_pages', 'tbm_list_pages' );

}