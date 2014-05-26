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
$hidden =  $smof_data['single-page-layout'] == 'hidden' ? true : false;
?>


<?php get_header(); ?>


<div id="page-content" class='container'>
<section class="row" id="content">

<?php if( !$hidden ) : ?>
	<aside id="sidebar" class="col-lg-3 col-md-3 visible-lg visible-md <?php echo $smof_data['single-page-layout'] ?>">
		<?php get_sidebar(); ?>
	</aside><!-- /sidebar -->
<?php endif; ?>

<div id="main-content" class="<?php if( !$hidden ) : ?> col-lg-7 col-md-7 <?php endif; ?> ">
	<div class="page search">

		<?php if( $smof_data['show_breadcrumbs'] ) TBM_Print::breadcrumbs(); ?>

		<header class='page-header'>
			<h2><?php printf( __( 'Search Results for: <strong>%s</strong>', 'thebigmag' ), get_search_query() ); ?></h2>
		</header><!-- /entry-header -->
		<div class="js-masonry">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'content', get_post_format() ); ?>
			<?php endwhile; ?>
		</div>

	</div><!-- /page -->
</div><!-- /main-content -->

<?php if ( !$hidden ) : ?>
<aside id="single-sidebar" class='post-sidebar' class="col-lg-2 col-mg-2">
	<?php get_sidebar('single'); ?>
</aside><!-- /single-sidebar -->
<?php endif; ?>

<?php get_footer(); ?>