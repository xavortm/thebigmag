<?php

/**
 * The Big Magazine Typography shortcodes.
 * ---------------------------------------------------------------
 * 
 * List of the shortcodes in this file:
 * - Column Shortcode
 * - Message Box
 * - Lists
 * - Single List Item
 * - Buttons
 * - Highlight
 * - Dropcaps
 * - Spoiler
 * - Panel
 * - Label
 */

/**
 * COLUMN HOLDER
 * ----------------------------------------------------------------
 */
function run_column_holder( $content ) {
        global $shortcode_tags;
        $orig_shortcode_tags = $shortcode_tags;
        remove_all_shortcodes(); 
        add_shortcode( 'col', 'tbm_column_holder' );        
        $content = do_shortcode( $content );
        $shortcode_tags = $orig_shortcode_tags; 
        return $content;
} 
add_filter( 'the_content', 'run_column_holder', 7 );

if(!function_exists('tbm_column_holder')) {
	function tbm_column_holder( $atts, $content = null)  {
		return '<div class="tbm-row">' . do_shortcode( $content ) .  '</div>';
	}
	add_shortcode('tbm-row', 'tbm_column_holder');
}

/**
 * COLUMN SHORTCODE
 * ----------------------------------------------------------------
 */
if (!function_exists('tbm_column_shortcode')) {

	function tbm_column_shortcode( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'width' => '',
			'last' => 'no',
		), $atts));
	
		$class1  =$width;
		
		$class2 = '';
		if ($last == 'true'){
			$class2  = ' tbm-column-last';
		}
		
		$class = $class1.$class2;
		
		$content = do_shortcode($content);
		$column = '<div class="'.$class.'">'.$content.'</div>';
		
		return $column;
	}
	
	add_shortcode('tbm-column', 'tbm_column_shortcode');

}

/**
 * MESSAGE BOX
 * ----------------------------------------------------------------
 */
add_shortcode( 'box', 'tbm_msgbox_shortcode' );

function run_box_shortcode( $content ) {
	global $shortcode_tags;
	$orig_shortcode_tags = $shortcode_tags;
	remove_all_shortcodes(); 
	add_shortcode( 'box', 'tbm_msgbox_shortcode' );	
	$content = do_shortcode( $content );
	$shortcode_tags = $orig_shortcode_tags; 
	return $content;
} 
add_filter( 'the_content', 'run_box_shortcode', 7 );

if (!function_exists('tbm_msgbox_shortcode')) {

	function tbm_msgbox_shortcode( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'style' => '',
			'width' => '',
			'custom_icon' => ''
		), $atts));

		$class = 'tbm-msgbox msgbox-'.$style;

		if( $custom_icon !== '' ) {

			// Remove styling from the box if there is custom icon.
			$class .= ' has-icon';

			// Add the $custom icon tag.
			$custom_icon = "<i class='icon-". $custom_icon ."'></i>";

		} else {
			// Else, we will put custom icons for the following types of
			// message boxes. Its done this way, because the nice names
			// of the msgboxes are diferent from the icon names.
			switch( $style ) {

				case 'doc': 
					$custom_icon = "<i class='icon-file-alt'></i>"; 
					break;

				case 'error': 
					$custom_icon = "<i class='icon-remove'></i>";
					break;

				case 'download': 
					$custom_icon = "<i class='icon-download-alt'></i>";
					break;

				case 'help': 
					$custom_icon = "<i class='icon-plus-sign-alt'></i>";
					break;

				case 'info': 
					$custom_icon = "<i class='icon-info'></i>";
					break;

				case 'media': 
					$custom_icon = "<i class='icon-picture'></i>";
					break;

				case 'new': 
					$custom_icon = "<i class='icon-star'></i>";
					break;

				case 'note': 
					$custom_icon = "<i class='icon-pencil'></i>";
					break;

				case 'success': 
					$custom_icon = "<i class='icon-ok'></i>";
					break;

				case 'warning': 
					$custom_icon = "<i class='icon-warning-sign'></i>";
					break;
			}
		}


		$cssstyle = '';
		if ($width){ 
			$cssstyle = 'style="width:'.$width.'"';
		}

		$box = '<div class="'.$class.'" '.$cssstyle.'><p class="msgbox-content">' . $custom_icon . do_shortcode( $content ) . '</p></div>';
		return $box;
	}
}

