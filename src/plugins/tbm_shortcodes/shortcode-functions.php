<?php

/**
 * Load shortcodes
 *
 * Here we load the diferent types of shortcodes.
 * Also if required, some additional changes can be made here
 * and added diferent functionality. (hooks)
 *
 * Comment the ones you don`t need. Also add additional ones  
 * from here.
 * --------------------------------------------------------------
 */

// Help functions
require_once( dirname(__FILE__) . '/lib/php/helpers.class.php' );

// Load Social shortcodes. (facebook, twitter, etc.)
require_once( dirname(__FILE__) . '/shortcodes/social.php' );

// Load Media shortcodes. (video, images, audio, etc.)
require_once( dirname(__FILE__) . '/shortcodes/media.php' );

// Load Typography shortcodes. (buttons, column, lists, etc.)
require_once( dirname(__FILE__) . '/shortcodes/typography.php' );

// Load Queries shortcodes. (recent posts, list authors, etc.)
require_once( dirname(__FILE__) . '/shortcodes/query.php' );

// Load Elements shortcodes. (search form, sliders, etc.)
require_once( dirname(__FILE__) . '/shortcodes/elements.php' );

// Load Tabs shortcodes. 
require_once( dirname(__FILE__) . '/shortcodes/tabs.php' );

// Load Slider shortcodes. 
require_once( dirname(__FILE__) . '/shortcodes/slider.php' );