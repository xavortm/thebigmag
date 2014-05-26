<?php
header('Content-type: text/css');

require '/../../../wp-load.php'; // load wordpress bootstrap, this is what I don't like
global $smof_data;
// and from here on generate the css file and having access to the
// functions provided by wordpress
?>


a { color: <?php echo $smof_data['color_link'] ?>}
a:hover { color: <?php echo $smof_data['color_hover_link'] ?>; }

/* BACKGROUND */
#branding h1.branding.custom-logo  {background: transparent url("<?php echo $smof_data['logo'] ?>") no-repeat top center;}
aside#sidebar .widget-title,header#page-header,
nav#page-navigation ul.nav li a:hover,
.search-section .searchform input, .search-section .searchform button,
aside#single-sidebar .widget.widget_recent_entries ul li a:hover,
#page-footer .widget ul li a:hover,
aside#sidebar .widget.widget_nav_menu ul.menu li a:hover,
aside.latest-posts-sidebar .widget-title { background: <?php echo $smof_data['color_main'] ?> }

.news-wrapper {	border-top: 8px solid <?php echo $smof_data['color_main'] ?> }
.section-heading,
aside#sidebar .light .widget.widget_nav_menu ul.menu a:hover {color: <?php echo $smof_data['color_main'] ?> ;}
nav#page-navigation {background: <?php echo $smof_data['color_menu_bg'] ?>}