/**
 * LISTS
 * ----------------------------------------------------------------
 */
function run_list_shortcode( $content ) {
	global $shortcode_tags;
	$orig_shortcode_tags = $shortcode_tags;
	remove_all_shortcodes(); 
	add_shortcode( 'list', 'tbm_list_shortcode' );	
	$content = do_shortcode( $content );
	$shortcode_tags = $orig_shortcode_tags; 
	return $content;
} 
add_filter( 'the_content', 'run_list_shortcode', 7 );

if (!function_exists('tbm_list_shortcode')) {
	
	function tbm_list_shortcode( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'icon_color' => '',
		   ), $atts));

		// Build styles. 
		$class = 'tbm-list ' . $icon_color;

		$list = "<ul class='$class'>". do_shortcode( $content ) ."</ul>";
		return $list;
	}	

	add_shortcode( 'list', 'tbm_list_shortcode' );

}

/**
 * SINGLE LIST ITEM
 * ----------------------------------------------------------------
 */
function run_list_item_shortcode( $content ) {
	global $shortcode_tags;
	$orig_shortcode_tags = $shortcode_tags;
	remove_all_shortcodes(); 
	add_shortcode( 'list_item', 'tbm_list_item_shortcode' );	
	$content = do_shortcode( $content );
	$shortcode_tags = $orig_shortcode_tags; 
	return $content;
} 
add_filter( 'the_content', 'run_list_item_shortcode', 7 );

if (!function_exists('tbm_list_item_shortcode')) {	
	function tbm_list_item_shortcode( $atts, $content = null ) {	
		extract(shortcode_atts(array(
			'icon' => ''
		   ), $atts));

		return "<li><i class='icon-$icon'></i>" . $content . '</li>';		
	}

	add_shortcode( 'list_item', 'tbm_list_item_shortcode' );

}

/**
 * BUTTONS
 * ----------------------------------------------------------------
 */
function run_button_shortcode( $content ) {
	global $shortcode_tags;
	$orig_shortcode_tags = $shortcode_tags;
	remove_all_shortcodes(); 
	add_shortcode( 'button', 'tbm_button_shortcode' );	
	$content = do_shortcode( $content );
	$shortcode_tags = $orig_shortcode_tags; 
	return $content;
} 
add_filter( 'the_content', 'run_button_shortcode', 7 );

if ( ! function_exists( 'tbm_button_shortcode' ) ) {
	function tbm_button_shortcode( $atts, $content = null ) {
		
		extract(shortcode_atts(array(
			'id' 		=> '',
			'title'		=> '',			
			'url'		=> '#',
			'target'	=> '',
			'size'      => '',
			'icon'		=> '',
			'color' 	=> '',
			'type'		=> '',	
		), $atts));

		// Get the first type of multy optional settings.
		$color = strtok($color, ',');
		$type = strtok($type, ',');
		$size = strtok($size, ',');
		
		// variable setup
		$title = ($title) ? ' title="'.$title .'"' : '';
		$id = ($id) ? ' id="'.$id .'"' : '';
		
		// Buttons class and the button color.
		$class = 'tbm-button ';
		$class .= 'button-';
		$class .= $color; 
		
		// Tye type (flat or shaded)
		$class .= ' ' . $type;

		// And the size
		$class .= ' size-';
		$class .= $size;

		$url = "href='$url'";
		if( $icon != 'icon-' ) {
			$icon = "<i class='icon-$icon'></i>";
		}
		
		// target setup
		if		($target == 'blank' || $target == '_blank' || $target == 'new' ) { $target = ' target="_blank"'; }
		elseif	($target == 'parent')	{ $target = ' target="_parent"'; }
		elseif	($target == 'self')		{ $target = ' target="_self"'; }
		elseif	($target == 'top')		{ $target = ' target="_top"'; }
		else	{$target = '';}
			
		$button = "<a $target $title $id $url class='$class' >$icon $content</a>";

		return $button;
	}	

	add_shortcode( 'button', 'tbm_button_shortcode' );

}

