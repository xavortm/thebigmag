<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="page-content">
 *
 * @package WordPress
 * @subpackage The Big Magazine
 */

global $smof_data;
?><!DOCTYPE html>
<html <?php language_attributes(); ?>
<head>
	<title><?php wp_title( '-', true, 'right' ); ?></title>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php bloginfo("description"); ?>">
	<meta name="author" content="<?php bloginfo("author"); ?>">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header id="page-header">
		<!-- PAGE BRANDING -->
		<section class="container heading">
			<div class="row">
				<div class="col-lg-4 col-md-4 description hidden-sm hidden-xs">
					<p class="daily-message"><?php echo $smof_data['daily_message'] ?></p>
					<p class="current-date"><?php echo date("F j, Y, g:i a"); ?></p>
					<?php wp_nav_menu( array( 'theme_location' => 'secoundary', 'menu_class' => 'secoundary-navigation' ) ); ?>

				</div><!-- /description -->
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6" id="branding">
					<h1 class="branding <?php if( $smof_data['logo'] ) echo "custom-logo"; ?>">
						<?php if( ! $smof_data['logo'] ) : ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
						<?php else: ?>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo $smof_data['logo'] ?>" alt="" title='<?php bloginfo( 'name' ); ?>'></a>
						<?php endif; ?>
					</h1>
				</div><!-- /branding -->
				<div class="col-lg-4 col-md-4 col-sm-8 col-xs-6 search-section">
					<div class="signup btn-group">
						
						<?php get_template_part('element','login'); ?>

					</div><!-- /signup -->
					<?php get_search_form(); ?>
				</div><!-- search-section -->
			</div><!-- /row -->
		</section><!-- /heading -->
	</header><!-- /page-header -->

	<nav id="page-navigation" class="navbar navbar-default " role="navigation">
		<!-- PAGE NAVIGATION -->
		<section class="container ">
				<?php wp_nav_menu( array('theme_location' => 'primary', 'container' => false, 'menu_class' => 'mastheadnav dropdown', 'items_wrap' => '<ul class="nav navbar-nav col-lg-12">%3$s' )); ?>
		</section><!-- /container -->
	</nav><!-- /navigation -->