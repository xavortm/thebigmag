<?php 
/**
 * Home-topNews.php
 *
 * Display the latest and most favorite posts. The query from this file
 * calls the posts from this week with most comments and add "NEW" to
 * the ones that are posted today.
 *
 * @package WordPress
 * @subpackage The Big Magazine
 */ 

// The options framework global vatiable.
global $data;

?>

<div id="top-news" class="top-news box-panel col-lg-3 col-md-3 equalize-slider">
	<div class="news-wrapper">
	<header class="section-heading">
		<h3><i class="<?php echo $data["top_news_icon"] ?>"> </i><?php echo $data["top_news_title"] ?></h3>
	</header><!-- /section-heading -->
		<ul>
			<?php
			// Today's string
			$today = $data['top_news_today'];
			$limit = $data['top_news_limit'];

			// Getting the most commented (active) topics this week.
			$the_query = new WP_Query( '&orderby=comment_count&posts_per_page=' . $limit );

			// Do the main job: print latest posts
			if ( $the_query->have_posts() ) {
				while ( $the_query->have_posts() ) {

					// Now just print the content.
					$the_query->the_post(); ?> 
					<li>
						<?php if( date('Yz') == get_the_time('Yz') ) echo '<span class="new">'. $today .'</span>'; ?>
						<a href="<?php the_permalink() ?>"><?php the_title(); ?></a>
					</li> 
				<?php }
			} else {
				// no posts found
				TBM_Print::message( 'No posts found!' );
			}
			/* Restore original Post Data */
			wp_reset_postdata(); ?>

		</ul><!-- /list wrapper -->
	</div><!-- /news-wrapper -->
</div><!-- /top-news -->