/**
 * HIGHLIGHT
 * ----------------------------------------------------------------
 */
function run_highlight_shortcode( $content ) {
	global $shortcode_tags;
	$orig_shortcode_tags = $shortcode_tags;
	remove_all_shortcodes(); 
	add_shortcode( 'highlight', 'tbm_highlight_shortcode' );	
	$content = do_shortcode( $content );
	$shortcode_tags = $orig_shortcode_tags; 
	return $content;
} 
add_filter( 'the_content', 'run_highlight_shortcode', 7 );

if (!function_exists('tbm_highlight_shortcode')) {

	function tbm_highlight_shortcode( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'color' => '',
		   ), $atts));

		$class = 'tbm-highlight';
		$style = '';

		if( ! tbm_Helpers::isHEX( $color ) && $color != '' ) {
			$class .= ' tbm-highlight-';
			$class .= $color;
		} else {
			// If the user didnt give color, the default is #FFA
			// If he did, it will be validated.
			tbm_Helpers::toHEX( $color, '#ffa' );
			$style = "style='background-color: $color'";
		}


		$highlight = "<span $style class='$class'>$content</span>";
		return $highlight;
	}

	add_shortcode( 'highlight', 'tbm_highlight_shortcode' );

}

/**
 * DROPCAPS
 * ----------------------------------------------------------------
 */
if (!function_exists('tbm_dropcap_shortcode')) {

	function tbm_dropcap_shortcode( $atts, $content = null ) {
		extract(shortcode_atts(array(
			'style' => 'default',
		   ), $atts));
	   
		$class  = 'tbm-dropcap ';
		$class .= $style; 
		
		$content = do_shortcode($content);
		$dropcap = '<span class="'.$class.'">'.$content.'</span>';
		
		return $dropcap;
	}
	
	add_shortcode('dropcap', 'tbm_dropcap_shortcode');

}

/**
 * SPOILERS
 * ----------------------------------------------------------------
 */
if (!function_exists('tbm_spoiler')) {

	function tbm_spoiler( $atts, $content = null ) {
		return "<span class='tbm-spoiler'>" . do_shortcode($content) . "</span>";
	}
	
	add_shortcode('spoiler', 'tbm_spoiler');

}

/**
 * PANEL
 * ----------------------------------------------------------------
 */
function run_panel_shortcode( $content ) {
	global $shortcode_tags;
	$orig_shortcode_tags = $shortcode_tags;
	remove_all_shortcodes(); 
	add_shortcode( 'panel', 'tbm_panel_shortcode' );	
	$content = do_shortcode( $content );
	$shortcode_tags = $orig_shortcode_tags; 
	return $content;
} 
add_filter( 'the_content', 'run_panel_shortcode', 7 );

if( ! function_exists('tbm_panel_shortcode') ) {

	function tbm_panel_shortcode( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'type' => '',
			'color' => ''
		), $atts ));

		$color = strtok($color, ',');
		$type = strtok($type, ',');

		return "<div class='tbm-panel $type $color'>" . do_shortcode( $content ) . "</div>";
	}

	add_shortcode( 'panel', 'tbm_panel_shortcode' );

}

/**
 * SPOILERS
 * ----------------------------------------------------------------
 */
if (!function_exists('tbm_label')) {

	function tbm_label( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'color' 	=> '',
			'rounded' 	=> '',
			'type'		=> ''
		), $atts ));

		if( $rounded == 'true' ) $rounded = 'rounded';
		if( $rounded == 'false' ) $rounded = '';

		// Strip the extra tags
		$color = strtok($color, ',');
		$type = strtok($type, ',');

		// Print the shortcode (only content, no other shortcodes inside!)
		return "<span class='tbm-label tbm-label-$color $rounded $type'>$content</span>";
	}
	
	add_shortcode('label', 'tbm_label');

}