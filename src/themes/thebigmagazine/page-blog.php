<?php
/**
 * Template Name: Blog test
 * Description: A Page Template to display blog archives with the sidebar.
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
	
		<div id="main-content" class="col-lg-9 col-md-9 js-masonry">	
			<?php
				// Setup the pagination for the blog template.
				if ( get_query_var('paged') ) {
					$paged = get_query_var('paged');
				} elseif ( get_query_var('page') ) {
					$paged = get_query_var('page');
				} else {
					$paged = 1;
				}
				
				// Arguments for the query. We will use custom
				// query, just because of the pagination and because of
				// clearing purposes. (might not print any post if useing normal loop)
				$args = array(
					'post_status' => 'publish',
					'ignore_sticky_posts' => 1,
					'paged' => $paged
				);			
				
				// The main query, here we will print the content of this template.
				$wp_query = new WP_Query( $args );
				if ( $wp_query -> have_posts() ) :
					while ( $wp_query -> have_posts() ) : $wp_query -> the_post();	
						
						// This is the template for the posts that will be printed.
						// Modifiying the stylings can be done in content.php in same folder.							
						get_template_part('content');

						// Increment the counter for custom pagination.
						$i++;

						
					
					endwhile; // End the while loop
					
					// Reset the query. This is used so we can use the query
					// in other areas of the page. (always reset!)
					wp_reset_query();
				endif; 
			?>
		</div><!-- /main-content -->

	</div><!-- /content -->
</div><!-- /page-content -->

<?php get_footer(); ?>