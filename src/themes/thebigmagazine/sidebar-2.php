<?php 
/**
 * Template - Sidebar-2.php
 *
 * Sidebar area located at home page. Right of the latest posts list.
 *
 * @package WordPress
 * @subpackage The Big Magazine
 */ 
?>


<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
	<div class="widget-area">
		<?php dynamic_sidebar( 'sidebar-2' ); ?>
	</div><!-- .widget-area -->
<?php endif; ?>