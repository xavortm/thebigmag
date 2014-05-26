<?php 
/**
 * home-slider.php
 *
 * Slider section. 8 columns wide, it can be included everywhere. 
 * Uses slider_tag as options only, to set the wordpress tag that
 * will include posts in the slider.
 *
 * @package WordPress
 * @subpackage The Big Magazine
 */ 

// The options framework global vatiable.
global $data;
?>

<div id="main-slider" class="slider col-lg-9 col-md-9 equalize-slider">
<div id="carousel" class="carousel slide">
	<!-- Wrapper for slides -->
	<div class="carousel-inner">

		<?php // The Query
		$the_query = new WP_Query( 'tag=' . $data['slider_tag'] );

		// Make only the first element active. This is how
		// the bootstrap carousel works. Else it will print nothing.
		$active = true;

		// The Loop
		while ( $the_query->have_posts() ) {
			$the_query->the_post(); 
			 ?>
			
			<div class="item<?php if( $active ) echo ' active'; ?>">
				<?php if( has_post_thumbnail() ) the_post_thumbnail( 'large' ); ?>
				<div class="carousel-caption">
					<h2><a href='<?php the_permalink(); ?>'><?php the_title(); ?></a></h2>
				</div><!-- /carousel caption -->
			</div>
			
			<?php $active = false; ?>
		<?php } // End of loop

		/* Restore original Post Data 
		 * NB: Because we are using new WP_Query we aren't stomping on the 
		 * original $wp_query and it does not need to be reset.
		*/
		wp_reset_postdata();?>

	</div><!-- /carousel-inner -->

	<!-- Controls -->
	<a class="left carousel-control" href="#carousel" data-slide="prev">
		<span class="icon-prev"></span>
	</a><!-- /left carousel-control -->
	<a class="right carousel-control" href="#carousel" data-slide="next">
		<span class="icon-next"></span>
	</a><!-- /right carousel-control -->

</div><!-- /carousel -->
</div><!-- /main-slider -->