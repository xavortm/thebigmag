<?php

add_action('init','of_options');

if (!function_exists('of_options'))
{
	function of_options()
	{
		// Access the WordPress Categories via an Array
		$of_categories 		= array();  
		$of_categories_obj 	= get_categories('hide_empty=0');
		foreach ($of_categories_obj as $of_cat) {
			$of_categories[$of_cat->cat_ID] = $of_cat->cat_name;}
		$categories_tmp 	= array_unshift($of_categories, "Select a category:");    
		   
		// Access the WordPress Pages via an Array
		$of_pages 			= array();
		$of_pages_obj 		= get_pages('sort_column=post_parent,menu_order');    
		foreach ($of_pages_obj as $of_page) {
			$of_pages[$of_page->ID] = $of_page->post_name; }
		$of_pages_tmp 		= array_unshift($of_pages, "Select a page:");       
	
		// Testing 
		$of_options_select 	= array("one","two","three","four","five"); 
		$of_options_radio 	= array("one" => "One","two" => "Two","three" => "Three","four" => "Four","five" => "Five");
		
		// Sample Homepage blocks for the layout manager (sorter)
		$of_options_homepage_blocks = array
		( 
			"disabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_one"		=> "Block One",
				"block_two"		=> "Block Two",
				"block_three"	=> "Block Three",
			), 
			"enabled" => array (
				"placebo" 		=> "placebo", //REQUIRED!
				"block_four"	=> "Block Four",
			),
		);


		//Stylesheets Reader
		$alt_stylesheet_path = LAYOUT_PATH;
		$alt_stylesheets = array();
		
		if ( is_dir($alt_stylesheet_path) ) 
		{
			if ($alt_stylesheet_dir = opendir($alt_stylesheet_path) ) 
			{ 
				while ( ($alt_stylesheet_file = readdir($alt_stylesheet_dir)) !== false ) 
				{
					if(stristr($alt_stylesheet_file, ".css") !== false)
					{
						$alt_stylesheets[] = $alt_stylesheet_file;
					}
				}    
			}
		}


		//Background Images Reader
		$bg_images_path = get_stylesheet_directory(). '/images/bg/'; // change this to where you store your bg images
		$bg_images_url = get_template_directory_uri().'/images/bg/'; // change this to where you store your bg images
		$bg_images = array();
		
		if ( is_dir($bg_images_path) ) {
			if ($bg_images_dir = opendir($bg_images_path) ) { 
				while ( ($bg_images_file = readdir($bg_images_dir)) !== false ) {
					if(stristr($bg_images_file, ".png") !== false || stristr($bg_images_file, ".jpg") !== false) {
						natsort($bg_images); //Sorts the array into a natural order
						$bg_images[] = $bg_images_url . $bg_images_file;
					}
				}    
			}
		}
		

		/*-----------------------------------------------------------------------------------*/
		/* TO DO: Add options/functions that use these */
		/*-----------------------------------------------------------------------------------*/
		
		//More Options
		$uploads_arr 		= wp_upload_dir();
		$all_uploads_path 	= $uploads_arr['path'];
		$all_uploads 		= get_option('of_uploads');
		$other_entries 		= array("Select a number:","1","2","3","4","5","6","7","8","9","10","11","12","13","14","15","16","17","18","19");
		$body_repeat 		= array("no-repeat","repeat-x","repeat-y","repeat");
		$body_pos 			= array("top left","top center","top right","center left","center center","center right","bottom left","bottom center","bottom right");
		
		// Image Alignment radio box
		$of_options_thumb_align = array("alignleft" => "Left","alignright" => "Right","aligncenter" => "Center"); 
		
		// Image Links to Options
		$of_options_image_link_to = array("image" => "The Image","post" => "The Post"); 


/*-----------------------------------------------------------------------------------*/
/* The Options Array */
/*-----------------------------------------------------------------------------------*/

// Set the Options Array
global $of_options;
$of_options = array();

/*-----------------------------------------------------------------------------------*/
/* Home page options */
/*-----------------------------------------------------------------------------------*/
$of_options[] = array( 	
	"name" 		=> "Home Page",
	"type" 		=> "heading",
	"icon"		=> ADMIN_IMAGES . "icon-home.png"
);

	$of_options[] = array(
		"name"		=> __("Logo", "thebigmag"),
		"id"		=> 'logo',
		"desc"		=> __("Select your logo 370x76px MAX", "thebigmag"),
		"std"		=> "",
		"type"		=> "media",
		"mod"		=> "min"
	);

	$of_options[] = array( 	
		"name" 		=> "Hello there!",
		"desc" 		=> "",
		"id" 		=> "introduction",
		"std" 		=> "<h3 style=\"margin: 0 0 10px;\">Welcome to the TheBigMag theme settings!</h3>
		<p>Welcome to the options pannel of TheBigMag theme.Setup everything you need here, and dont bother touching code!</p>",
		"icon" 		=> true,
		"type" 		=> "info"
	);

	$of_options[] = array(
		"name"		=> __("Daily Message", "thebigmag"),
		"id"		=> 'daily_message',
		"desc"		=> __("Message seen in every page in the header.", "thebigmag"),
		"std"		=> __("Your daily message", "thebigmag"),
		"icon"		=> true,
		"type"		=> "text"
	);

	$of_options[] = array(
		"name"		=> __("Slider Tag group", "thebigmag"),
		"id"		=> 'slider_tag',
		"desc"		=> __("What is the tag, that will include posts in the slider section", "thebigmag"),
		"std"		=> __("featured", "thebigmag"),
		"icon"		=> true,
		"type"		=> "text"
	);

	/* -------------- TOP WEEKLY POSTS ---------------- */

	$of_options[] = array( 	
		"name" 		=> "Section: Top Weekly",
		"desc" 		=> "",
		"id" 		=> "categories",
		"std" 		=> "<h3>Section: Top Weekly</h3>",
		"icon" 		=> true,
		"type" 		=> "info"
	);

	$of_options[] = array(
		"name"		=> __("Section: Top Weekly Posts title", "thebigmag"),
		"id"		=> 'top_news_title',
		"desc"		=> __("Write the top posts title section here. (this is the one right of the sider)", "thebigmag"),
		"std"		=> __("Latest and most commented news", "thebigmag"),
		"icon"		=> true,
		"type"		=> "text"
	);

	$of_options[] = array(
		"name"		=> __("Icon for the title", "thebigmag"),
		"id"		=> 'top_news_icon',
		"desc"		=> __("Place the icon class. You can find them all in a link at the documentation.", "thebigmag"),
		"std"		=> "fa fa-star",
		"icon"		=> true,
		"type"		=> "text"
	);

	$of_options[] = array(
		"name"		=> __("Text for today's news", "thebigmag"),
		"id"		=> 'top_news_today',
		"desc"		=> __("Write how to look the today's news. Standart is NEW but you can write TODAY.", "thebigmag"),
		"std"		=> __("NEW", "thebigmag"),
		"icon"		=> true,
		"type"		=> "text"
	);

	$of_options[] = array(
		"name"		=> __("Ammount of posts shown", "thebigmag"),
		"id"		=> 'top_news_limit',
		"desc"		=> __("How many to be listed. Tip - optimise them to be equal to slider height", "thebigmag"),
		"std"		=> "5",
		"type"		=> "sliderui",
		"max"		=> "15",
		"step"		=> "1"
	);

	/* -------------- CATEGORIES ---------------- */

	$of_options[] = array( 	
		"name" 		=> "Section: Categories",
		"desc" 		=> "",
		"id" 		=> "categories",
		"std" 		=> "<h3>Section: Categories</h3>",
		"icon" 		=> true,
		"type" 		=> "info"
	);

	$of_options[] = array(         
		"name" 			=> "Display the categories",
		"desc" 			=> "Set on if you want to see the categories listed in the home page.",
		"id" 			=> "categories_switch",
		"std" 			=> 1,
		"type" 			=> "switch"
	);

	$of_options[] = array(
		"name"		=> __("Categories List Title", "thebigmag"),
		"id"		=> 'categories_title',
		"desc"		=> __("Write the title of categories list section in the homepage.", "thebigmag"),
		"std"		=> __("Top Categories", "thebigmag"),
		"icon"		=> true,
		"type"		=> "text"
	);

	$of_options[] = array(
		"name"		=> __("First Category", "thebigmag"),
		"id"		=> 'categories_first',
		"desc"		=> __("Select which category will be displayed. Subcategories from it will be listed below.", "thebigmag"),
		"type"		=> "select",
		"options"	=> $of_categories
	);

	$of_options[] = array(
		"name"		=> __("Secound Category", "thebigmag"),
		"id"		=> 'categories_secound',
		"desc"		=> __("Select which category will be displayed. Subcategories from it will be listed below.", "thebigmag"),
		"type"		=> "select",
		"options"	=> $of_categories
	);

	$of_options[] = array(
		"name"		=> __("Third Category", "thebigmag"),
		"id"		=> 'categories_third',
		"desc"		=> __("Select which category will be displayed. Subcategories from it will be listed below.", "thebigmag"),
		"type"		=> "select",
		"options"	=> $of_categories
	);

	$of_options[] = array(
		"name"		=> __("Fourth Category", "thebigmag"),
		"id"		=> 'categories_fourth',
		"desc"		=> __("Select which category will be displayed. Subcategories from it will be listed below.", "thebigmag"),
		"type"		=> "select",
		"options"	=> $of_categories
	);

	$of_options[] = array(
		"name"		=> __("Number of categories", "thebigmag"),
		"id"		=> 'categories_limit',
		"desc"		=> __("Select how many subcategories will be displayed.", "thebigmag"),
		"type"		=> "sliderui",
		"min"		=> "1",
		"max"		=> "20",
		"step"		=> "1",
		"std"		=> "3"
	);

	/* -------------- CATEGORIES ---------------- */

	$of_options[] = array( 	
		"name" 		=> "Section: Featured category 1",
		"desc" 		=> "",
		"id" 		=> "categories",
		"std" 		=> "<h3>Section: Featured category 1</h3>",
		"icon" 		=> true,
		"type" 		=> "info"
	);

	$of_options[] = array(         
		"name" 		=> "Display the Section",
		"desc" 		=> "Set on if you want to see the section in home page.",
		"id" 		=> "featured1_switch",
		"std" 		=> 1,
		"type" 		=> "switch"
	);

	$of_options[] = array(
		"name"		=> __("Featured Category", "thebigmag"),
		"id"		=> 'featured1_category',
		"desc"		=> __("Select the featured category you want to display", "thebigmag"),
		"type"		=> "select",
		"options"	=> $of_categories
	);

	$of_options[] = array(
		"name"		=> __("Number of posts", "thebigmag"),
		"id"		=> 'featured1_limit',
		"desc"		=> __("Select how many posts will be displayed on the right.", "thebigmag"),
		"type"		=> "sliderui",
		"min"		=> "1",
		"max"		=> "8",
		"step"		=> "1",
		"std"		=> "3"
	);

	$of_options[] = array( 	
		"name" 		=> "Section: Three Categires",
		"desc" 		=> "",
		"id" 		=> "categories",
		"std" 		=> "<h3>Section: Three Categires</h3><p>Select 3 categories that will be displayed after the featured category section. This will be 1 featured (the latest one) and X posts after it. The posts are ordered last first.</p>",
		"icon" 		=> true,
		"type" 		=> "info"
	);

	$of_options[] = array(
		"name"		=> __("Three categories: 1th", "thebigmag"),
		"id"		=> 'three_cat_1_title',
		"desc"		=> __("First category from the 3 col section.", "thebigmag"),
		"type"		=> "select",
		"options"	=> $of_categories
	);

	$of_options[] = array(
		"name"		=> __("Three categories: 2th", "thebigmag"),
		"id"		=> 'three_cat_2_title',
		"desc"		=> __("Secound category from the 3 col section.", "thebigmag"),
		"type"		=> "select",
		"options"	=> $of_categories
	);

	$of_options[] = array(
		"name"		=> __("Three categories: 3th", "thebigmag"),
		"id"		=> 'three_cat_3_title',
		"desc"		=> __("Third category from the 3 col section.", "thebigmag"),
		"type"		=> "select",
		"options"	=> $of_categories
	);

	$of_options[] = array(
		"name"		=> __("Number of posts", "thebigmag"),
		"id"		=> 'three_cat_limit',
		"desc"		=> __("Select how many posts will be displayed on the bottom.", "thebigmag"),
		"type"		=> "sliderui",
		"min"		=> "1",
		"max"		=> "8",
		"step"		=> "1",
		"std"		=> "3"
	);

	/* -------------- LATEST POSTS ---------------- */

	$of_options[] = array( 	
		"name" 		=> "Section: Latest posts",
		"desc" 		=> "",
		"id" 		=> "latestPosts",
		"std" 		=> __("<h3>Section: Latest posts</h3><p>The posts list displayed on home page. This is a blog like section with X amount of posts. No pagination is used.</p>", 'thebigmag'),
		"icon" 		=> true,
		"type" 		=> "info"
	);

	$of_options[] = array(
		"name"		=> __("Text for today's news", "thebigmag"),
		"id"		=> 'latestPosts-title',
		"desc"		=> __("A list of the latest posts on the blog page. (news)", "thebigmag"),
		"std"		=> __("Latest Posts", "thebigmag"),
		"icon"		=> true,
		"type"		=> "text"
	);

/*-----------------------------------------------------------------------------------*/
/* Page Options */
/*-----------------------------------------------------------------------------------*/

$of_options[] = array( 	
	"name" 		=> "Page Options",
	"type" 		=> "heading",
	"icon"		=> ADMIN_IMAGES . "icon-docs.png"
);

	// The settngs for the sidebar. What is returned from this option
	// is a class for the sidebar section. If its 'pull-left" then the sidebar
	// will be located on the left side of the page. "Hidden" ia buld in
	// botstrap class that wont allow the sidebar to be displayed.'
	$url =  ADMIN_DIR . 'assets/images/';
	$of_options[] = array(
		"name"		=> __("Main Layout", "thebigmag"),
		"id"		=> 'single_page_layout',
		"desc"		=> __("Select main content and sidebar alignment. Choose between left or right sidebar location.", "thebigmag"),
		"std" 		=> "3cm.css",
		"type"		=> "images",
		"options"         => array(
			'pull-right' 		=> $url . '3cr.png',
			'hidden' 			=> $url . '1col.png',
			'pull-left' 		=> $url . '3cm.png',
		)
	);

	$of_options[] = array(         
		"name" 		=> "Show Breadcrumbs on all pages",
		"desc" 		=> "Select On or off. Breadcrumbs will be displayed in all pages they are made for.",
		"id" 		=> "show_breadcrumbs",
		"std" 		=> 1,
		"type" 		=> "switch"
	);

	$of_options[] = array(         
		"name" 		=> "Use Leading Text",
		"desc" 		=> "Select ON to make the first paragraph of your posts bolder.",
		"id" 		=> "show_leading",
		"std" 		=> 1,
		"type" 		=> "switch"
	);

	$of_options[] = array(         
		"name" 		=> "Show posts from same category",
		"desc" 		=> "Select ON to show posts from same category under each single article page",
		"id" 		=> "show_similar",
		"std" 		=> 1,
		"type" 		=> "switch"
	);

	$of_options[] = array(         
		"name" 		=> "Display 'Last Modified' text.",
		"desc" 		=> "Use this to show when the article/page was lastly modified.",
		"id" 		=> "show_modified",
		"std" 		=> 1,
		"type" 		=> "switch"
	);

	$of_options[] = array(         
		"name" 		=> "Display 'Current Date' text.",
		"desc" 		=> "Use this to show the currrent day and time in single page and articles..",
		"id" 		=> "show_date",
		"std" 		=> 1,
		"type" 		=> "switch"
	);

	$of_options[] = array(         
		"name" 		=> "Use default thumbnail.",
		"desc" 		=> "Set to ON to show the default 'No Thumbnail' image when one is not set.",
		"id" 		=> "show_default_thumbnail",
		"std" 		=> 1,
		"type" 		=> "switch"
	);


/*-----------------------------------------------------------------------------------*/
/* Banner Settings */
/*-----------------------------------------------------------------------------------*/

$of_options[] = array( 	
	"name" 		=> "Banner Options",
	"type" 		=> "heading",
	"icon"		=> ADMIN_IMAGES . "icon-add.png"
);

	$of_options[] = array(
		"name"		=> __("Under Page Banner Image", "thebigmag"),
		"id"		=> 'banner_underContent_image',
		"desc"		=> __("Select the banner image (jpg, png or gif)", "thebigmag"),
		"std"		=> "",
		"type"		=> "media",
		"mod"		=> "min"
	);

	$of_options[] = array(
		"name"		=> __("Under Page Banner Link", "thebigmag"),
		"id"		=> 'banner_underContent_link',
		"desc"		=> __("Set where you want the banner under the comments ara to be linking to.", "thebigmag"),
		"std"		=> "#",
		"type"		=> "text"
	);


	$of_options[] = array(
		"name"		=> __("Main Single page Banner Image", "thebigmag"),
		"id"		=> 'banner_mainSinglePage_image',
		"desc"		=> __("Select the banner image (jpg, png or gif)", "thebigmag"),
		"std"		=> "",
		"type"		=> "media",
		"mod"		=> "min"
	);

	$of_options[] = array(
		"name"		=> __("Main Single page Banner Link", "thebigmag"),
		"id"		=> 'banner_mainSinglePage_link',
		"desc"		=> __("This banner will be displayed above the title of single posts.", "thebigmag"),
		"std"		=> "#",
		"type"		=> "text"
	);

	
/*-----------------------------------------------------------------------------------*/
/* Site Stylings */
/*-----------------------------------------------------------------------------------*/

$of_options[] = array( 	
	"name" 		=> "Custom Style",
	"type" 		=> "heading",
	"icon"		=> ADMIN_IMAGES . "icon-paint.png"
);

	$of_options[] = array(         
		"name" 		=> "Main Site Color",
		"id" 		=> "color_main",
		"std" 		=> "#1670cc",
		"type" 		=> "color"
	);

	$of_options[] = array(         
		"name" 		=> "Link Color",
		"id" 		=> "color_link",
		"std" 		=> "#396a9d",
		"type" 		=> "color"
	);

	$of_options[] = array(         
		"name" 		=> "Link Hover Color",
		"id" 		=> "color_hover_link",
		"std" 		=> "#264d76",
		"type" 		=> "color"
	);

	$of_options[] = array(         
		"name" 		=> "Menu Background Color",
		"id" 		=> "color_menu_bg",
		"std" 		=> "#262626",
		"type" 		=> "color"
	);

	/* WIDGET SETTINGS */

	$of_options[] = array(         
		"name" 		=> "Widget Menu Style",
		"desc" 		=> "Select ON to use the default dark style or OFF to use the light skin.",
		"id" 		=> "widget_menu_skin",
		"std" 		=> "dark",
		"type" 		=> "select",
		"options"	=> array( 'light', 'dark' ),
	);



/*-----------------------------------------------------------------------------------*/
/* Backup options */
/*-----------------------------------------------------------------------------------*/
$of_options[] = array( 	
	"name" 		=> "Backup Options",
	"type" 		=> "heading",
	"icon"		=> ADMIN_IMAGES . "icon-slider.png"
);
				
	$of_options[] = array( 	
		"name" 		=> "Backup and Restore Options",
		"id" 		=> "of_backup",
		"std" 		=> "",
		"type" 		=> "backup",
		"desc" 		=> 'You can use the two buttons below to backup your current options, and then restore it back at a later time. This is useful if you want to experiment on the options but would like to keep the old settings in case you need it back.',
	);
					
	$of_options[] = array( 	
		"name" 		=> "Transfer Theme Options Data",
		"id" 		=> "of_transfer",
		"std" 		=> "",
		"type" 		=> "transfer",
		"desc" 		=> 'You can tranfer the saved options data between different installs by copying the text inside the text box. To import data from another install, replace the data in the text box with the one from another install and click "Import Options".',
	);
				
	}//End function: of_options()

}//End chack if function exists: of_options()
?>
