<?php 
/**
 * Home-category-1.php
 *
 * Featured category section. A few posts from one category, to be
 * displayed on the home page.
 *
 * @package WordPress
 * @subpackage The Big Magazine
 */ 

// The options framework global vatiable.
global $data;

// Use smallcaps one.
$featured_category = strtolower( $data['featured1_category'] );

?>

<section class="category-1">
		<header class='section-header big'>
			<h3 class="section-heading"><?php echo $data['featured1_category'] ?></h3>
		</header>
		<div class="section-content row">
			<div class="featured-post col-lg-9 col-md-9 col-sm-9">
					<?php

					// Display only one post from the featured category.
					$the_query = new WP_Query('category_name=' . $featured_category );	
					
					// The Loop
					if ( $the_query->have_posts() ) {
						while ( $the_query->have_posts() ) {
							$the_query->the_post(); ?>
							<div class="post-thumbnail col-lg-6 col-md-6 col-sm-5 col-xs-3">
								<a href="<?php the_permalink() ?>"><?php if( has_post_thumbnail() ) the_post_thumbnail(); ?></a>
							</div>
							<div class="post col-lg-6 col-md-6 col-sm-7">
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

					$cat_ID = get_cat_ID( $featured_category );

					?>
					
				</div><!-- /featured post -->
			<aside class="similar-posts col-lg-3 col-md-3 col-sm-3">
				<?php TBM_Print::posts( $cat_ID, $data['featured1_limit'] ); ?>
			</aside><!-- /simillar posts -->
		</div><!-- /section-content -->
	</section><!-- /category-1 -->