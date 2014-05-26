<?php 
/**
 * Template - Sidebar-footer1.php
 *
 * Forth sidebar for footer area.
 *
 * @package WordPress
 * @subpackage The Big Magazine
 */ 
?>


<?php if ( is_active_sidebar( 'sidebar-footer4' ) ) : ?>
	<div class="widget-area">
		<?php dynamic_sidebar( 'sidebar-footer4' ); ?>
	</div><!-- .widget-area -->
<?php endif; ?>