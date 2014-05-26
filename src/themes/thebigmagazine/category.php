<?php
/**
 * Category page
 *
 * @package  WellThemes
 * @author   Well Themes Team
 * @link 	 http://wellthemes.com
 */

global $smof_data;
?>
<?php get_header(); ?>

<div id="page-content" class='container'>
	<div id="content" class='row'>

		<aside id="sidebar" class="col-lg-3 col-md-3 visible-lg visible-md <?php echo $smof_data['single-page-layout'] ?>">
			<?php get_sidebar(); ?>
		</aside><!-- /sidebar -->

		<div id="main-content" class="col-lg-9 col-md-9">
			<header class="page-heading entry cs2">
				<h2>Category: <strong><?php single_cat_title(); ?></strong></h2>
				<?php if( $smof_data['show_breadcrumbs'] ) TBM_Print::breadcrumbs(); ?>
			</header>	
			<?php if ( have_posts() ) : ?>
			<div class="js-masonry">
				 <?php while ( have_posts() ) : the_post(); ?>
					<?php get_template_part('content'); ?>
				<?php endwhile; ?>
				<?php else : ?>
					<div class="no-posts row">
					<div class="col-lg-6">
						<strong>Sorry, no posts were found.</strong>
						<p>Maybe the search form will help you:</p>
						<?php get_search_form() ?>
					</div>
					<div class="col-lg-6 categories-list">
						<h4>Here are the top 5 categories used.</h4>
						<?php 
						$args = array(
							'orderby' => 'count',
							'order'	=> 'DESC',
							'show_count ' => 1,
							'show_empty'=> 1,
							'number'	=> 5,
							'style'		=> 'none',
						);
						wp_list_categories( $args ); ?>
					</div>

					</div>
				<?php endif; ?>
			</div>
			<footer>
			<?php wp_link_pages() ?>
			</footer>
		</div><!-- /main-content -->

	</div><!-- /content -->
</div><!-- /page-content -->

<?php get_footer(); ?>