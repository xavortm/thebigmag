<?php

/**
 * Elements shortcodes.
 * ---------------------------------------------------------------
 * 
 * List of the shortcodes in this file:
 * - Searchform
 */

/**
 * SEARCHFORM
 * ----------------------------------------------------------------
 * Print search form on the screen.
 */
if (!function_exists('tbm_searchform')) {

	function tbm_searchform( $atts ) {

		extract(shortcode_atts(array(
			'button_text' 	=> 'Search',
		), $atts));

		// The custom search form
		$output =  	"<div class='tbm_searchform'>";
		$output .= 		get_search_form( $echo );
		$output .= 	"</div>";

		return $output;

	}
	
	add_shortcode('search', 'tbm_searchform');
	
}

/**
 * SEPARATOR
 * ----------------------------------------------------------------
 * Line separator. Can be simple line, shadow or empty space. This
 * will be decided in the stylesheet file.
 */
if( ! function_exists('tbm_separator') ) {

	function tbm_separator( $atts ) {

		extract(shortcode_atts( array(
			'height' 	=> 'medium',
			'type'		=> 'line',
		), $atts ));

		// Strip the commas from the atts.
		// By default the height is " small, big... ", same
		// goes for the type.
		$height = strtok($height, ',');
		$type = strtok($type, ',');

		// Collect and store the information for the class.
		$class = $height . ' ' . $type;

		// Return the print HTML line.
		return "<div class='tbm-separator clearix $class'><!-- empty --></div>";
	}

	add_shortcode( 'separator', 'tbm_separator' );

}