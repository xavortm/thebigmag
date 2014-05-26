<?php

/**
 * Media shortcodes.
 * ---------------------------------------------------------------
 * 
 * List of the shortcodes in this file:
 * - Twitter
 * - Facebook
 * - Google Plus
 * - Stumbleupton
 * - Linkedin
 */


/**
 * TWITTER
 * ----------------------------------------------------------------
 */
if (!function_exists('tbm_twitter_shortcode')) {

	function tbm_twitter_shortcode( $atts, $content = null ) {
	
		extract(shortcode_atts(array(
				'layout'        => 'vertical',
				'username'		  => '',
				'text' 			  => '',
				'url'			  => '',
				'related'		  => '',
				'lang'			  => '',
			), $atts));
			
		if ($text != '') { $text = "data-text='".$text."'"; }
		if ($url != '') { $url = "data-url='".$url."'"; }
		if ($related != '') { $related = "data-related='".$related."'"; }
		if ($lang != '') { $lang = "data-lang='".$lang."'"; }
		
		$out = '<span class = "tbm_social"><a href="http://twitter.com/share" class="twitter-share-button" '.$url.' '.$lang.' '.$text.' '.$related.' data-count="'.$layout.'" data-via="'.$username.'">Tweet</a>';
		$out .= '<script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></span>';
		
		return $out;
	
	}
	
add_shortcode('twitter', 'tbm_twitter_shortcode');

}

/**
 * FACEBOOK
 * ----------------------------------------------------------------
 */
if (!function_exists('tbm_facebook_shortcode')) {

	function tbm_facebook_shortcode( $atts, $content = null ) {
	
		extract(shortcode_atts(array(
				'layout'		=> 'box_count',
				'width'			=> '',
				'height'		=> '',
				'show_faces'	=> 'false',
				'action'		=> 'like',
				'font'			=> 'lucida+grande',
				'colorscheme'	=> 'light',
			), $atts));
		
		if ($layout == 'standard') { $width = '450'; $height = '35';  if ($show_faces == 'true') { $height = '80'; } }
		if ($layout == 'box_count') { $width = '55'; $height = '65'; }
		if ($layout == 'button_count') { $width = '90'; $height = '20'; }
		
		$out = '<span class = "tbm_social tbm_social_fb"><iframe src="http://www.facebook.com/plugins/like.php?href='.get_permalink();
		$out .= '&layout='.$layout.'&show_faces=false&width='.$width.'&action='.$action.'&font='.$font.'&colorscheme='.$colorscheme.'"';
		$out .= 'allowtransparency="true" style="border: medium none; overflow: hidden; width: '.$width.'px; height: '.$height.'px;"';
		$out .= 'frameborder="0" scrolling="no"></iframe></span>';
		
		return $out;
	
	}
	
add_shortcode('facebook', 'tbm_facebook_shortcode');

}

/**
 * GOOGLE PLUS
 * ----------------------------------------------------------------
 */
if (!function_exists('tbm_gplus_shortcode')) {

	function tbm_gplus_shortcode( $atts, $content = null ) {
	
		extract(shortcode_atts(array(
				'size'			=> 'tall',
				'lang'			=> 'en-US',
		), $atts));
		
		if ($size != '') { $size = "size='".$size."'"; }
		if ($lang != '') { $lang = "{lang: '".$lang."'}"; }
		
		$out = '<span class = "tbm_social"><script type="text/javascript" src="https://apis.google.com/js/plusone.js">'.$lang.'</script>';
		$out .= '<g:plusone '.$size.'></g:plusone></span>';
		
		return $out;
	
	}
	
add_shortcode('gplus', 'tbm_gplus_shortcode');

}


/**
 * DIGG - DIGG COMPACT
 * ----------------------------------------------------------------
 */
if (!function_exists('tbm_digg_shortcode')) {

	function tbm_digg_shortcode( $atts, $content = null ) {
	
		extract(shortcode_atts(array(
			'layout'        => 'DiggMedium',
			'url'			=> get_permalink(),
			'title'			=> '',
			'type'			=> '',
			'description'	=> '',
			'related'		=> '',
			), $atts));
		
		if ($title != '') { $title = "&title='".$title."'"; }
		if ($type != '') { $type = "rev='".$type."'"; }
		if ($description != '') { $description = "<span style = 'display: none;'>".$description."</span>"; }
		if ($related != '') { $related = "&related=no"; }
			
		$out = '<span class = "tbm_social"><a class="DiggThisButton '.$layout.'" href="http://digg.com/submit?url='.$url.$title.$related.'"'.$type.'>'.$description.'</a>';
		$out .= '<script type = "text/javascript" src = "http://widgets.digg.com/buttons.js"></script></span>';
		
		return $out;
	
	}
	
add_shortcode('digg', 'tbm_digg_shortcode');

}

/**
 * STUMBLEUPON
 * ----------------------------------------------------------------
 *
 * Layout options: From 1 to 5.
 */
if (!function_exists('tbm_stumbleupon_shortcode')) {

	function tbm_stumbleupon_shortcode( $atts, $content = null ) {
	
		extract(shortcode_atts(array(
			'layout'        => '5',
			'url'			=> '',
			), $atts));
			
		if ($url != '') { $url = "&r=".$url; }
		
		$out=  '<span class = "tbm_social"><script src="http://www.stumbleupon.com/hostedbadge.php?s='.$layout.$url.'"></script></span>';
		return $out;
	}
	
add_shortcode('stumbleupon', 'tbm_stumbleupon_shortcode');

}

/**
 * LINKEDIN
 * ----------------------------------------------------------------
 *
 * Layout options: From 1 to 3.
 */
if (!function_exists('tbm_linkedin_shortcode')) {

	function tbm_linkedin_shortcode( $atts, $content = null ) {
	
		extract(shortcode_atts(array(
			'layout'        => '3',
			'url'			=> '',
			), $atts));
			
		if ($url != '') { $url = "data-url='".$url."'"; }
		if ($layout == '2') { $layout = 'right'; }
		if ($layout == '3') { $layout = 'top'; }
			
		$out = '<span class = "tbm_social"><script type="text/javascript" src="http://platform.linkedin.com/in.js"></script><script type="in/share" data-counter = "'.$layout.'" '.$url.'></script></span>';
		
		return $out;
	}	
	
add_shortcode('linkedin', 'tbm_linkedin_shortcode');

}