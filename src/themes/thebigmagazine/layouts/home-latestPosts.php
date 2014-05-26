<?php 
/**
 * Home-latestPosts.php
 *
 * A list of posts in a blog like layout. THese is the 
 * regular "latest posts" section.
 *
 * @package WordPress
 * @subpackage The Big Magazine
 */ 

// The options framework global vatiable.
global $data;
?>

<section class="latest-posts col-lg-9 col-md-9">
	<header class='section-header big'>
		<h3 class="section-heading"><?php echo $data['latestPosts-title'] ?></h3>
	</header>

	<div class="section-content">
		<?php // Start the loop. Used, because we simply list "latest posts" and nothing diferent.
		if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<div class="entry row">
			<div class="entry-thumbnail col-lg-3 col-md-3 col-sm-3 col-xs-3">
				<a href="<?php the_permalink() ?>"><?php TBM_Print::post_thumbnail('medium'); ?></a>
			</div>
			<div class="entry-container col-lg-9 col-md-9 col-sm-9 col-xs-9">
				<h2 class='entry-title'>
					<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
				</h2><!-- /entry-title -->
				<div class="entry-content">
					<?php the_excerpt(); ?>
					<span class="author">By: <?php TBM_Print::author_link(); ?></span>
					<span class="comments"><a href="<?php comments_link(); ?>"><?php comments_number('(No Comments)', '(One Comment)', '(% Comments)' );?></a></span>
					<span class="date"><?php the_date(); ?></span>
				</div>
			</div>
		</div><!-- /entry -->

		<?php endwhile; else: ?>
		<?php endif; ?>

		<?php TBM_Print::pagination(); ?>

	</div><!-- /section-content -->
</section><!-- /latest-posts -->