<?php 
/**
 * Template - Sidebar-footer1.php
 *
 * First sidebar for footer area.
 *
 * @package WordPress
 * @subpackage The Big Magazine
 */ 
?>


<?php if ( is_active_sidebar( 'sidebar-footer3' ) ) : ?>
	<div class="widget-area">
		<?php dynamic_sidebar( 'sidebar-footer3' ); ?>
	</div><!-- .widget-area -->
<?php endif; ?>