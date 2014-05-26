<?php 
/**
 * Three-Categories - print 3 categories by user's choise. One main post and X following
 *
 * @package WordPress
 * @subpackage The Big Magazine
 */ 

// The options framework global vatiable.
global $data;

?>

<div id="three-categories" class='row'>
	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
		<header class='section-header big'>
			<h3 class="section-heading"><?php echo $data['three_cat_1_title'] ?></h3>
		</header>

		<?php

		// Display only one post from the featured category.
		$the_query = new WP_Query('category_name=' . $data['three_cat_1_title'] );	
		
		// The Loop
		if ( $the_query->have_posts() ) {
			while ( $the_query->have_posts() ) {
				$the_query->the_post(); ?>
				<a href="<?php the_permalink() ?>" class='entry-thumbnail'><?php TBM_Print::post_thumbnail( 'medium' ); ?></a>
				<div class="post">
					<header>
						<h2 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
						<p class="post-meta"><a href="#" class="comments"><?php wp_count_comments( $post->ID ); ?></a></p>
					</header>
					<div class="post-content">
						<?php the_excerpt() ?>
					</div><!-- /post-content -->
				</div><!-- /post -->
			<?php 

			// Stop the loop, we want only one post to be shown. (instead of adding arguments to the query)
			// Also, it will prevent bugs when the user does not suply category. That way It wont show all posts.
			break;
		}
		} else {
			TBM_Print::message("No posts found!");
		}
		/* Restore original Post Data */
		wp_reset_postdata();

		

		// Get the category ID for calling TBM_Print::posts();
		$cat_id = get_cat_ID( $data['three_cat_1_title'] );

		?>

		<div class="similar-posts">
			<?php TBM_Print::posts( $cat_id, $data['three_cat_limit'], 1 ); ?>
		</div>


	<!-- ======================================================================================================= -->

	</div><!-- / col end -->

	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
		<header class='section-header big'>
			<h3 class="section-heading"><?php echo $data['three_cat_2_title'] ?></h3>
		</header>

		<?php

		// Display only one post from the featured category.
		$the_query = new WP_Query('category_name=' . $data['three_cat_2_title'] );	
		
		// The Loop
		if ( $the_query->have_posts() ) {
			while ( $the_query->have_posts() ) {
				$the_query->the_post(); ?>
				<a href="<?php the_permalink() ?>" class='entry-thumbnail'><?php if( has_post_thumbnail() ) the_post_thumbnail( 'medium' ); ?></a>
				<div class="post">
					<header>
						<h2 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
						<p class="post-meta"><a href="#" class="comments"><?php wp_count_comments( $post->ID ); ?></a></p>
					</header>
					<div class="post-content">
						<?php the_excerpt() ?>
					</div><!-- /post-content -->
				</div><!-- /post -->
			<?php 

			// Stop the loop, we want only one post to be shown. (instead of adding arguments to the query)
			// Also, it will prevent bugs when the user does not suply category. That way It wont show all posts.
			break;
		}
		} else {
			TBM_Print::message( "No posts found!" );
		}
		/* Restore original Post Data */
		wp_reset_postdata();

		// Get the category ID for calling TBM_Print::posts();
		$cat_id = get_cat_ID( $data['three_cat_2_title'] );

		?>

		<div class="similar-posts">
			<?php TBM_Print::posts( $cat_id, $data['three_cat_limit'], 1 ); ?>
		</div>

	</div><!-- / col end -->


	<!-- ======================================================================================================= -->
	

	<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
		<header class='section-header big'>
			<h3 class="section-heading"><?php echo $data['three_cat_3_title'] ?></h3>
		</header>

		<?php

		// Display only one post from the featured category.
		$the_query = new WP_Query('category_name=' . $data['three_cat_3_title'] );	
		
		// The Loop
		if ( $the_query->have_posts() ) {
			while ( $the_query->have_posts() ) {
				$the_query->the_post(); ?>
				<a href="<?php the_permalink() ?>" class='entry-thumbnail'><?php if( has_post_thumbnail() ) the_post_thumbnail( 'medium' ); ?></a>
				<div class="post">
					<header>
						<h2 class="post-title"><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
						<p class="post-meta"><a href="#" class="comments"><?php wp_count_comments( $post->ID ); ?></a></p>
					</header>
					<div class="post-content">
						<?php the_excerpt() ?>
					</div><!-- /post-content -->
				</div><!-- /post -->
			<?php 

			// Stop the loop, we want only one post to be shown. (instead of adding arguments to the query)
			// Also, it will prevent bugs when the user does not suply category. That way It wont show all posts.
			break;
		}
		} else {
			TBM_Print::message( "No posts found!" );
		}
		/* Restore original Post Data */
		wp_reset_postdata();

		// Get the category ID for calling TBM_Print::posts();
		$cat_id = get_cat_ID( $data['three_cat_3_title'] );
		?>

		<div class="similar-posts">
			<?php TBM_Print::posts( $cat_id, $data['three_cat_limit'], 1 ); ?>
		</div>

	</div><!-- / col end -->

</div><!-- /three-categories -->