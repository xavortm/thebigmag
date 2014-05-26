<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage The Big Magazine
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('entry'); ?>

	<header class="entry-header">
		<a href="<?php the_permalink() ?>" class='entry-thumbnail'><?php TBM_Print::post_thumbnail(); ?></a>
		<h2 class='entry-title'>
			<a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
		</h2><!-- /entry-title -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<div class="entry-meta">
			<span class="author">By: <?php TBM_Print::author_link(); ?></span>
			<span class="comments"><a href="<?php comments_link(); ?>"><?php comments_number('(No Comments)', '(One Comment)', '(% Comments)' );?></a></span>
			<span class="date"><?php the_date(); ?></span>
		</div>
		

		<?php 
		if( is_single() OR is_page() ) {
			the_content();
			TBM_Print::pagination();
		} else {
			the_excerpt(); 
		}
		?>

	</div><!-- /entry-content -->

</article><!-- #post -->
