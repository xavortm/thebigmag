<?php 
/**
 * Template - Sidebar-single.php
 *
 * @package WordPress
 * @subpackage The Big Magazine
 */ 
global $data;
?>


<?php if ( is_active_sidebar( 'sidebar-single' ) ) : ?>
	<div class="widget-area <?php echo $data['widget_menu_skin'] ?>">
		<?php dynamic_sidebar( 'sidebar-single' ); ?>
	</div><!-- .widget-area -->
<?php endif; ?>