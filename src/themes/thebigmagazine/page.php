<?php
/**
 * Template: The standart page template
 *
 * The post it self. Display the content of single post.
 *
 * @package WordPress
 * @subpackage The Big Magazine
 */

// Set the settings for sidplaying sidebars.
global $smof_data;

// Set the width if the sidebars are hidden.
if( $smof_data['single_page_layout'] == 'hidden' ) 
	$main_content_width = '12-col-lg';
else 
	$main_content_width = 'col-lg-7 col-md-7';	
?>

<?php get_header(); ?>


<div id="page-content" class='container'>
<section class="row" id="content">

<?php if( $smof_data['single_page_layout'] != 'hidden' ) : ?>
	<aside id="sidebar" class="col-lg-3 col-md-3 visible-lg visible-md <?php echo $smof_data['single-page-layout'] ?>">
		<?php get_sidebar(); ?>
	</aside><!-- /sidebar -->
<?php endif; ?>

<div id="main-content" class="<?php echo $main_content_width ?> ?> ">
	<div class="entry blog">

		<?php if( $smof_data['show_date'] ) : ?><strong>Current date: </strong><span class="date-stamp"><?php the_date( "F j, Y g:i a" ); ?></span><?php endif; ?>
		<?php if( $smof_data['show_modified'] ) : ?><strong>Last Modified: </strong><span class="modified"><?php the_modified_date(); ?></span><?php endif; ?>

		<?php edit_post_link( 'Edit', "<strong class='pull-right edit-link'>[", ']</strong>', $id ); ?>
		<?php if( $smof_data['show_breadcrumbs'] ) TBM_Print::breadcrumbs(); ?>

		<header class='entry-header'>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<span class="author">By: <?php TBM_Print::author_link(); ?></span>
			<span class="comments"><a href="<?php comments_link(); ?>"><?php comments_number('(No Comments)', '(One Comment)', '(% Comments)' );?></a></span>
			<div class="entry-thumbnail"><?php TBM_Print::post_thumbnail(); ?></div>
		</header><!-- /entry-header -->

		<div class="entry-content <?php if($smof_data['show_leading']) echo "leading" ?>">
			<?php the_content(); ?>
		</div><!-- /entry-content -->

		<footer class="entry-info">
			<?php the_tags('<span>Tags: </span>',', ','<br />'); ?>
			
			<div class='titles'>
				<h5 class='pull-left'>Previous article:</h5>
				<h5 class='pull-right'>Next article:</h5>
			</div><!-- /titles -->
			<span class='pull-right'><?php next_post_link(); ?></span>
			<span class='pull-left'><?php previous_post_link(); ?></span>
		</footer><!-- entry-info -->

		<?php comments_template(); ?>
	</div><!-- /entry-blog -->
</div><!-- /main-content -->

<?php if( $smof_data['single_page_layout'] != 'hidden' ) : ?>
<aside id="single-sidebar" class='post-sidebar' class="col-lg-2 col-mg-2 <?php echo $smof_data['single_page_layout']; ?>">
	<?php get_sidebar('single'); ?>
</aside><!-- /single-sidebar -->
<?php endif; ?>

<?php get_footer(); ?>