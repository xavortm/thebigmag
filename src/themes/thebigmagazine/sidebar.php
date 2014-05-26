<?php 
/**
 * Template - Sidebar.php
 *
 * @package WordPress
 * @subpackage The Big Magazine
 */ 

global $smof_data;
?>


<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<div class="widget-area <?php echo $smof_data['widget_menu_skin'] ?>">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div><!-- .widget-area -->
<?php endif; ?>