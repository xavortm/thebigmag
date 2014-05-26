<?php

/**
 * Media shortcodes.
 * ---------------------------------------------------------------
 * 
 * List of the shortcodes in this file:
 * - Lightbox Image
 * - Video Embed
 */


/**
 * LIGHTBOX IMAGE
 * ----------------------------------------------------------------
 */
if (!function_exists('tbm_lightbox_image_shortcode')) {
	function tbm_lightbox_image_shortcode( $atts ) {
		extract( shortcode_atts( array(
			'src' => '',
			'bigimage' => '',
			'align' => 'aligncenter',
			'title' => 'Image',
			'alt' => '',
		), $atts ) );

		if ($title != '') { $title = "title='".$title."'"; }
		
		if ($align == 'left') { $align = 'alignleft'; }
		if ($align == 'center') { $align = 'aligncenter'; }
		if ($align == 'right') { $align = 'alignright'; }
		
		$lightbox_image = '<a href="'.esc_attr($bigimage).'" '.$title.' rel="lightbox"><img class="'.esc_attr($align).'" src="'.esc_attr($src).'" alt="'.esc_attr($alt).'" /></a>';
		
		return $lightbox_image;
	}
	
	add_shortcode( 'lightbox_image', 'tbm_lightbox_image_shortcode' );
}


/**
 * VIDEO SHORTCODE
 * ----------------------------------------------------------------
 */
if (!function_exists('tbm_video_shortcode')) {
	
	function tbm_video_shortcode( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'type' => 'youtube',
			'height' => '420',
			'width' => '315',
			'align' => 'aligncenter',
			'id' => ''
		),$atts));
	
		if($height == ''){	$height = '420'; }
		if($width == ''){	$width = '315'; }
		
		if ($align == 'left') { $align = 'alignleft'; }
		if ($align == 'center') { $align = 'aligncenter'; }
		if ($align == 'right') { $align = 'alignright'; }
		
		if($type == 'youtube'){
			return '<iframe class="thebigmag-video '.esc_attr($align).'" width="'.$width.'" height="'.$height.'" src="http://www.youtube.com/embed/'.$id.'?wmode=transparent" frameborder="0" allowfullscreen></iframe>';
		} else	{
			return '<iframe class="thebigmag-video '.esc_attr($align).'" src="http://player.vimeo.com/video/'.$id.'" width="'.$width.'" height="'.$height.'" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';
		}
	}
	add_shortcode('video', 'tbm_video_shortcode');
}