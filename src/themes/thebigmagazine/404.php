<?php
/**
 * Template: 404.php
 *
 * @package WordPress
 * @subpackage The Big Magazine
 */

// Set the settings for sidplaying sidebars.
global $smof_data;
?>

<?php get_header(); ?>


<div id="page-content" class='container'>
<section class="row" id="content">

<aside id="sidebar" class="col-lg-3 col-md-3 visible-lg visible-md">
	<?php get_sidebar(); ?>
</aside><!-- /sidebar -->

<div id="main-content" class="col-lg-7 col-md-7">
	<div class="entry blog page404">

		<strong>Current date: </strong><span class="date-stamp"><?php the_date( "F j, Y g:i a" ); ?></span>
		<strong>Last Modified: </strong><span class="modified"><?php the_modified_date(); ?></span>
		<?php edit_post_link( "edit", "<strong class='pull-right edit-link'>[", ']</strong>', $id ); ?>
		<?php if( $smof_data['show_breadcrumbs'] ) TBM_Print::breadcrumbs(); ?>

		<header class='page-header'>
			<h1 class="entry-title">Error 404</h1>
			<p>Sorry, but the page you were looking for was not found.</p>
		</header>

		<?php get_search_form() ?>

		<?php if( $smof_data['show_similar'] ) : ?>
		<div class="similar-posts">
			<h3>Meanwhile, check the <strong>Recent posts:</strong> </h3>
			<?php TBM_Print::posts(0, 50); ?>
		</div><!-- /similar-posts -->
		<?php endif; ?>

		<?php comments_template(); ?>
	</div><!-- /entry-blog -->
</div><!-- /main-content -->

<aside id="single-sidebar" class='post-sidebar' class="col-lg-2 col-mg-2">
	<?php get_sidebar('single'); ?>
</aside><!-- /single-sidebar -->

<?php get_footer(); ?>