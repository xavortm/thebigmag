<?php
/*  --------------------------------------------------------
	Plugin Name: 	The Big Magazine Shortcodes
	Version: 		1.0
	Description: 	Adds shortcodes to easily to your theme.
	Author: 		Alex Dimitrov
	Author URI: 	http://www.xavortm.com
	Plugin URI: 	http://www.demo.xavortm.com/tbm_shortcodes
	Text Domain: 	tbmshortcodes
	License:		GPLv2
	--------------------------------------------------------  */

/**
 * Add the shortcodes editor UI.
 */
if( !class_exists( 'TBMShortcodes' ) ){
	require_once( dirname(__FILE__) . '/admin/shortcodes_editor.php');
}

/**
 * Load shortcodes. They are separated in diferent files acording the 
 * functionality and type of shortcodes.
 *
 * The file shortcode-functions.php will load the shortcodes.
 */
require_once( dirname(__FILE__) . '/shortcode-functions.php');


/**
 * Enqueue scripts and styles for the shortcodes plugin.
 */
if( !function_exists ('tbm_shortcodes_scripts') ) :

	function tbm_shortcodes_scripts() {
		// Add font-awesome stylesheets (minified version. Remove .min to use the regular one)
		wp_enqueue_style( 'font_awesome_stylesheet', plugin_dir_url( __FILE__ ) . 'css/font-awesome/css/font-awesome.min.css' );

		//Register required scripts
		wp_register_script( 'tbm_tabs', plugin_dir_url( __FILE__ ) . 'js/tbm_tabs.js', array ( 'jquery', 'jquery-ui-tabs'), '1.0', true );
		wp_register_script( 'tbm_slider', plugin_dir_url( __FILE__ ) . 'js/unslider.min.js', array ( 'jquery'), '1.0', true );
	}

	add_action( 'wp_enqueue_scripts', 'tbm_shortcodes_scripts' );

endif;

function tbm_shortcodes_styles() {
	wp_register_style( 'tbm_shortcodes_css', plugin_dir_url( __FILE__ ) . 'css/shortcodes.css' );
	wp_enqueue_style( 'tbm_shortcodes_css' );
}
add_action( 'wp_enqueue_scripts', 'tbm_shortcodes_styles', 100 );

/**
 * Style for the editor of the shortcodes
 */
if( !function_exists ('tbm_mce_style') ) :

	function tbm_mce_style() {
		wp_register_style('tbm_editor', plugin_dir_url( __FILE__ ) . 'css/editor.css');	
		wp_enqueue_style('tbm_editor');

		// Add icons array
		wp_enqueue_style('font_awesome_stylesheet', plugin_dir_url( __FILE__ ) . 'css/font-awesome/css/font-awesome.min.css' );
	}

	add_filter( 'admin_head', 'tbm_mce_style'  );
	
endif;